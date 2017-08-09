<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\model\product;
use app\model\Category;

class Products extends Controller
{

    public function index()
    {
        $cate = new Category();
        $cates = collection($cate->all())->toArray();
        $cates = $cate->gettree($cates);
        $cates = $cate->prefix($cates);
        $cates = $cate->option($cates);
        $this->assign('cates', $cates);
        $this->view->engine->layout('layout');
        
        if (Request::instance()->isPost()) {
            $post = Request::instance()->post();
            $cover = request()->file('cover');
            $pics = request()->file('pics');
            
            if ($cover) {
                $info = $cover->move('./product_cover/');
                $coverurl = $info->getSaveName();
                $coverurl = str_replace('\\', '/', $coverurl);
            }
            if ($pics) {
                $picsurl = [];
                foreach ($pics as $file) {
                    $info = $file->move('./product_pics/');
                    $a = $info->getSaveName();
                    $picsurl[] = str_replace('\\', '/', $a);
                }
                
                // $b=json_encode($picsurl);
                $s2 = implode(',', $picsurl);
            }
            $post['cover'] = $coverurl;
            $post['picsurl'] = $s2;
            $product = new product();
            if ($product->add($post)) {
                return $this->success('新增成功');
            } else {
                return $this->error('新增失败');
            }
        }
        return $this->fetch();
    }

    public function prolist()
    {
        $product = new product();
        $list = $product->find();
        if ($list) {
            $list = $list->paginate(3);
            $this->assign('lists', $list);
            $this->view->engine->layout('layout');
            return $this->fetch();
        } else {
            $this->error('暂无商品信息');
        }
    }

    public function on()
    {
        $id = Request::instance()->param('id/d');
        $res = product::get($id);
        $res->ison = 1;
        if ($res->isUpdate(true)->save()) {
            $this->success('上架成功');
        } else {
            $this->error('上架失败');
        }
    }

    public function off()
    {
        $id = Request::instance()->param('id/d');
        $res = product::get($id);
        $res->ison = 0;
        if ($res->isUpdate(true)->save()) {
            $this->success('下架成功');
        } else {
            $this->error('下架失败');
        }
    }

    public function edit()
    {
        $this->view->engine->layout('layout');
        $cate = new Category();
        $cates = collection($cate->all());
        $cates = $cate->gettree($cates);
        $cates = $cate->prefix($cates);
        $cates = $cate->option($cates);
        $id = Request::instance()->param('id/d');
        $list = product::get($id);
        if (Request::instance()->isPost()) {
            $post = Request::instance()->post();
            $idd=Request::instance()->param('id/d');
            $product = new product();
            if ($list->isUpdate(true)->save($post,['productid'=>$idd])) {
                return $this->success('修改成功', 'prolist');
            } else {
                return $this->error('修改失败');
            }
        }
        $this->assign('cates', $cates);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function del()
    {

        $id = Request::instance()->param('id/d');        
        $product = product::get($id);
        $picsurl = explode(",", $product->pics);
        // $picsurl[] = $product->cover;
        foreach ($picsurl as $picurl) {
            $url = './product_pics/' . $picurl;
            if (! unlink($url)) {
                return $this->error('刪除失敗');
            }
        }
        if (! unlink('./product_cover/' . $product->cover)) {
            return $this->error('刪除封面圖片失敗');
        }
        if (product::destroy($id)) {
            return $this->success('刪除商品信息成功');
        }
    }
}
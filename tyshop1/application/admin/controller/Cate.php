<?php
namespace  app\admin\controller;

use think\Controller;
use think\Request;
use app\model\Category;

class Cate extends Controller{
    
    public function catelist(){
        
        $this->view->engine->layout('layout');
        return $this->fetch();
    }  
    public function add(){ 
        $cate=new Category();
        $cates=collection($cate->all())->toArray();
        $cates=$cate->gettree($cates);
        $cates=$cate->prefix($cates);
        $cates=$cate->option($cates);
        $this->assign('cates',$cates);
       if(Request::instance()->isPost()){  
        $post=Request::instance()->post();
        $res=$cate->insert($post);
        if($res){ 
           return $this->redirect('cate/add');       
        }
      }     
      $this->view->engine->layout('layout');
      return $this->fetch(); 
    }
    public function edit(){
        
        
        
        if(Request::instance()->isPost()){
            $post=Request::instance()->post();
            var_dump($post);
            exit();
            
        }
        return $this->fetch();
    }
}
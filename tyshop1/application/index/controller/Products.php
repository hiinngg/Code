<?php
namespace  app\index\controller;
 

use think\Controller;
use think\Request;
use app\model\product;

class Products extends Common{
    
    
    public function index(){
        
        $datas=collection(product::all(['ison'=>1]))->toArray();
       foreach ($datas as $k=>$data){
           $pics=explode(",",$data['pics']);
           $data['pics']=$pics;
           $datas[$k]['pics']=$data['pics'];   
         }
        $this->assign('datas' ,$datas);
        $this->view->engine->layout('layout/layout2');
        return  $this->fetch();
    }
    public function detail(){
        
        $id=Request::instance()->param('id/d');
        $data=product::get($id)->toArray();
        $pics=explode(",", $data['pics']);
        $data['pics']=$pics;
        $this->assign('data',$data);
        $this->view->engine->layout('layout/layout2');
        return $this->fetch();
    }
    
}
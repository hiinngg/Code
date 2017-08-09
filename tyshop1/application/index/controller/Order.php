<?php
namespace  app\index\controller;

use think\Controller;

class  Order extends Controller{
    
    public function index(){
        $this->view->engine->layout('layout/layout2');
        return $this->fetch('index');
    }
    
    
    public function check(){
        
        $this->view->engine->layout('layout/layout');
        return $this->fetch();
    }
    
}
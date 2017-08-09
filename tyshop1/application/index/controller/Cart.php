<?php

namespace app\index\controller;
use think\Controller;


class Cart extends Controller{
      
    
    public function index(){
        
        
        $this->view->engine->layout('layout/layout');
        return $this->fetch();
    }
}
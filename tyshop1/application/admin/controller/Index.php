<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

class Index extends Controller{
    
    
    public  function index(){
        if(Session::has('admin')){ 
            //session_regenerate_id();
        $this->view->engine->layout('layout');
        return  $this->fetch();
        }else {$this->redirect('site/index');}
    }
    public function signin(){
       Session::delete('admin');
       if(!Session::has('admin')){
           $this->redirect('admin/site/index');
       }
    }
}

<?php
namespace  app\admin\controller;

use think\Controller;
use app\model\Admin;
use think\Request;
use think\Session;

class Site extends Controller{
    
    
    public  function  index(){
        if(Session::has('admin')){
            return $this->redirect('admin/index/index');
        }
           
        return $this->fetch();
    }
    public  function login(){

        $post=Request::instance()->post();
        $admin=new Admin();
         if((($result=$this->validate($post, 'Admin.login'))===true)){
               if(($a=$admin->login($post))===true){
          
               return array('status'=>1,'msg'=>'验证成功');
                 
               }else{return array('status'=>-1,'msg'=>'用户名或密码错误'); }
        }
        else {return array('status'=>-1,'msg'=>$result);
           
       
    }
        

}
}
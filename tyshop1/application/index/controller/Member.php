<?php

namespace app\index\controller;
use think\Controller;
use think\Request;
use app\model\User;

class Member extends Controller{
    
    public  function auth(){
        if(Request::instance()->isAjax()){
            
            $post=Request::instance()->post();
            if(($result=$this->validate($post, 'User.login'))===true){
                $user=new User();
                if(($res=$user->auth($post))===true){
                    return array('status'=>1,'msg'=>'登录成功');
                }else { return array('status'=>1,'msg'=>'登录失败');}
            }else{ return array('status'=>-1,'msg'=>$result);}   
        }
        $this->view->engine->layout('layout/layout2');
        return $this->fetch();
    }
    
    
    
    public function reg(){      
        if(Request::instance()->isAjax()){
            $post=Request::instance()->post();
            $user=new User();
            if(($result=$this->validate($post, 'User'))===true){
                if(($res=$user->reg($post))===true){
                return array('status'=>1,'msg'=>'注册成功');
                }else  return array('status'=>-1,'msg'=>$res);
            }else {return array('status'=>-1,'msg'=>$result);}
        }
        $this->view->engine->layout('layout/layout2');
        return $this->fetch();
    }
}
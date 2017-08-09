<?php

namespace  app\admin\controller;


use think\Controller;
use app\model\User;
use think\Request;



class Users extends Controller{
       
    public function index(){        
        $users=User::find();
        if(!$users){ 
         return $this->error('暂无用户');
        }
         else {$users=$users->paginate(10);}
        $this->assign('users',$users);
        $this->view->engine->layout('layout');
        return   $this->fetch();        
    }

    public function del(){
        $id=Request::instance()->param('id/d');
        if(User::destroy($id)){
            return $this->redirect('users/index');
        }
    }
    
    
}
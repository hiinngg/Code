<?php
namespace app\admin\controller;


use think\Controller;
use app\model\Admin;
use think\Request;
use think\Session;


class Manage  extends Controller{
    public function  managers(){      
        $admin=new Admin();
        $admins=$admin->find()->paginate(10);
        $this->assign('admin',$admins);
        $this->view->engine->layout('layout');
        return   $this->fetch();
    }   
    
    public function add(){
       
        $this->view->engine->layout('layout');
        return $this->fetch();
    } 
    
    public function insert(){          
            $post=Request::instance()->post();
           
            $admin=new Admin();
            if(($result=$this->validate($post, 'Admin.reg'))===true){
                 if($admin->insert($post)){
                   return  array('status'=>1,'msg'=>'新增成功');
                 }else{ return array('status'=>-1,'msg'=>'新增失败'); };
            }else{return array('status'=>-1,'msg'=>$result);}               
    }
    
    public function del(){
        $id=Request::instance()->param('id/d');
        if(Admin::destroy($id)){
            return  $this->redirect('Manage/managers');           
        }       
    }
        
    public  function changepass(){  
        
        $self=Session::get('admin');
        $admin=Admin::get(['adminuser'=>$self]);
        if(Request::instance()->isAjax()){
            $post=Request::instance()->post();
           $admin=new Admin();
           if(($result=$this->validate($post, 'Admin.changepass'))===true){
               if(($res=$admin->changepass($post,$self))=='更新成功'){
                   return  array('status'=>1,'msg'=>'修改成功');
               }else{ return array('status'=>-1,'msg'=>666); }
           }else {return array('status'=>-1,'msg'=>$result);}     
            //var_dump($self);
           // var_dump($post);
          
        }
        $this->assign('admin',$admin);
        $this->view->engine->layout('layout');
        return  $this->fetch();      
    }
    
    
    
}
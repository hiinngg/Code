<?php
namespace  app\model;

use think\Model;
use think\Session;
use think\Request;

class Admin extends Model{
    protected  $type=[
        'logintime'=>'timestamp',
        'createtime'=>'timestamp'
    ];      
  
 
    public function login($data){
     $result=self::get(['adminuser'=>$data['adminuser']]);
     if($result){
         if($result->adminpass==md5($data['adminpass'])){
             //session操作      
            
             $lifetime=isset($data['rememberme'])?24*3600:0;
             Session::set('admin',$data['adminuser']);
             session_set_cookie_params($lifetime);
             session_regenerate_id();
             //更新用户登录时间、ip
             $result->logintime=time();
             //$result->loginip=Request::instance()->ip();
            if($result->save()){
                return true;
            }else {return false;}             
         }else { return false; }
     }else {
        return '用户名或密码不正确';}
  
     }
     
     public function insert($data){
       $this->adminuser=$data['adminuser'];
       $this->adminpass=md5($data['adminpass']);
       $this->adminemail=$data['adminemail'];
       $this->createtime=time();
       if($this->isUpdate(false)->save()){
           return true;
       }
     }
     
     public function changepass($data,$self){
         $result=self::get(['adminuser'=>$self]);
         if($result){
             if($result->adminpass==md5($data['adminpass'])){
                    $result->adminpass=md5($data['newpass']);
                    if($result->isUpdate(true)->save()){
                        return '更新成功';
                    }else{ return '更新失败';}
             }else{return '密码错误';}
             
         }else{return '无法找到名为'.$self.'用户';}
         
         
     }
    
}
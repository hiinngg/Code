<?php
namespace  app\model;

use think\Model;
use think\Session;
use think\Request;

class User extends Model{
  /*    protected  function getBirthdayAttr($birthday){
        return date('Y-m-d',$birthday);
    }
     protected  function setBirthdayAttr($value){
        return strtotime($value);
    } */
    protected $rememberMe=FALSE;
    protected  $type=[
        'createtime'=>'timestamp'
    ];
    public function profile(){
        
      return $this->hasOne('Profile','userid','userid');
    }
    
    public function  reg($data){
        $this->username=$data['username'];
        $this->userpass=md5($data['userpass']);
        $this->useremail=$data['useremail'];
        $this->createtime=time();
        if($this->isUpdate(false)->save()){
            return true;
        }else{return false; }
    }
    
    
    public function  auth($data){
        $result=self::get(['username'=>$data['username']]);
        if($result){
            if($result->userpass==md5($data['userpass'])){
                //session操作
                $lifetime=isset($data['rememberMe'])?24*3600:0;               
                Session::set('user',$data['username']);
                session_set_cookie_params($lifetime);
                //更新用户登录时间、ip
               /*  $result->logintime=time();
                $result->loginip=Request::instance()->ip(); */
                if(Session::has('user')){
                    return true;
                }else {return false;}
            }else { return false; }
        }else {
            return false;}
    }
}
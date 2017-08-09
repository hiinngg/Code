<?php
namespace  app\common\validate;
 

use think\Validate;

class Admin extends Validate{

    protected  $rule=[
        'adminuser|用户名'=>'require|unique:admin',
        'adminpass|密码'=>'require',
        'adminemail|邮箱'=>'require|email',
        'repass'=>'require|confirm:adminpass',
        'newpass'=>'require'
     
    ];
    
    protected  $message=[
      'adminuser.require' =>'用户名不能为空',
      'adminpass.require' =>'密码不能为空',
      'adminemail.require'=>'邮箱不能为空',
      'adminemail.email'  =>'邮箱格式不正确',
      'repass.confirm'    =>'两次密码输入不正确'
      
    ];
    
    protected  $scene=[
      'login'=>['adminuser'=>'require','adminpass']  ,
      'changepass'=>['adminpass','repass'=>'require|confirm:newpass','newpass'],
        'reg'=>['adminuser','adminemail','adminpass','repass']
    ];
  
}
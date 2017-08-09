<?php
namespace  app\common\validate;

use think\Validate;

class User extends Validate{
    protected  $rule=[
        'username|用户名'=>'require|unique:user',
        'userpass|密码'=>'require',
        'repass|确认密码'=>'require|confirm:userpass',
        'useremail|邮箱'=>'require|email'
    ];
    
    protected  $message=[
        'repass.confirm'=>'两次密码输入不一致',
        'username.require'=>'用户名不能为空'
    ];
    
    
    protected  $scene=[
        'login'=>['username'=>'require','userpass']
    ];
    
}
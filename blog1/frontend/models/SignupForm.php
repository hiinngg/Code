<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '邮箱已存在'],

            ['password', 'required'],
            ['repassword','required'],
            [['password','repassword'], 'string', 'min' => 6],
            ['verifyCode','captcha'],
            ['repassword','compare','compareAttribute'=>'password','message'=>'两次密码输入不正确'],
            
        ];
    }

    
    public function attributeLabels(){
        return [
            'username'=>'用户名',
            'email'=>'邮箱',
            'password'=>'密码',
            'repassword'=>'重复密码',
            'verifyCode'=>'验证码',
            
            
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}

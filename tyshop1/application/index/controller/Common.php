<?php
namespace app\index\controller;


use think\Controller;
use app\model\Category;
use app\model\product;

class Common extends Controller{
    
    public function _initialize(){
         $pro=[];
         $hot=collection(product::all(['ishot'=>1]))->toArray();
         $sale=collection(product::all(['issale'=>1]))->toArray();
         $tui=collection(product::all(['istui'=>1]))->toArray();
         $pro['hot']=$hot;
         $pro['sale']=$sale;
         $pro['tui']=$tui;             
        
       $data=new Category();
       $top=$data->all(['parentid'=>0]);
       $top=collection($top)->toArray();      
       $cates=[];
       foreach ($top as $k=>$cate){
           $cate['children']=collection($data->all(['parentid'=>$cate['cateid']]))->toArray();
           $cates[$k]=$cate;
       }
       $this->assign('cates',$cates);
       $this->assign('pros',$pro);
        
    }
    
}
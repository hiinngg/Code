<?php
namespace  app\model;

use think\Model;

class Category extends Model{

    
    
    
public   function insert($data){
     $this->title=$data['title'];
     $this->parentid=$data['cateid'];
     if($this->isUpdate(false)->save()){
         return true;
     }else{return false;}
 }
  /* protected  $cates=self::all()->toArray(); */  
public function gettree($cates,$pid=0) {  
        $tree=[];
       foreach ($cates as $cate){
              if( $cate['parentid']==$pid ){
                  $tree[]=$cate;  
                  $tree=array_merge($tree,$this->gettree($cates,$cate['cateid']));
              }               
          }
      return $tree; 
  }
  
public function  prefix($cates,$p='|--'){
      $tree=[];
      $num=1;
      $pre=[0=>1];
      while ($val=current($cates)){
          $key=key($cates);
          if($key>0){
              if($cates[$key-1]['parentid']!=$val['parentid']){
                  $num++;
              }
          }
          if(array_key_exists( $val['parentid'], $pre)){
              $num=$pre[$val['parentid']];
          }
          $val['title']=str_repeat($p, $num).$val['title'];
          $tree[]=$val;
          $pre[$val['parentid']]=$num;
          next($cates);
      }
      return $tree;
          
                 }
   
public function option($tree){
        $option[]=['cateid'=>0,'title'=> '添加顶级分类'];

       foreach ($tree as $cate){
          $option[]=['cateid'=>$cate['cateid'],'title'=>$cate['title']];
       }
       return $option;
   }              
                 
                 
}
<?php
namespace  app\model;

use think\Model;

class product extends Model{
    
    public function add($data){
   $this->price=$data['price'];
   $this->cateid=$data['cateid'];
   $this->title=$data['title'];
   $this->descr=$data['descr'];
   $this->ishot=$data['ishot'];
   $this->issale=$data['issale'];
   $this->saleprice=$data['saleprice'];
   $this->num=$data['num'];
   $this->ison=$data['ison'];
   $this->istui=$data['istui'];
   $this->cover=$data['cover'];
   $this->pics=$data['picsurl'];
   if(self::isUpdate(false)->save()){
       return true;
   }
    }
    
    
    public function edit($data,$id){
      
        if(self::save($data,['productid'=>$id])){
            return true;
        }else {return false;}
    }
    
}
<?php
namespace app\index\controller;

class Index  extends Common
{
  public function Index(){
      
     
      $this->view->engine->layout('layout/layout');      
     return  $this->fetch(); 
  }
    
    
    
}

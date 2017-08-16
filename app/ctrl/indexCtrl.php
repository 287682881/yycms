<?php

namespace app\ctrl;
use core\lib\model;
use core\lib\upload;


class indexCtrl extends \core\action
{
    public function index(){
        $model = new \app\model\cMod();
        $ret = $model->lists();
           
        // $model = new model();print_r($model);
        // $data = $model->select("student", "*");
        // print_r($data);
        // $stmp=\core\lib\conf::get('server','database');print_r($stmp);
        // p("this is index");

        $this->assign("ret",$ret);
        $this->display('index/index.html');

    }

    public function user(){
        
          if(isset($_POST["submit"])){
            print_r($_POST["file"]);
            $u=new upload();
          }else{
            $this->display('index/pic.html');
          }
       
        
    }

 
}






 
?>
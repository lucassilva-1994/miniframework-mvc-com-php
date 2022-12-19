<?php
 $key= (isset($_GET['key']) ? $_GET['key']."/" : "index/index");

 $separator  = explode('/', $key);
 $controller = $separator[0];
 $action     = ($separator[1] == null ? "index" : $separator[1]);

   
 function autoload($file){
    require_once("app/models/{$file}.php");
 }

 spl_autoload_register('autoload');


 require_once ("system/Controller.php");
 require_once ("system/Model.php");
 
 require_once ("app/controllers/{$controller}Controller.php");
 $app = new $controller();
 $app->$action();

 
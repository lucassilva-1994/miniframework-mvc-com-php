<?php
 define('CONTROLLERS', 'app/controllers/');
 define('MODELS', 'app/models/');
 define('VIEWS', 'app/views/');

 require_once ("system/System.php");
 require_once ("system/Controller.php");
 require_once ("system/Model.php");

 function autoload($file){
    require_once(MODELS."{$file}.php");
 }
 spl_autoload_register('autoload');

 $start = new System;
 $start->run();

 
<?php
  class Controller extends System{
    protected function view($view, $vars = null){
      if( is_array($vars) && count($vars) > 0)
        extract($vars, EXTR_PREFIX_ALL, "view");

        return require_once (VIEWS."{$view}.php");
    }
  }
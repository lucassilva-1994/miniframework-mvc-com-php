<?php
  class Controller {
    protected function view($view){
        return require_once ("app/views/{$view}.php");
    }
  }
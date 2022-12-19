<?php

 class Produtos extends Controller{ 
    public function index(){
        $this->view("produtosindex");
    }

    public function novos(){
        $this->view("produtosnovos");
    }
 }
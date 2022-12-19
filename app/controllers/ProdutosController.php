<?php

 class Produtos extends Controller{ 
    public function index_action(){
        $data = $this->getParams();
        $this->view("produtosindex", $data);
    }

    public function novos(){
        $this->view("produtosnovos");
    }
 }
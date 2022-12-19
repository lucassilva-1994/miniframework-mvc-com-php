<?php
  class Posts extends Controller{
        private $db;
        public function __construct(){
            $this->db = new PostsModel();
        }

        public function insert(){
            $this->db->insert("posts", array(
                "titulo" => "Porquê ser um Programador?",
                "resumo" => "Programador está sendo um dos profissionais mais ...",
                "conteudo" => "O Programador está sendo uma dos profissionais mais procurados no mercado,
                 e um dos motivos é pelo fato do mundo está ficando cada mais vez mais digital.",
                "comentarios" => "158"
            ));
            print "Dados inseridos com sucesso.";
        }

        public function read(){
            print_r($this->db->read("posts"));
            print "Dados listados com sucesso.";
        }

        public function update(){
            $this->db->update("posts", array(
                "comentarios" => 53
            ), "id=53");
            print "Dados atualizados com sucesso.";
        }

        public function delete(){
            $this->db->delete("posts","id=52");
            print "Dados removidos com sucesso.";
        }
  }
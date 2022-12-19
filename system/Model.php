<?php
    class Model {
        //Conexão com o banco de dados.
        protected $db;
        public $_table;
        public function __construct(){
            $this->db = new PDO(
                "mysql:host=localhost;dbname=miniframework","root",""
            );
        }

        public function insert(array $data){
            $fields = implode(",", array_keys($data));
            $values = "'". implode(" ',' ",array_values($data)) ."'";
            return $this->db->query("INSERT INTO `{$this->_table}` ({$fields}) VALUES ({$values})");
        }

        public function read($where = null){
            $where = ($where != null ? "WHERE {$where}" : "");
            $query = $this->db->query("SELECT * FROM `{$this->_table}` {$where}");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }

        public function update(array $data, $where){
            foreach($data as $ind => $val){
                $fields[] = "{$ind} = '{$val}'";
            }
            $fields = implode(", ", $fields);
            return $this->db->query("UPDATE `{$this->_table}` SET {$fields} WHERE {$where}");
        }

        public function delete($where){
            return $this->db->query("DELETE FROM {$this->_table} where {$where}");
        }
    }
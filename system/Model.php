<?php
    class Model {
        //Conexão com o banco de dados.
        protected $db;
        public function __construct(){
            $this->db = new PDO(
                "mysql:host=localhost;dbname=miniframework","root",""
            );
        }

        public function insert($table, array $data){
            foreach($data as $inds => $vals){
                $fields[] = $inds;
                $values[] = $vals;
            }
            $fields = implode(",", $fields);
            $values = "'". implode(" ',' ",$values) ."'";
            return $this->db->query("INSERT INTO `{$table}` ({$fields}) VALUES ({$values})");
        }

        public function read($table, $where = null){
            $where = ($where != null ? "WHERE {$where}" : "");
            $query = $this->db->query("SELECT * FROM `{$table}` {$where}");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }

        public function update($table, array $data, $where){
            foreach($data as $ind => $val){
                $fields[] = "{$ind} = '{$val}'";
            }
            $fields = implode(", ", $fields);
            return $this->db->query("UPDATE `{$table}` SET {$fields} WHERE {$where}");
        }

        public function delete($table, $where){
            return $this->db->query("DELETE FROM {$table} where {$where}");
        }
    }
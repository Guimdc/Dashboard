<?php
    class HomeModel extends MainModel{ 

        public function list(){
            $sql="SELECT * FROM moviment";
        
            $retorno=$this->db->query($sql, null);
            While($item=$retorno->fetch(PDO::FETCH_ASSOC)){
                $resultado[]=$item;
            }
            return $resultado;
        }

        public function cash_balance(){
            $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
            $result=$this->db->query($sql, null);
            $input=$result->fetch(PDO::FETCH_ASSOC);
            $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
            $result=$this->db->query($sql, null);
            $output=$result->fetch(PDO::FETCH_ASSOC);
            //print_r($input['input']-$output['output']);
            return $input['input']-$output['output'];
        }

        public function values(){
            //$sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
            $sql = "SELECT value FROM moviment;";
            $result=$this->db->query($sql, null);
            $input=$result->fetchAll();
            //print_r($input);
            return $input;
        }
    }
?>
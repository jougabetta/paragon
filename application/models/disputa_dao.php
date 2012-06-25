<?php

    class Disputa_dao extends CI_Model{

        public function __constructor(){

            parent::__constructor();

        }

        public function get_all_disputas(){

            $disputas = $this->db->query("SELECT * FROM disputas");

            return $disputas->result();

        }

        public function inserir_disputa($disputa){

            $titulo = $disputa->get_titulo();
            $descricao = $disputa->get_descricao();
            $autor = $disputa->get_autor();
            $status = $disputa->get_status();
            $data = $disputa->get_data();
            $participante1 = $disputa->get_participante1();
            $participante2 = $disputa->get_participante2();

            $inserir_participante = $this->db->query("INSERT INTO disputas SET titulo='$titulo', descricao='$descricao', autor='$autor', status='$status', data='$data', participante1='$participante1', participante2='$participante2'");
            return TRUE;


        }

        public function troca_status($id, $status){

            $this->db->query("UPDATE disputas SET status='$status' WHERE id='$id'");
            return TRUE;

        }

    }

?>
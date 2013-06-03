<?php

    class Disputa_dao extends CI_Model{

        public function __constructor(){

            parent::__constructor();

        }

        public function get_all_disputas(){

            $disputas = $this->db->query("SELECT * FROM disputas ORDER BY id DESC");

            return $disputas->result();

        }

        public function get_disputa_by_id($id){

            $disputa = $this->db->query("SELECT * FROM disputas WHERE id='$id'");

            return $disputa->row();

        }

        public function inserir_disputa($disputa){

            $titulo = $disputa->get_titulo();
            $descricao = $disputa->get_descricao();
            $autor = $disputa->get_autor();
            $status = $disputa->get_status();
            $data = $disputa->get_data();
            $participante1 = $disputa->get_participante1();
            $participante2 = $disputa->get_participante2();

            $inserir_disputa = $this->db->query("INSERT INTO disputas SET titulo='$titulo', descricao='$descricao', autor='$autor', status='$status', data='$data', participante1='$participante1', participante2='$participante2'");
            $id_disputa = $this->db->insert_id();
            $inserir_disputa_votos = $this->db->query("INSERT INTO votos SET participante1='0', participante2='0', id_disputa='$id_disputa'");
            return TRUE;

        }

        public function troca_status($id, $status){

            $this->db->query("UPDATE disputas SET status='$status' WHERE id='$id'");
            return TRUE;

        }

        public function update_disputa($disputa){

            $id = $disputa->get_id();
            $titulo = $disputa->get_titulo();
            $autor = $disputa->get_autor();
            $descricao = $disputa->get_descricao();
            $data = $disputa->get_data();
            $status = $disputa->get_status();
            $participante1 = $disputa->get_participante1();
            $participante2 = $disputa->get_participante2();

            $this->db->query("UPDATE disputas SET titulo='$titulo', autor='$autor', descricao='$descricao', data='$data', status='$status', participante1='$participante1', participante2='$participante2' WHERE id='$id'");
            return TRUE;

        }

        public function delete_disputa($id){

            if($this->db->query("DELETE FROM disputas WHERE id='$id'") && $this->db->query("DELETE FROM votos WHERE id_disputa='$id'")){

                return TRUE;

            }else{

                return FALSE;

            }

        }

        public function registrar_voto($disputa, $participante){

            if($participante == "participante1" || $participante == "p1" || $participante == "1"){

                $this->db->query("UPDATE votos SET participante1 = (participante1+1) WHERE id_disputa='$disputa'");
                return TRUE;

            }elseif($participante == "participante2" || $participante == "p2" || $participante == "2"){

                $this->db->query("UPDATE votos SET participante2 = (participante2+1) WHERE id_disputa='$disputa'");
                return TRUE;

            }else{

                return FALSE;

            }

        }

        public function get_votos($disputa){

            $votos = $this->db->query("SELECT participante1, participante2 FROM votos WHERE id_disputa='$disputa'");
            return $votos->row();

        }

    }

?>
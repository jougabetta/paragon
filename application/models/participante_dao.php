<?php

    class Participante_dao extends CI_Model{

        public function __constructor(){

            parente::__constructor();

        }

        public function get_all_participantes(){

            $participantes = $this->db->query("SELECT id, nome, autor FROM participantes");

            return $participantes->result();

        }

        public function get_participante_by_id($id){

            $participante = $this->db->query("SELECT * FROM participantes WHERE id='$id'");

            return $participante->row();

        }

        public function get_descricao($id){

            $descricao = $this->db->query("SELECT descricao FROM descricoes WHERE id='$id'");

            return $descricao->row();

        }

        public function inserir_participante($participante){

            $nome = $participante->get_nome();
            $autor = $participante->get_autor();
            $descricao = $participante->get_descricao();
            $imagem = $participante->get_imagem();

            if($this->armazenar_imagem($imagem)){

                $inserir_participante = $this->db->query("INSERT INTO participantes SET nome='$nome', autor='$autor', imagem='$imagem[name]', descricao='$descricao'");
                return TRUE;

            }else{

                return false;

            }

        }

        public function update_participante($participante){

            $id = $participante->get_id();
            $nome = $participante->get_nome();
            $autor = $participante->get_autor();
            $descricao = $participante->get_descricao();
            $imagem = $participante->get_imagem();

            if($this->session->userdata("participante_imagem") == $imagem){

                $this->db->query("UPDATE participantes SET nome='$nome', autor='$autor', descricao='$descricao' WHERE id='$id'");
                return TRUE;

            }else{

                if($this->armazenar_imagem($imagem)){


                    $this->db->query("UPDATE participantes SET nome='$nome', autor='$autor', imagem='$imagem[name]', descricao='$descricao' WHERE id='$id'");
                    return TRUE;

                }else{

                    return false;

                }

            }

        }

        public function delete_participante($id){

            if($this->db->query("DELETE FROM participantes WHERE id='$id'")){

                return TRUE;

            }else{

                return FALSE;

            }

        }

        public function armazenar_imagem($imagem){

            $ftp_config["hostname"] = "127.0.0.1";
            $ftp_config["username"] = "root";
            $ftp_config["password"] = "123456";
            $ftp_config["debug"] = TRUE;

            if($this->ftp->connect($ftp_config)){

                if($this->ftp->upload($imagem["tmp_name"], "paragon/imagens/participantes/".$imagem["name"])){

                    return TRUE;

                }else{

                    return FALSE;

                }

            }else{

                return FALSE;

            }

        }

    }

?>
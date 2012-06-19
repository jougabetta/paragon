<?php

    class Participante_dao extends CI_Model{

        public function __constructor(){

            parente::__constructor();

        }

        public function inserir_participante($participante){

            $nome = $participante->get_nome();
            $autor = $participante->get_autor();
            $imagem = $participante->get_imagem();

            if($this->armazenar_imagem($participante->get_imagem())){

                if( strlen($participante->get_descricao()) > 0 ){

                    $id_descricao = $this->inserir_descricao($participante->get_descricao());

                }else{

                   $id_descricao = "";

                }

                $inserir_participante = $this->db->query("INSERT INTO participantes SET nome='$nome', autor='$autor', imagem='$imagem[name]', descricao='$id_descricao'");
                return TRUE;

            }else{

                return false;

            }

        }

        public function inserir_descricao($descricao){

            $inserir_descricao = $this->db->query("INSERT INTO descricoes SET descricao='$descricao'");

            return $this->db->insert_id();

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
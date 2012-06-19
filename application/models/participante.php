<?php

    class Participante extends CI_Model{

        private $id;
        private $nome;
        private $imagem;
        private $descricao;
        private $autor;

        public function __constructor(){

            parente::__constructor();

        }

        public function set_id($id){

            $this->id = $id;

        }

        public function set_nome($nome){

            $this->nome = $nome;

        }

        public function set_imagem($imagem){

            $this->imagem = $imagem;

        }

        public function set_descricao($descricao){

            $this->descricao = $descricao;

        }

        public function set_autor($autor){

            $this->autor = $autor;

        }

        public function get_id(){

            return $this->id;

        }

        public function get_nome(){

            return $this->nome;

        }

        public function get_imagem(){

            return $this->imagem;

        }

        public function get_descricao(){

            return $this->descricao;

        }

        public function get_autor(){

            return $this->autor;

        }

    }

?>
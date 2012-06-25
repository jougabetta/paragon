<?php

    class Disputa extends CI_Model{

        private $id;
        private $titulo;
        private $participante1;
        private $participante2;
        private $autor;
        private $vencedor;
        private $data;
        private $descricao;
        private $status;

        public function __constructor(){

            parent::__constructor();

        }

        public function set_id($id){

            $this->id = $id;

        }

        public function set_titulo($titulo){

            $this->titulo = $titulo;

        }

        public function set_participante1($participante){

            $this->participante1 = $participante;

        }

        public function set_participante2($participante){

            $this->participante2 = $participante;

        }

        public function set_autor($autor){

            $this->autor = $autor;

        }

        public function set_vencedor($vencedor){

            $this->vencedor = $vencedor;

        }

        public function set_data($data){  //A data deve conter o formato yyyy-mm-dd hh:mm:ss

            if($data == ""){

                $this->data = date("Y-m-d H:i:s");

            }else{

                $this->data = $data;

            }

        }

        public function set_descricao($descricao){

            $this->descricao = $descricao;

        }

        public function set_status($status){

            $this->status = $status;

        }

        public function get_id(){

            return $this->id;

        }

        public function get_titulo(){

            return $this->titulo;

        }

        public function get_participante1(){

            return $this->participante1;

        }

        public function get_participante2(){

            return $this->participante2;

        }

        public function get_autor(){

            return $this->autor;

        }

        public function get_vencedor(){

            return $this->vencedor;

        }

        public function get_data(){

            return $this->data;

        }

        public function get_descricao(){

            return $this->descricao;

        }

        public function get_status(){

            return $this->status;

        }

    }

?>
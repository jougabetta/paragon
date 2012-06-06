<?php

    class Adm_user extends CI_Model{

        private $user_id;
        private $user_nome;
        private $user_login;
        private $user_senha;
        private $user_senha_limite;

        public function __construct(){

            parent::__construct();
            $this->user_senha_limite = 6;

        }

        public function set_id($id){

            $this->user_id = $id;

        }

        public function set_nome($nome){

            $this->user_nome = $nome;

        }

        public function set_login($login){

            $this->user_login = $login;

        }

        public function set_senha($senha){

            $this->user_senha = $senha;

        }

        public function set_senha_limite($limite){

            $this->user_senha_limite = $limite;

        }

        public function get_id(){

            return $this->user_id;

        }

        public function get_nome(){

            return $this->user_nome;

        }

        public function get_login(){

            return $this->user_login;

        }

        public function get_senha(){

            return $this->user_senha;

        }

        public function get_senha_limite(){

            return $this->user_senha_limite;

        }

        public function verifica_limite_senha($password){

            if(strlen($password) < $this->user_senha_limite){

                return FALSE;

            }else{

                return TRUE;

            }

        }

}

?>
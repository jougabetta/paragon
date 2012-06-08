<?php

    class Adm_user_dao extends CI_Model{

        public function __construct(){

            parent::__construct();

        }

        public function verifica_login($login, $senha){

            $userQuery = $this->db->query("SELECT id FROM adm_users where login='$login' AND senha='$senha'");

            if($this->db->affected_rows($userQuery) > 0){

                return TRUE;

            }else{

                return FALSE;

            }

        }

        public function get_user_by_login($login, $senha){

            $user_query = $this->db->query("SELECT * FROM adm_users WHERE login='$login' AND senha='$senha'");
            return $user_query->row();

        }

        public function get_user_by_id($id){

            $user_id_query = $this->db->query("SELECT * FROM adm_users WHERE id='$id'");
            return $user_id_query->row();

        }

    }

?>
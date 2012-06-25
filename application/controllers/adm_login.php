<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Adm_login extends CI_Controller{

        private $AdmUser_dao;
        private $AdmUser;
        private $error = array();
        
        public function __construct(){

            parent::__construct();

	        $this->load->model('adm_user_dao');
	        $this->load->model('adm_user');

            $this->AdmUser_dao = $this->adm_user_dao;
            $this->AdmUser = $this->adm_user;

        }

        public function index(){



        }

        public function verifica_login(){

            if($_POST["login"] == ""){

                $this->error["erro_login"] = "Digite o login!";

            }

            if($_POST["senha"] == ""){

                $this->error["erro_senha"] = "Digite a senha!";

            }elseif(!$this->AdmUser->verifica_limite_senha($_POST["senha"])){

                $this->error["erro_senha"] = "A senha deve conter no mínimo 6 caracteres";

            }

            if(count($this->error) > 0){

                $this->load->view('adm/adm_painel_login', $this->error);
            	$this->load->view('adm/adm_footer');

            }else{

              if($this->AdmUser_dao->verifica_login($_POST["login"], $_POST["senha"])){

                    $user = $this->AdmUser_dao->get_user_by_login($_POST["login"], $_POST["senha"]);

                    $this->AdmUser->set_id($user->id);
                    $this->AdmUser->set_nome($user->nome);
                    $this->AdmUser->set_login($user->login);
                    $this->AdmUser->set_senha($user->senha);

                    $this->session->set_userdata("usuario", $this->AdmUser->get_id());

                    redirect("adm_painel/adm_inicial");

              }else{

                    $this->error["erro"] = "Login e/ou Senha inválidos";
    		        $this->load->view('adm/adm_painel_login', $this->error);
    		        $this->load->view('adm/adm_footer');

              }

            }

        }

    }

?>
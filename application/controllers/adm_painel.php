﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_Painel extends CI_Controller {

    private $AdmUser_dao;
    private $AdmUser;
    private $error = array();

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct(){

        parent::__construct();

	    $this->load->model('adm_user_dao');
	    $this->load->model('adm_user');

        $this->AdmUser_dao = $this->adm_user_dao;
        $this->AdmUser = $this->adm_user;

        if($this->session->userdata("usuario") != ""){

            $user_by_id = $this->AdmUser_dao->get_user_by_id($this->session->userdata("usuario"));
            $this->AdmUser->set_id($user_by_id->id);
            $this->AdmUser->set_nome($user_by_id->nome);
            $this->AdmUser->set_login($user_by_id->login);
            $this->AdmUser->set_senha($user_by_id->senha);

        }else{

            $this->AdmUser = $this->adm_user;

        }

		$this->load->view('adm/adm_header');

    }

	public function index(){

        if($this->session->userdata("usuario") != ""){

            $this->adm_inicial(); //se for outra página

        }else{

      		$this->load->view('adm/adm_painel_login');
      		$this->load->view('adm/adm_footer');

        }

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

    public function adm_inicial(){

        $this->load->view("adm/adm_inicial", array("adm_user"=>$this->AdmUser->get_nome()));
        $this->load->view('adm/adm_footer');

    }

}

?>
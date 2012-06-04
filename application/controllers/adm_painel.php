<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_Painel extends CI_Controller {

    private $login = "jougabetta";
    private $senha = "150291";

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
	public function index()
	{
	    $this->load->helper("form");
		$this->load->view('adm/adm_header');
		$this->load->view('adm/adm_painel');
		$this->load->view('adm/adm_footer');
	}

    public function verifica_login(){

        $userLogin = strip_tags(trim(addslashes($_POST["login"])));
        $userSenha = strip_tags(trim(addslashes($_POST["senha"])));

        if(strlen($userSenha) < 6){
          $error = array("error_senha_lenght"=>"A senha deve conter no mínimo 6 caracteres");
          $this->load->view("adm/adm_painel", $error);
        }

        if($userLogin == $login && $userSenha == $senha){

        }

    }

    public function form_adm_login(){



    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_Painel extends CI_Controller {

    private $user_dao;
    private $user;
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

    function __construct(){

	    $this->load->model("adm_user_dao");
	    $this->load->model("adm_user");

        $this->user_dao = new adm_user_dao();
        $this->user = new adm_user();

    }

	public function index()
	{
		$this->load->view('adm/adm_header');
		$this->load->view('adm/adm_painel_login');
		$this->load->view('adm/adm_footer');
	}

    public function verifica_login(){

        if(!$this->user->verifica_limite_senha($_POST["senha"])){

            $this->error["erro_limite_senha"] = "A senha deve conter no mínimo 6 caracteres"

        }

        //continuar virificacao

    	$this->load->view('adm/adm_header');
    	$this->load->view('adm/adm_painel_login', $this->error);
    	$this->load->view('adm/adm_footer');

    }

    public function form_adm_login(){



    }

}


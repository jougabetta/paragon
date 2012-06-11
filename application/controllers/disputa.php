<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disputa extends CI_Controller {

    function __construct(){

        parent::__construct();

        $this->load->model("disputa");
        $this->load->model("disputa_dao");
        $this->load->model("participante");
        $this->load->model("participante_dao");

    }

	public function index(){
	}

    public function casdastrar_disputa(){

        

    }

}

?>
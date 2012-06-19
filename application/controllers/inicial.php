<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicial extends CI_Controller {

    function __construct(){

        parent::__construct();

        $this->load->view("header");

    }

	public function index(){

		$this->load->view('inicial');
		$this->load->view('footer');

	}


}

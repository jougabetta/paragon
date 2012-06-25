<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	    $this->load->model('participante_dao');
	    $this->load->model('participante');
	    $this->load->model('disputa');
	    $this->load->model('disputa_dao');

        $this->AdmUser_dao = $this->adm_user_dao;
        $this->AdmUser = $this->adm_user;

        if( $this->isset_session("usuario") ){

            $user_by_id = $this->AdmUser_dao->get_user_by_id($this->session->userdata("usuario"));
            $this->AdmUser->set_id($user_by_id->id);
            $this->AdmUser->set_nome($user_by_id->nome);
            $this->AdmUser->set_login($user_by_id->login);
            $this->AdmUser->set_senha($user_by_id->senha);

		    $this->load->view('adm/adm_header', array("adm_user"=>$this->AdmUser->get_nome()));
		    $this->load->view('adm/adm_menu');

        }else{

            if($this->isset_session("adm_painel_login")){

                $this->AdmUser = $this->adm_user;

            }else{

                $this->AdmUser = $this->adm_user;
                $this->session->set_userdata("adm_painel_login", 1);
                redirect("adm_painel/adm_painel_login");

            }

        }

    }

	public function index(){

        $this->adm_inicial();

	}

    public function adm_painel_login(){

        $this->load->view("adm/adm_painel_login");
        $this->session->unset_userdata("adm_painel_login");

    }

    public function logout(){

       $this->session->unset_userdata("usuario");

       redirect("adm_painel/");

    }

    public function isset_session($session){

        if($this->session->userdata($session) != ""){

            return TRUE;

        }else{

            return FALSE;

        }

    }

    public function adm_inicial(){

        $this->load->view("adm/adm_inicial");
        $this->load->view('adm/adm_footer');

    }

    public function cadastrar_disputa(){

        $all_users = $this->adm_user_dao->get_all_users();
        $all_participantes = $this->participante_dao->get_all_participantes();

        $this->load->view("adm/cadastrar_disputa", array("usuario" => $all_users, "participantes" => $all_participantes));

    }

    public function cadastro_disputa(){

        $this->disputa->set_titulo($_POST["disputa_titulo"]);
        $this->disputa->set_descricao($_POST["disputa_descricao"]);
        $this->disputa->set_autor($_POST["disputa_autor"]);
        $this->disputa->set_status($_POST["disputa_status"]);
        $this->disputa->set_data("");

        $all_participantes = $this->participante_dao->get_all_participantes();

        for($i=0 ; $i < count($all_participantes) ; $i++){

            if(isset($_POST["disputa_participante".$i])){

                if(!isset($participante1)){

                    $participante1 = $_POST["disputa_participante".$i];
                    $this->disputa->set_participante1($participante1);

                }else{

                    $participante2 = $_POST["disputa_participante".$i];
                    $this->disputa->set_participante2($participante2);
                    break;

                }

            }

        }

        if($this->disputa_dao->inserir_disputa($this->disputa)){

            $this->load->view("adm/cadastrar_disputa", array("sucesso_cadastro_disputa" => "Disputa cadastrada com sucesso!", "disputa_cadastrada" => $this->disputa, "participantes" => $all_participantes));

        }else{

            $this->error["erro_cadastro_disputa"] = "Erro no cadastro da disputa!";
            $this->load->view("adm/cadastrar_disputa", $this->error);

        }

    }

    public function visualizar_disputas(){

        $disputasQuery = $this->disputa_dao->get_all_disputas();
        $disputas["disputas"] = $disputasQuery;

        $this->load->view("adm/visualizar_disputas", $disputas);

    }

    public function troca_disputa_status(){

        $id = $_GET["id"];
        $status = $_GET["status"];

        $this->disputa_dao->troca_status($id, $status);
        redirect("adm_painel/visualizar_disputas");

    }

    public function cadastrar_participante(){

        $all_users["usuario"] = $this->adm_user_dao->get_all_users();

        $this->load->view("adm/cadastrar_participante", $all_users);

    }

    public function cadastro_participante(){

        $this->participante->set_nome($_POST["participante_nome"]);
        $this->participante->set_descricao($_POST["participante_descricao"]);
        $this->participante->set_imagem($_FILES["participante_imagem"]);
        $this->participante->set_autor($_POST["participante_autor"]);

        if($this->participante_dao->inserir_participante($this->participante)){

            $this->load->view("adm/cadastrar_participante", array("sucesso_cadastro_participante" => "Participante cadastrado com sucesso!", "usuario_cadastrado" => $this->participante));

        }else{

            $this->error["erro_cadastro_participante"] = "Erro no cadastro do participante!";
            $this->load->view("adm/cadastrar_participante", $this->error);

        }

    }

    public function visualizar_participantes(){

        $participantesQuery = $this->participante_dao->get_all_participantes();
        $participantes["participantes"] = $participantesQuery;

        $this->load->view("adm/visualizar_participantes", $participantes);

    }

    public function editar_participante(){

        $participante = $this->participante_dao->get_participante_by_id($_GET["id"]);

        $this->participante->set_id($participante->id);
        $this->participante->set_nome($participante->nome);
        $this->participante->set_autor($participante->autor);
        $this->participante->set_descricao($participante->descricao);
        $this->participante->set_imagem($participante->imagem);

        $this->session->set_userdata("participante_imagem", $this->participante->get_imagem());
        $all_users = $this->adm_user_dao->get_all_users();

        $this->load->view("adm/editar_participante", array("participante" => $this->participante, "usuario" => $all_users));

    }

    public function edicao_participante(){

        $this->participante->set_id($_POST["participante_id"]);
        $this->participante->set_nome($_POST["participante_nome"]);
        $this->participante->set_descricao($_POST["participante_descricao"]);
        $this->participante->set_autor($_POST["participante_autor"]);

        if($_FILES["participante_imagem"]["name"] != ""){

            $this->participante->set_imagem($_FILES["participante_imagem"]);
            $imagem = $_FILES["participante_imagem"]["name"];

        }else{

            $this->participante->set_imagem($this->session->userdata("participante_imagem"));
            $imagem = $this->session->userdata("participante_imagem");

        }

        $all_users = $this->adm_user_dao->get_all_users();

        if($this->participante_dao->update_participante($this->participante)){

            $this->participante->set_imagem($imagem);
            $this->load->view("adm/editar_participante", array("sucesso_edicao_participante" => "Participante editado com sucesso!", "participante" => $this->participante, "usuario" => $all_users));

        }else{

            $this->error["erro_edicao_participante"] = "Erro na edição do participante!";
            $this->load->view("adm/editar_participante", $this->error);

        }

    }

    public function excluir_participante(){

        if($this->participante_dao->delete_participante($_GET["id"])){

            $participantesQuery = $this->participante_dao->get_all_participantes();

            $this->load->view("adm/visualizar_participantes", array("sucesso_exclusao_participante" => "Participante excluído com sucesso!", "participantes" => $participantesQuery));

        }else{

            $participantesQuery = $this->participante_dao->get_all_participantes();

            $this->load->view("adm/visualizar_participantes", array("erro_exclusao_participante" => "Erro na exclusão do participante!", "participantes" => $participantesQuery));

        }


    }

}

?>
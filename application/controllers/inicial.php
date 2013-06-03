<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicial extends CI_Controller {

    function __construct(){

        parent::__construct();

	    $this->load->model('participante_dao');
	    $this->load->model('participante');
	    $this->load->model('disputa');
	    $this->load->model('disputa_dao');


        $this->load->view("header");

    }

	public function index(){

        $this->disputa();
		$this->load->view('footer');

	}

    public function disputa(){

        $disputas = $this->disputa_dao->get_all_disputas();
        //$this->session->set_userdata("disputas", $disputas);

        if(isset($_POST["id"])){

            $id = $_POST["id"];
            $ultimo = count($disputas) -1;

            for($i=0 ; $i < count($disputas) ; $i++){

                if($id == $disputas[$i]->id){

                    if($i-1 < 0){

                        $anterior = $disputas[$ultimo]->id;

                    }else{

                        $anterior = $disputas[$i-1]->id;

                    }

                    if($i+1 > $ultimo){

                        $proximo = $disputas[0]->id;

                    }else{

                        $proximo = $disputas[$i+1]->id;

                    }

                    $disputa = $disputas[$i];

                }

            }

            $participante1 = $this->participante_dao->get_participante_by_id($disputa->participante1);
            $participante2 = $this->participante_dao->get_participante_by_id($disputa->participante2);

            if(isset($_COOKIE["disputa_".$disputa->id]) && $_COOKIE["disputa_".$disputa->id] == $disputa->id){

                $votos = $this->disputa_dao->get_votos($disputa->id);

                echo "<h1 id='titulo_disputa'>$disputa->titulo</h1>

                      <a href='javascript: void(0)' onclick='get_disputa($anterior)'><< Anterior</a>
                      <a href='javascript: void(0)' onclick='get_disputa($proximo)'>Próxima >></a>

                      <article id='participante1'>
                        <img id='imagem_participante1' src='".site_url()."imagens/participantes/$participante1->imagem' />
                        <h2>$participante1->nome</h2>
                      </article>
                      <article id='participante2'>
                        <img id='imagem_participante2' src='".site_url()."imagens/participantes/$participante2->imagem' />
                        <h2>$participante2->nome</h2>
                      </article>

                      <div class='votos'>
                        <p class='resultado_voto' style='display:block;' id='votos_participante1'>$votos->participante1</p>
                        <p class='resultado_voto' style='display:block;' id='votos_participante2'>$votos->participante2</p>
                      </div>";

            }else{

                echo "<h1 id='titulo_disputa'>$disputa->titulo</h1>

                      <a href='javascript: void(0)' onclick='get_disputa($anterior)'><< Anterior</a>
                      <a href='javascript: void(0)' onclick='get_disputa($proximo)'>Próxima >></a>

                      <article id='participante1'>
                        <img id='imagem_participante1' src='".site_url()."imagens/participantes/$participante1->imagem' />
                        <h2>$participante1->nome</h2>
                        <a class='botao_votar' href='javascript: void(0)' onclick='registra_voto($disputa->id, \"participante1\")'>Votar!</a>
                        <img src='".site_url()."/imagens/carregando_voto.gif' class='carregando_voto' width='70px' height:'48px' />
                      </article>
                      <article id='participante2'>
                        <img id='imagem_participante2' src='".site_url()."imagens/participantes/$participante2->imagem' />
                        <h2>$participante2->nome</h2>
                        <a class='botao_votar' href='javascript: void(0)' onclick='registra_voto($disputa->id, \"participante2\")'>Votar!</a>
                        <img src='".site_url()."/imagens/carregando_voto.gif' class='carregando_voto' width='70px' height:'48px' />
                      </article>

                      <div class='votos'>
                        <p class='resultado_voto' id='votos_participante1'></p>
                        <p class='resultado_voto' id='votos_participante2'></p>
                      </div>";

            }


        }else{

            if( isset($disputas[0]) ) {

                $participante1 = $this->participante_dao->get_participante_by_id($disputas[0]->participante1);
                $participante2 = $this->participante_dao->get_participante_by_id($disputas[0]->participante2);

                $anterior = count($disputas) - 1;

                if(isset($_COOKIE["disputa_".$disputas[0]->id]) && $_COOKIE["disputa_".$disputas[0]->id] == $disputas[0]->id){
                    $votos = $this->disputa_dao->get_votos($disputas[0]->id);
                }else{
                    $votos = "";
                }

                if( count($disputas) > 1 ){ 

        		  $this->load->view('inicial', array("disputa" => $disputas[0], "participante1" => $participante1, "participante2" => $participante2, "proxima" => $disputas[1], "anterior" => $disputas[$anterior], "votos" => $votos));

                }else{

                  $this->load->view('inicial', array("disputa" => $disputas[0], "participante1" => $participante1, "participante2" => $participante2, "votos" => $votos));

                }

            }else{

                $this->load->view('inicial', array("disputa" => FALSE));

            }

        }

    }

    public function registrar_voto(){

        $disputa = $_POST["disputa"];
        $participante = $_POST["participante"];

        setcookie("disputa_".$disputa, $disputa, time()+10800, "/");
        
        if($this->disputa_dao->registrar_voto($disputa, $participante)){

            $votos = $this->disputa_dao->get_votos($disputa);

            echo "<p class='resultado_voto' id='votos_participante1'>$votos->participante1</p>
                  <p class='resultado_voto' id='votos_participante2'>$votos->participante2</p>";

        }else{

            echo "Houve um erro no registro do voto, desculpe-nos o transtorno. =(";

        }

    }

}

?>
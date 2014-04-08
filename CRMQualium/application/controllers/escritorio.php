<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escritorio extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    }  

	//Vista inicial
	public function index()
	{
		$this->area_Estatica();
		$this->load->view('escritorio');	
		
	}

	//...Funcion que carga la estructura inicial...//...cabecera..//menu...
	public function area_Estatica(){
		$this->load->view('cabecra_y_menu.html');
		$this->load->view('header');
		$this->load->view('menu');
	}

	public function clientes(){
	
		$this->area_Estatica();
		$this->load->view('modulo_Clientes.php');
		$link = $this->uri->segment(1);

		if($this->uri->segment(1) == 'modulo_cliente_nuevo')
		{
			$this->load->view($this->uri->segment(1));
		}
		if($this->uri->segment(1) == 'modulo_consulta_clientes')
		{
			$this->load->view($this->uri->segment(1));
		}
		if($this->uri->segment(1) == 'modulo_consulta_prospectos')
		{
			$this->load->view($this->uri->segment(1));
		}
		
	}

	public function proyectos(){
		$this->area_Estatica();
	}

	public function contratos(){
		$this->area_Estatica();
	}

	public function cotizacion(){
		$this->area_Estatica();
		$this->load->view('modulo_cotizaciones');
		if($this->uri->segment(1) == 'modulo_cotizaciones_nuevo')
		{
			$this->load->view($this->uri->segment(1));
		}
		if($this->uri->segment(1) == 'modulo_cotizaciones_consulta')
		{
			$this->load->view($this->uri->segment(1));
		}
	}

	public function facturas (){
		$this->area_Estatica();

	}

	public function actividades(){
		$this->area_Estatica();
	}

	public function catalogos(){
		$this->area_Estatica();
	}

	public function usuarios(){
		$this->area_Estatica();
	}

	public function configuracion(){
		$this->area_Estatica();
	}

}//FIN DE LA CLASE...

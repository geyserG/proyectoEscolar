<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'api.php';
class Escritorio extends Api {

	public function __construct() {
        parent::__construct();

        $this->load->model('model_customer', 'customer');

    }  

	//Vista inicial
	public function index()
	{
		$this->area_Estatica();
		$this->load->view('escritorio');	
		
	}

	//Toma la uri del modulo y la devuelve
	
	public function clientes(){
	
		$this->area_Estatica();
		$this->load->view('modulo_Clientes');
		$data['clientes'] = $this->customer->get_customers_model();

		if($this->ruta() == 'modulo_cliente_nuevo')
		{
			$this->load->view($this->ruta(), $data);
		}
		if($this->ruta() == 'modulo_consulta_clientes')
		{
			$this->load->view($this->ruta(), $data);
		}
		if($this->ruta() == 'modulo_consulta_prospectos')
		{
			$this->load->view($this->ruta());
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
		if($this->ruta() == 'modulo_cotizaciones_nuevo')
		{
			$this->load->view($this->ruta());
		}
		if($this->ruta() == 'modulo_cotizaciones_consulta')
		{
			$this->load->view($this->ruta());
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

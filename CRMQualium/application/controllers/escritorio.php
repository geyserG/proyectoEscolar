<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'api.php';
class Escritorio extends Api {

	public function __construct() {
        parent::__construct();

        $this->load->model('model_customer', 'customer');
        $this->load->model('modelo_servicios', 'serv');
        $this->load->model('model_contact', 'contacto');
        $this->load->model('modelo_representante', 'representa');
        $this->load->model('model_phone', 'telefono');
    }  

	//Vista inicial
	public function index()
	{
		$this->area_Estatica();
		$this->load->view('escritorio');	
		
	}

	public function clientes(){
	
		$this->area_Estatica();
		$this->load->view('modulo_Clientes');
		$data['clientes'] = $this->customer->get_customers_model();
		$data['telefonos'] = $this->telefono->get_p(NULL);

		if($this->ruta() == 'modulo_cliente_nuevo')
		{
			$data['servicios'] = $this->serv->get_sNuevoCliente();
			$this->load->view($this->ruta(), $data);
		}
		if($this->ruta() == 'modulo_consulta_clientes')
		{
			$data['servicios'] = $this->serv->get_sNuevoCliente();
			$data['contactos'] = $this->contacto->get_C(False);
			$data['representantes']=$this->representa->get_r(False);
			$this->load->view($this->ruta(), $data);
		}
		if($this->ruta() == 'modulo_consulta_prospectos')
		{
			$data['contactos'] = $this->contacto->get_C(False);
			$data['representantes'] = $this->representa->get_r(False);
			$this->load->view($this->ruta(),$data);
		}
		
	}

	public function proyectos(){
		$this->area_Estatica();
		$this->load->view('modulo_proyectos');

		if($this->ruta() == 'modulo_proyectos_nuevo')
		{
			$this->load->view($this->ruta());
		}
		if($this->ruta() == 'modulo_proyectos_consulta')
		{
			$this->load->view($this->ruta());
		}
	}

	public function contratos(){
		$this->area_Estatica();
		$this->load->view('modulo_contratos');

		if($this->ruta() == 'modulo_contratos_nuevo')
		{
			$this->load->view($this->ruta());
		}
		if($this->ruta() == 'modulo_contratos_historial')
		{
			$this->load->view($this->ruta());
		}
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

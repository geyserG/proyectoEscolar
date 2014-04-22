<?php
	/**
	* Operaciones en la base de datos con los clientes
	*/
	class Model_customer extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function insert_customer(){

		//ESTA LIBRERIA DESCOMPONE LOS INPUTS POST QUE LLEGAN COMO ARREGLO
		$this->load->library->('my_functions');	

		//Regresa el id del cliente insertado.
    	$cliente_id = $this->insert($this->input->post('nombreComercial'));

    	//LA FUNCION ARRAYPOST() DEVUELVE EL ID DEL ATRIBUTO Y EL VALOR DEL ATRIBUTO.

    	$nF 			= $this->my_functions->arraypost($this->input->post('nombreFiscal'));    	
    	$tC 			= $this->my_functions->arraypost($this->input->post('tipoCliente'));    	
    	$correo 		= $this->my_functions->arraypost($this->input->post('email'));    	
    	$giro 			= $this->my_functions->arraypost($this->input->post('giro'));    	
    	$direccion 		= $this->my_functions->arraypost($this->input->post('direccion'));    	
    	$rfc 			= $this->my_functions->arraypost($this->input->post('rfc'));    	
    	$comentario 	= $this->my_functions->arraypost($this->input->post('comentario'));    	
    	$representate 	= $this->my_functions->arraypost($this->input->post('representate'));    	
    	$pWeb 			= $this->my_functions->arraypost($this->input->post('paginaWeb'));   		
    	
    	//LA FUNCION PRE_INSERT DEVUELVE LAS VARIABLES ARRAY CON DOS DATOS 'id':1 'dato': 'nombre'
    	//SI ALGUNO DE ESTOS DOS FALTA LOS IGNORA.

    	$atributos_cliente = pre_insert($nF, $tC, $correo, $giro, $direccion, $rfc, $comentario, $representate, $pWeb);	
    		
		$this->db->insert_bacth('cliente_atributo', $atributos_cliente);

    	//TELEFONOS DEL CLIENTE Y DE LOS CONTACTOS.
    	$telefonos 			= $this->input->post('telefonos');//posible arreglo de objetos

    	$servicios_interes 	= $this->input->post('serviciosInteres');

    	$servicios_cliente 	= $this->input->post('serviciosCuenta');//Puede venir un arreglo
    	
    	$archivos 			= $this->input->post('archivos');//Pendiente de como pasarlo 	

    	
    	//$cliente_atributos = array('cliente_id' => , $cliente_id);

		}//	----------FUNCTION INSERT_CUSTOMER--------------


	


		public function get_customers_model()
		{
			$this->db->select('clientes.id, clientes.nombre, cliente_atributo.dato');
			$this->db->from('clientes');
			$this->db->join('cliente_atributo', 'cliente_atributo.cliente_id = clientes.id');
			$query = $this->db->get();			
			return $query->result_array();
		}

		public function update_customer(){

		}

		public function delete_customer(){

		}



	}//Fin de la clase Model_Customer		










	// $nF = $this->my_functions->arraypost($this->input->post('nombreFiscal'));
 //    	if($nF[0]&&$nF[1])
 //        {
 //            $data[0] =  array(  'cliente_id' => $cliente_id,
	// 			    			'atributo_id' => $nF[0],
	// 			    			'dato' => $nF[1]
 //                         );
 //        }

 //    	$tC = $this->my_functions->arraypost($this->input->post('tipoCliente'));
 //    	if($tC[0]&&$tC[1])
 //        {
 //            $data[1] =  array(  'cliente_id' => $cliente_id,
	// 			    			'atributo_id' => $tC[0],
	// 			    			'dato' => $tC[1]
 //                         );
 //        }

 //    	$correo = $this->my_functions->arraypost($this->input->post('email'));
 //    	if($coreo[0]&&$correo[1])
 //        {
 //            $data[2] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $correo[0],
	// 		    			  'dato' => $correo[1]
 //                         );
 //        }

 //    	$giro = $this->my_functions->arraypost($this->input->post('giro'));
 //    	if($giro[0]&&$giro[1])
 //        {
 //            $data[3] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $giro[0],
	// 		    			  'dato' => $giro[1]
 //                         );
 //        }

 //    	$direccion = $this->my_functions->arraypost($this->input->post('direccion'));
 //    	if($direccion[0]&&$direccion[1])
 //        {
 //            $data[4] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $direccion[0],
	// 		    			  'dato' => $direccion[1]);
 //        }

 //    	$rfc = $this->my_functions->arraypost($this->input->post('rfc'));
 //    	if($rfc[0]&&$rfc[1])
 //        {
 //            $data[5] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $rfc[0],
	// 		    			  'dato' => $rfc[1]);
 //        }

 //    	$comentario = $this->my_functions->arraypost($this->input->post('comentario'));
 //    	if($comentario[0]&&$comentario[1])
 //        {
 //            $data[6] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $comentario[0],
	// 		    			  'dato' => $comentario[1]);
 //        }

 //    	$representate = $this->my_functions->arraypost($this->input->post('representate'));
 //    	if($comentario[0]&&$comentario[1])
 //        {
 //            $data[7] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $representate[0],
	// 		    			  'dato' => $representate[1]);
 //        }

 //    	$pWeb = $this->my_functions->arraypost($this->input->post('paginaWeb'));
 //    	if($comentario[0]&&$comentario[1])
 //        {
 //            $data[7] =  array('cliente_id' => $cliente_id,
	// 		    			  'atributo_id' => $pWeb[0],
	// 		    			  'dato' => $pWeb[1]);
 //        }
    	
<?php
	/**
	* Operaciones en la base de datos con los clientes
	*/
  # Modelo Relación de Id´s cliente, representante o contacto con Id´s de telefonos
	include 'modelo_rit.php';

	class Model_customer extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();			
		}

		function insert_customer($post)
		{				
			$x=0; # Este es un contador para mi array de inserción...	
			# Se almacena al cliente en la base de datos... 						
			$query = $this->db->insert('clientes', array('nombreComercial'=>$post['nombreComercial'], 'tipoCliente'=>$post['tipoCliente']));
			# devolvemos su id_cliente para registrar sus atributos...
			$idcliente = $this->db->insert_id();

			# Traemos la tabla de atributos
			$this->db->select('*');
			$atr = $this->db->get('atributo_cliente');

			# Recorremos la consulta de los atributos para conocer el id de cada atributo			
			foreach ($atr->result() as $key => $value) {

				# Recorremos el post...
				foreach ($post as $key2 => $value2) {
					# Verificamos que campos post tienen valor
					if($value2)
					{	
						# Comparamos si la clave del arreglo $post es igual al valor del objeto $value->atributo...
						if($key2==$value->atributo){
							# Si son identicos entonces ya conocemos con certeza a que clave pertenece cada valor...
							# Rellenamos el array con todos los datos no nulos del post...
							$data[$x] = array(  'idcliente' => $idcliente,
							   			   		'idatributo' => $value->id,
						    			   		'dato' => $value2
		                         		 	 );	
							#incrementamos nuestro contador para cambiar la posición de data
							$x++;							
						} # Fin del if($key2)
					}# Fin del if($value2)
				} # Fin del foreach $post...
			}# Fin del foreach $atributos...

			# Ahora una vez armado el array con los atributos del cliente hacemos una inserción en la bd...
			$query = $this->db->insert_batch('cliente_atributo', $data);

			if(array_key_exists('telefonos', $post)){
			 	$obj = new modelo_rit();
			 	$resp = $obj->relacionTelefonos('telefonos_cliente', 'idcliente', $idcliente, $post['telefonos']);
  		  	}	
	
			# Aquí se inserta los servicios que le interesa al cliente o prospecto...			
			if(array_key_exists('serviciosInteres', $post)){

				$tabla='servicios_interes';
				$this->insert_sic($post['serviciosInteres'], $idcliente, $tabla);	
			}
  		    	if(array_key_exists('serviciosCuenta',$post)){
  		       	$tabla='servicios_cliente';
				$this->insert_sic($post['serviciosCuenta'], $idcliente, $tabla);	
			}	
		
  	    # $archivos 			= $this->input->post('archivos');//Pendiente de como pasarlo 	
			return $idcliente;

		}//	----------FUNCTION INSERT_CUSTOMER--------------

	
		public function get_customers_model()
		{
			$cont=0;
			$conts=0;
			$contz=0;
			$resp = array();

			###############################################
			$this->db->select('*');
			$cliente = $this->db->get('clientes');
			###############################################
			
			$this->db->select('cliente_atributo.idcliente, atributo_cliente.atributo, cliente_atributo.dato');
			$this->db->from('cliente_atributo'); # de la tabla cliente_atributo
			$this->db->join('atributo_cliente', 'atributo_cliente.id = cliente_atributo.idatributo');
			$atributos = $this->db->get();	
			################################################

			$this->db->select('servicios.nombre, servicios_interes.idcliente');
			$this->db->from('servicios'); # de la tabla cliente_atributo
			$this->db->join('servicios_interes', 'servicios_interes.idservicio = servicios.id');
			$serviciosI = $this->db->get();				
			################################################

			$this->db->select('servicios.nombre, servicios_cliente.idcliente');
			$this->db->from('servicios'); # de la tabla cliente_atributo
			$this->db->join('servicios_clientes', 'servicios_cliente.idservicio = servicios.id');
			$serviciosC = $this->db->get();				
			################################################

			$this->db->select('telefonos.id, telefonos.numero, telefonos.tipo, telefonos_cliente.idcliente, telefonos_cliente.idtelefono');
			$this->db->from('telefonos'); # de la tabla cliente_atributo
			$this->db->join('telefonos_cliente', 'telefonos_cliente.idtelefono = telefonos.id');
			$telefonos = $this->db->get();				
			################################################


			if($cliente->result())
			{
			    foreach ($cliente->result() as $key) 
			    {				

			 		foreach ($atributos->result() as $key2=>$value)
			 		{ 
			 			if($key->id==$value->idcliente)
				 		{
				 			$datos[$cont]['id'] = $key->id;
				 			$datos[$cont]['nombreComercial'] = $key->nombreComercial;
				 			$datos[$cont]['tipoCliente'] = $key->tipoCliente;
				 			$datos[$cont][$value->atributo] = $value->dato;
				 					 			
				 		} # Fin del If

				 	} # Fin del foreach() $atributos

				 	foreach ($serviciosI->result() as $serv=>$value) 
				 	{
		 				if($value->idcliente==$key->id)
		 				{
	 					   $datos[$cont]['serviciosInteres'][$conts] = $value->nombre;
	                	   $conts++;
				 		}				 			
				 	}

				 	foreach ($serviciosC->result() as $servC=>$valueC) 
				 	{
		 				if($valueC->idcliente==$key->id)
		 				{
	 					   $datos[$cont]['serviciosInteres'][$conts] = $value->nombre;
	                	   $conts++;
				 		}				 			
				 	}

				 	foreach ($telefonos->result() as $tele=>$vals) 
				 	{
				 		if($vals->idcliente==$key->id)
				 		{
				 			$datos[$cont]['telefonosCliente'][$contz]= array('telefono'=>$vals->numero, 'tipo'=>$vals->tipo);
				 			$contz++;			 				
				 		}
				 	}
				 	 	
			 		$cont++;
			    }# Fin del foreach() $clientes
					return $datos;	
			}
			else{
				
				return false;			
			}

		} # Fin de la función get_customers_model()

		
		// public function update_customer($id, $put){

		// 	# La propiedad visible archiva al cliente como si estuviera eliminado a la vista de un usuario normal...
		// 	# Solo el superusuario podrá eliminar al cliente...
		// 	if(key($put)=='visible'){

		// 		$this->db->where('id', $id);
  		//      $query = $this->db->update('clientes', $put);
		// 	}else{

		// 	}
		
		// 	return $query;			

		// }

		// public function delete_customer($id){

		// 	$query = $this->db->delete('clientes', array('id' => $id));
  		//    	return $query;
		// }

		# Esta funcion establece la relacion cliente servicio...
		public function insert_sic($servicios, $idc, $tabla)
		{
			if(is_array($servicios))
			{
				for ($i=0; $i < count($servicios); $i++) { 
					$query = $this->db->insert($tabla,array('idcliente' => $idc, 'idservicio'=> $servicios[$i]));					
				} # Fin del for
			} # Fin del if
			else{
				$query = $this->db->insert($tabla, array('idcliente' => $idc, 'idservicio'=> $servicios));
			} # Fin del else
			
			return $query;
		}# Fin del metodo insertar servicios...




		
	}//Fin de la clase Model_Customer		


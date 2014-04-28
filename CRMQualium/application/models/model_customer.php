<?php
	/**
	* Operaciones en la base de datos con los clientes
	*/
	include 'model_phone.php';
	class Model_customer extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();			
		}

<<<<<<< HEAD
		public function insert_customer(){

		}

		public function get_customers_model()
		{
			$query = $this->db->get('clientes');
			return $query->result_array();
		}

		public function update_customer(){

		}

		public function delete_customer(){

		}



	}//Fin de la clase Model_Customer		
=======
		function set_tel(){
			$obj = new model_phone();
			return $obj;
		}

		public function insert_customer($post){	

			// $x=0; # Este es un contador para mi array de inserción...	

			// # Se almacena al cliente en la base de datos... 						
			// $this->db->insert('clientes', array('nombreComercial'=>$post['nombreComercial'], 'tipoCliente'=>$post['tipoCliente']));
			// # devolvemos su id_cliente para registrar sus atributos...
			// $id_cliente = $this->db->insert_id();

			// # Traemos la tabla de atributos
			// $this->db->select('*');
			// $atr = $this->db->get('atributo_cliente');

			// # Recorremos la consulta de los atributos para conocer el id de cada atributo			
			// foreach ($atr->result() as $key => $value) {

			// 	# Recorremos el post...
			// 	foreach ($post as $key2 => $value2) {
			// 		# Verificamos que campos post tienen valor
			// 		if($value2)
			// 		{	
			// 			# Comparamos si la clave del arreglo $post es igual al valor del objeto $value->atributo...
			// 			if($key2==$value->atributo){
			// 				# Si son identicos entonces ya conocemos con certeza a que clave pertenece cada valor...
			// 				# Rellenamos el array con todos los datos no nulos del post...
			// 				$data[$x] = array(  'cliente_id' => $id_cliente,
			// 				   			   		'atributo_id' => $value->id,
			// 			    			   		'dato' => $value2
		 //                         		 	 );	
			// 				#incrementamos nuestro contador para cambiar la posición de data
			// 				$x++;							
			// 			} # Fin del if($key2)
			// 		}# Fin del if($value2)
			// 	} # Fin del foreach $post...
			// }# Fin del foreach $atributos...

			// # Ahora una vez validado los registros que contienen valores procedemos a la inserción en la bd...
			// $query = $this->db->insert_batch('cliente_atributo', $data);

			// $tel = $this->set_tel();

			// $id_tel = $tel->insert_p($post['telefonos']);
			// return $query;
			var_dump($post);
			die();

			
			// # Llama al metodo insert_phones y le manda la variable de telefonos para que se encargue
			// # de registralos en la bd y devuelve "el id" o "los id´s" para posteriores operaciones... 
			// $id_tel = $this->insert_phones($post);
		
				 		
	 	// 	# El metodo insert_phones_customer asocia el id de cliente con "el id" o "id´s" de los telefonos
	 	// 	# si se realizo devuelve un booleano
	 	// 	$respT = $this->insert_phones_customer($id_tel, $id_cliente);

			// # Aquí se inserta los servicios que le interesa al cliente o prospecto...
			// if($post->serviciosInteres===true){
			// 	$respSI = $this->insert_servicios_interes($post->serviciosInteres, $id_cliente);	
			// }
			
			// return $post; 	
			  //   	$archivos 			= $this->input->post('archivos');//Pendiente de como pasarlo 	


		}//	----------FUNCTION INSERT_CUSTOMER--------------

			// # Armamos el arreglo para la inserción de la relación de los id´s
			// $phone_customer = array('cliente_id'=>$post['cliente_id'],
			// 						'telefono_id' =>$phone_id);
			// # Aquí relcionamos los id´s del telefono y de la persona a quien pertenece
			// $query2 = $this->db->insert('telefonos_cliente', $phone_customer);

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
			
			$this->db->select('cliente_atributo.cliente_id, atributo_cliente.atributo, cliente_atributo.dato');
			$this->db->from('cliente_atributo'); # de la tabla cliente_atributo
			$this->db->join('atributo_cliente', 'atributo_cliente.id = cliente_atributo.atributo_id');
			$atributos = $this->db->get();	
			################################################

			$this->db->select('servicios.nombre, servicios_interes.cliente_id');
			$this->db->from('servicios'); # de la tabla cliente_atributo
			$this->db->join('servicios_interes', 'servicios_interes.servicio_id = servicios.id');
			$serviciosI = $this->db->get();	
			
			################################################

			$this->db->select('telefonos.id, telefonos.numero, telefonos.tipo, telefonos_cliente.cliente_id, telefonos_cliente.telefono_id');
			$this->db->from('telefonos'); # de la tabla cliente_atributo
			$this->db->join('telefonos_cliente', 'telefonos_cliente.telefono_id = telefonos.id');
			$telefonos = $this->db->get();	
			
			################################################

			foreach ($cliente->result() as $key) {				

			 	foreach ($atributos->result() as $key2=>$value) {
			 		
			 		if($key->id==$value->cliente_id){

			 			$datos[$cont]['id'] = $key->id;
			 			$datos[$cont]['nombreComercial'] = $key->nombreComercial;
			 			$datos[$cont]['tipoCliente'] = $key->tipoCliente;
			 			$datos[$cont][$value->atributo] = $value->dato;
			 					 			
			 		} # Fin del If

			 	} # Fin del foreach() $atributos
			 	foreach ($serviciosI->result() as $serv=>$value) {
			 				if($value->cliente_id==$key->id){
			 					$datos[$cont]['serviciosInteres'][$conts] = $value->nombre;
			 					 $conts++;
			 				}
			 			
			 		}
			 	foreach ($telefonos->result() as $tele=>$vals) {
			 				if($vals->cliente_id==$key->id){
			 					$datos[$cont]['telefonosCliente'][$contz]= array('telefono'=>$vals->numero, 'tipo'=>$vals->tipo);#[$contz] = $vals->numero;
			 					$contz++;
			 					
			 				}
			 	}	
			 	$cont++;
			}# Fin del foreach() $clientes

			return $datos;			
		} # Fin de la función get_customers_model()

		
		public function update_customer($id, $put){

			# La propiedad visible archiva al cliente como si estuviera eliminado a la vista de un usuario normal...
			# Solo el superusuario podrá eliminar al cliente...
			if(key($put)=='visible'){

				$this->db->where('id', $id);
       			$query = $this->db->update('clientes', $put);
			}else{

			}
		
			return $query;			

		}

		public function delete_customer($id){

			$query = $this->db->delete('clientes', array('id' => $id));
        	return $query;
		}


		public function insert_servicios_interes($servicios, $id_cliente)
		{
			if(is_array($servicios))
			{
				for ($i=0; $i < count($servicios); $i++) { 
					$this->db->insert('servicios_interes', array('cliente_id' => $id_cliente, 
																 'servicio_id'=> $servicios[$i])
									 );
				} # Fin del for
			} # Fin del if
			else{

				$this->db->insert('servicios_interes', array('cliente_id' => $id_cliente, 
															 'servicio_id'=> $servicios)
								 );
			} # Fin del else
		}# Fin del metodo insertar servicios...

	    public function insert_phones($post){

	    	if($post->telefonosCliente){

				if(is_array($post->telefonosCliente))
				{

					for ($i=0; $i < count($post->telefonosCliente); $i++) { 

						$this->db->insert('telefonos', array( 'numero'=>$post->telefonosCliente[$i]->telefono,
															  'tipo'=>$post->telefonosCliente[$i]->tipo)
										  );
						$id[$i] = $this->db->insert_id();
					}
					return $id;
				}
				else
				{
					$this->db->insert('telefonos', array( 'numero'=>$post->telefonosCliente->telefono,
														  'tipo'=>$post->telefonosCliente->tipo)
									 );
					return $this->db->insert_id();
				}
			} # If telefonosCliente...
			else{

				$this->db->insert('telefonos', array( 'numero'=>$post->numero,
					 									  'tipo'=>$post->tipo)
									 );
					return $this->db->insert_id();
				

			} #Fin del if telefonosCliente...

		} # Fin del metodo insert_phones();

		public function insert_phones_customer($id_tel, $id_cliente)
		{
			if(is_array($id_tel))
	 		{
	 			for ($t=0; $t < count($id_tel) ; $t++) { 
	 				$this->db->insert('telefonos_cliente', array('cliente_id'=>$id_cliente, 'telefono_id'=>$id_tel[$t]));
	 			}
	 			return true;
	 		}
	 		else{
	 			$this->db->insert('telefonos_cliente', array('cliente_id'=>$id_cliente, 'telefono_id'=>$id_tel));
	 			return true;
	 		}
		} # Fin de la función insert_phones_customer()

	}//Fin de la clase Model_Customer		
>>>>>>> 8a291be3c6e70f79df879c2411b3ab31bd995840

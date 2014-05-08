<?php
	/**
	* Operaciones en la base de datos con los clientes
	*/
  # Modelo Relación de Id´s cliente, representante o contacto con Id´s de telefonos
	include 'modelo_rit.php';

	class Model_customer extends CI_Model
	{
		
		public function __construct(){}

		function insert_customer($post)
		{	$obj = new modelo_rit();			
			$x=0; # Este es un contador para mi array de inserción...	
			# Se almacena al cliente en la base de datos... 						
			$query = $this->db->insert('clientes', array('nombreComercial'=>$post['nombreComercial'], 
														 'tipoCliente'=>$post['tipoCliente'],
														 'fechaCreacion'=>$post['fechaCreacion'],
														 'visibilidad'=>$post['visibilidad'],));
			# devolvemos su id_cliente para registrar sus atributos...
			$idcliente = $this->db->insert_id();

			# Traemos la tabla de atributos
			$this->db->select('*');			$atr = $this->db->get('atributo_cliente');

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
			 	$resp = $obj->relacionTelefonos('telefonos_cliente', 'idcliente', $idcliente, $post['telefonos']); 	}	
	
			# Aquí se inserta los servicios que le interesa al cliente o prospecto...			
			if(array_key_exists('serviciosInteres', $post))
			{	 $tabla='servicios_interes';	$obj->insert_sic($post['serviciosInteres'], $idcliente, $tabla);	}

  		    if(array_key_exists('serviciosCuenta',$post))
  		    {	 $tabla='servicios_cliente'; 	$obj->insert_sic($post['serviciosCuenta'], $idcliente, $tabla);	}	
		
  	    	# $archivos 			= $this->input->post('archivos');//Pendiente de como pasarlo 	
			return $idcliente;

		}//	----------FUNCTION INSERT_CUSTOMER--------------

	
		public function get_customers_model()
		{
			
			$obj = new modelo_rit();
			###$cont RELLENA EL ARREGLO DATOS, $contrep RELLENA EL ARRELGO DE REPRESENTANTES y $conCont CONTACTOS###
			$cont=0;	$contrep=0;		$contCont=0; $contTCont=0;
			#############################TRAEMOS A TODOS LOS CLIENTES#######################################
			$this->db->select('*');
			$this->db->where('visibilidad', 1);
			$cliente = $this->db->get('clientes');
			#################################################ATRIBUTOS DEL CLIENTE##################################
			$this->db->select('cliente_atributo.idcliente, atributo_cliente.atributo, cliente_atributo.dato');
			$this->db->from('cliente_atributo'); # de la tabla cliente_atributo
			$this->db->join('atributo_cliente', 'atributo_cliente.id = cliente_atributo.idatributo');
			$atributos = $this->db->get();			
			########Enviamos al metodo joinDinamico los campos y el nombre de las tablas que queremos consultar#####									
			# Hay Clientes????
			if($cliente->result())
			{
			    foreach ($cliente->result() as $key) 
			    {	
			 		foreach ($atributos->result() as $key2=>$value)
			 		{ 
			 			# EL id del cliente es igual al idCliente de la tabla atributos????
			 			if($key->id==$value->idcliente)
				 		{
				 			$datos[$cont]['id'] = $key->id;
				 			$datos[$cont]['nombreComercial'] = $key->nombreComercial;
				 			$datos[$cont]['tipoCliente'] = $key->tipoCliente;
				 			$datos[$cont][$value->atributo] = $value->dato;
											 					 			
				 		} # Fin del If

				 	} # Fin del foreach() $atributos

					# Hacemos un join para buscar los nombres de los servicios atraves de las relaciones de sus id´s
				 	$serviciosI = $obj->joinDinamico($key->id, 'idcliente', 'idservicio', 'servicios', 'servicios_interes');				 	
				 	foreach ($serviciosI as $serv=>$value) 	{ $datos[$cont]['serviciosInteres'] = $serviciosI;	}

				 	# Hacemos un join para buscar los nombres de los servicios atraves de las relaciones de sus id´s
				 	$serviciosC = $obj->joinDinamico($key->id, 'idcliente', 'idservicio', 'servicios', 'servicios_cliente');
				 	foreach ($serviciosC as $servC=>$valueC) {	$datos[$cont]['serviciosCuenta'] = $serviciosC;	}
				
				 	$datos[$cont]['telefonosCliente'] = $obj->joinDinamico($key->id, 'idcliente', 'idtelefono', 'telefonos', 'telefonos_cliente');	 				 	 	
			 		$cont++;
			    }# Fin del foreach() $clientes
				return $datos;	
			}
			else{return false;}

		} # Fin de la función get_customers_model()

		public function update_customer($id, $iput){

			$x=0; $cliente = array();  $cont=0;
			$this->db->select('*');			
			$atr = $this->db->get('atributo_cliente'); # Consulto la lista de atributos...
            $put = (array)$iput;
			# La propiedad visible ya no muestra al cliente a un usuario normal simula una eliminación...
			# Solo el superusuario podrá eliminar al cliente...
			if(array_key_exists('visibilidad', $put)){
 				
						 $this->db->where('id', $id);
  		        $query = $this->db->update('clientes', array('visibilidad'=> $put['visibilidad']));
			}
			else
			{
				foreach ($put as $key => $value) 
				{					
					if($key=='nombreComercial'||$key=='tipoCliente'||$key=='fechaCreacion')
					{
						$cliente[$key] = $value; # Relleno un array para la tabla de clientes
					} #IF
					else
					{
						foreach ($atr->result() as $keya => $valuea) 
						{
							if($valuea->atributo===$key) # $Key Coincide con algun dato de la lista atributos?
							{	
								# Consulto si existe el idcliente y el id del $key en la tabla de cliente_atributo
								$where=array('idcliente'=>$id, 'idatributo'=>$valuea->id);
								$query = $this->db->get_where('cliente_atributo',$where);

								if($query->result()){  # Si existe actualizalo

									$this->db->where($where);
				  		       		$queryA = $this->db->update('cliente_atributo', array('dato'=>$value));
								} # if
								else # Si no Existe crealo...
								{
									$queryA = $this->db->insert('cliente_atributo', array('idcliente'=>$id, 'idatributo'=>$valuea->id, 'dato'=>$value));
								} # else
							} #IF

						} #Foreach											
					} # Else
				}#Foreach		
				$this->db->where('id', $id);	
				$query = $this->db->update('clientes', $cliente); # Aquí Actualizamos los datos de la tabla cliente...
			}# else
			
		 return $query;			
		} # Fin del update_customer....

		public function delete_customer($id){

			$query = $this->db->delete('clientes', array('id' => $id));
  		   	return $query;
		}

		
	}//Fin de la clase Model_Customer		


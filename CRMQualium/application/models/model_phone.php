<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/
	class Model_phone extends CI_Model
	{
		
		function __construct()
		{
			
		}

		public function insert_p($post)
		{
			// if(is_object($post)){ $post = (array)$post; }
		    $phone =  array('idpropietario'=>$post['idpropietario'], 'tabla'=>$post['tabla'], 
			   				'numero'	   =>$post['numero'],        'tipo' =>$post['tipo']);
			return $this->db->insert('telefonos', $phone);
		}
		
		public function get_p($id=FALSE)
		{
			$this->db->select('*');
			($id===FALSE) ? $query = $this->db->get('telefonos') : $this->db->where('id', $id); $query = $this->db->get('telefonos');			
			return $query->result();	
		}

		public function patch_p($id, $put)
		{
			// if(!$id)
			// {
			// 	$this->db->insert('telefonos',$put);
			// }
			$this->db->where('id', $id);
			$query = $this->db->update('telefonos', $put);
			return $query;
		}
		public function update_p($id, $put)
		{

			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('telefonos', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_p($id)
		{
			$query = $this->db->delete('telefonos', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones

	// if($post){

	// 			# Es un array?...existe la posición 0?
	// 			if(is_array($post)&&array_key_exists(0, $post))
	// 			{

	// 				for ($i=0; $i < count($post); $i++) 
	// 				{ 
	// 					$this->db->insert('telefonos', array( 'numero'=>$post[$i]->numero,
	// 														  'tipo'  =>$post[$i]->tipo));
	// 					$id[$i] = $this->db->insert_id();
	// 				}
	// 				return $id;
	// 			} # Fin del if $post igual a array y existe la posición 0
	// 			else
	// 			{
	// 				if(is_object($post)){ $post = (array)$post; }

	// 				$this->db->insert('telefonos', array( 'numero'=>$post['numero'],
	// 													  'tipo'  =>$post['tipo']));
	// 				return $this->db->insert_id();
	// 			} # Fin del else

	// 		} #Fin if si $post es verdadero...		
	// 		else{
	// 			# Si no tiene telefono...
	// 			return false;
	// 		}
	// if(array_key_exists(0, $post['telefonos']))
	// 		{
	// 			for ($i=0; $i < count($post['telefonos']); $i++) 
	// 			{ 
	// 				$phone[$i] = array('idpropietario'=>$idcliente, 'tabla'=>'clientes', 'numero'=>$post['telefonos'][$i]->numero, 
	// 									'tipo'=>$post['telefonos'][$i]->tipo);
	// 			}
	// 			$query = $this->db->insert_batch('telefonos', $phone);
	// 		}
	// 		else
	// 		{
	// 			$phone =  array('idpropietario'=>$idcliente, 'tabla'=>'clientes', 'numero'=>$post['telefonos']->numero, 'tipo'=>$post['telefonos']->tipo);
	// 			$query = $this->db->insert('telefonos', $phone);
	// 		}
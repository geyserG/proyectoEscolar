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
			# $post es true?
			if($post){

				# Es un array?...existe la posición 0?
				if(is_array($post)&&array_key_exists(0, $post))
				{

					for ($i=0; $i < count($post); $i++) 
					{ 
						$this->db->insert('telefonos', array( 'numero'=>$post[$i]->numero,
															  'tipo'  =>$post[$i]->tipo));
						$id[$i] = $this->db->insert_id();
					}
					return $id;
				} # Fin del if $post igual a array y existe la posición 0
				else
				{
					if(is_object($post)){ $post = (array)$post; }

					$this->db->insert('telefonos', array( 'numero'=>$post['numero'],
														  'tipo'  =>$post['tipo']));
					return $this->db->insert_id();
				} # Fin del else

			} #Fin if si $post es verdadero...		
			else{
				# Si no tiene telefono...
				return false;
			}

	}# Fin del metodo insertar telefono.

		public function get_p($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('telefonos') : $this->db->where('id', $id); $query = $this->db->get('telefonos');			
			return $query->result();	
		}

		// public function patch_p()
		// {
		// 	$cont=0;
		// 	$columna = $this->db->field_data('telefonos');
		// 	foreach ($columna as $key) {
		// 		 $col[$cont] = $key->name; $cont++;
		// 	}
		// 	var_dump($col); die();
		// }
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
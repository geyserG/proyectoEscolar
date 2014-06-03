<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/
	class Modelo_CatalogoTelefonos extends CI_Model
	{
		
		function __construct(){	}

		public function insert_p($post)
		{
			// if(is_object($post)){ $post = (array)$post; }
		    if($post['tipo']||$post->tipo)
		    {
		    	$this->db->insert('catalogotelefonos', $post);	
		    	$id = $this->db->insert_id(); # Devolvemos el id
		    	return $this->get_p($id);
		    }
			return false;			
		}
		
		public function get_p($id=FALSE)
		{
			if(is_numeric($id))
			{ 
				$query = $this->db->get_where('catalogotelefonos', array('id'=>$id))->result();	
				($query) ? $query = $query[0] : $query = false;
				return $query;
			}
			return $this->db->get('catalogotelefonos')->result();		
			
		}

		public function update_p($id, $put)
		{
			(array_key_exists(0, $put)&&is_object($put[0])) ? $put = (array)$put[0] : $put = $put;
			if($put['tipo'])
			{
				$this->db->where('id', $id);	
				$this->db->update('catalogotelefonos', $put);
				return $this->get_p($id);
			}else{
				return false;
			}
			
		}

		public function delete_p($id)
		{
			$query = $this->db->delete('catalogotelefonos', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_CatalogoTelefonos
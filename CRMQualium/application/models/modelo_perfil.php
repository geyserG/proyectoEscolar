<?php
	/**
	* Permite crear nuevos perfiles con sus permisos
	* Operaciones en la tabla Servicios de la bd...
	*/
	class Modelo_perfil extends CI_Model
	{
		
		function __construct()
		{
						
		}

		public function insert_perfil($post)
		{ 		

			$query = $this->db->insert('perfil', $post);
			$query = $this->db->insert_id();
			return $query; 
		}

		public function get_perfil($id)
		{
			$permi=array();   
			$i=0;

	        $this->db->select('perfil.id, perfil.perfil, perfil_permisos.idpermiso');
	        $this->db->from('perfil');
	        $this->db->join('perfil_permisos', 'perfil_permisos.idperfil = perfil.id');
	        $perfil = $this->db->get();  
	        ################################################
	        $this->db->select('permisos.id, permisos.permiso');
	        $this->db->from('permisos'); 
	        $this->db->join('perfil_permisos', 'perfil_permisos.idpermiso = permisos.id');
	        $perper = $this->db->get(); 			
	        ################################################
			foreach ($perfil->result() as $key) 
			{
				if($key->id===$id)
				{	
					foreach ($perper->result() as $key2 => $value2) 
					{
						if($key->idpermiso==$value2->id)
						{	
							$permi['perfil'] = $key->perfil;
							$permi['permiso'][$i] =$value2->permiso; $i++;
						} # Fin de if key->idpermiso 	
					} # Fin del foreach $query2
				} # Fin del if key->id
			}# Fin del foreach $query
				
			return $permi;		
		} # Fin del metodo get_perfil() 

		public function update_perfil($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('perfil', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_perfil($id)
		{
			$query = $this->db->delete('perfil', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
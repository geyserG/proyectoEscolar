<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/
	class Modelo_proyecto extends CI_Model
	{
		
		function __construct(){	}

		public function insertProyecto($post)
		{
			$proyecto=false;
			$columna = $this->db->field_data('proyectos');
			if($post)
			{
				foreach ($columna as $key)
				{ 
					if(array_key_exists($key->name, $post)) # Existe la cabecera en el array $put?
					{
						$proyecto[$key->name] = $post[$key->name];	     		        		
					}
				} # Foreach
				
				if($proyecto!=NULL)
				{
					$query = $this->db->insert('proyectos', $proyecto);
					$id    = $this->db->insert_id();
					if(array_key_exists('servicios', $post))
			    	{ 
				      $tabla='proyectoservicios'; 
					  $this->insert_sic($post['servicios'], $id, $tabla);	
					}
					return $id;
				}
				
				return false; # False si el formulario no coincide con los campos de la bd				
			}
			return false; # False si el post esta vacio...
			
			
		} # Fin del metodo insertar proyectos.

		public function getProyecto($id=FALSE)
		{
			$this->db->select('*');
			($id===FALSE) ? $query = $this->db->get('proyectos') : $this->db->where('id', $id); $query = $this->db->get('proyectos');			
			return $query->result();				
		}

		public function patchProyecto($id, $put)
		{
			$this->db->where('id', $id);
			$query = $this->db->update('proyectos', $put);
			return $query;
		}
		public function updateProyecto($id, $put)
		{

			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('proyectos', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function deleteProyecto($id)
		{
			$query = $this->db->delete('proyectos', array('id' => $id));
			return $query;
		}

		# Esta funcion establece la relacion cliente servicio...
		public function insert_sic($servicios, $idc, $tabla)
		{
			if(is_array($servicios))
			{
				for ($i=0; $i < count($servicios); $i++) { 
					$query = $this->db->insert($tabla,array('idproyecto' => $idc, 'idservicio'=> $servicios[$i]));					
				} # Fin del for
			} # Fin del if
			else{
				$query = $this->db->insert($tabla, array('idproyecto' => $idc, 'idservicio'=> $servicios));
			} # Fin del else
			
			return $query;
		}# Fin del metodo insertar servicios...

	} # Fin de la clase Model_phones
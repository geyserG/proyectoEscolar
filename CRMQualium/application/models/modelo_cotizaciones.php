 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    require_once 'modelo_rit.php';
    class Modelo_cotizaciones extends CI_Model
    {          
        function obj(){  return $obj = new modelo_rit();  }

        function insert_cotizacion($post)
        {
            $query = $this->db->insert('cotizacion',array( 
                                                        'idcliente'      =>$post['idcliente'],
                                                        'idrepresentante'=>$post['idrepresentante'],
                                                        'fecha'          =>$post['fecha'],
                                                        'comentario'     =>$post['comentario']
                                                        ));
            # Recuperamos el id del contacto...
            $id = $this->db->insert_id();
            // $query = $this->db->insert('cotizacion_servicios',array('idcotizacion'=>$id, 
            //                                             'idservicio'  =>$post['idservicio'],
            //                                             'duracion'    =>$post['duracion'],
            //                                             'cantidad'    =>$post['cantidad'],
            //                                             'precio'      =>$post['precio'],
            //                                             'descuento'   =>$post['descuento'],
            //                                             ));
            foreach ($post as $key => $value)
            {
                $data[$key] = array('idcotizacion'=>$id, 
                                    'idservicio'  =>$post['idservicio'][$key],
                                    'duracion'    =>$post['duracion'][$key],
                                    'cantidad'    =>$post['cantidad'][$key],
                                    'precio'      =>$post['precio'][$key],
                                    'descuento'   =>$post['descuento'][$key]);                
            }
            # Enviamos a la inserción varias filas.
            $query = $this->insert_batch('cotizacion_servicios', $data);

            return $query;   

        } # Fin del metodo insert_mcontact()...

        function get_cotizacion($id=FALSE){          
       
            if($id!=FALSE)
            { 
                $query = $this->db->get_where('cotizacion', array('id'=>$id))->result(); 
                ($query) ? $query = $query[0] : $query = false;
                return $query;
            }
            return $this->db->get('cotizacion')->result();          
            
        
            // $cont=0; $cont2=0;  $obj = $this->obj();        
            // # Consulto los clientes junto con sus representantes...
            // $clienteRep = $obj->joinDinamico('noid', 'idcliente', 'id', 'representante', 'clientes');
            // # Consulto a todas las cotizaciones...
            //               $this->db->Select('*');
            // $cotizacion = $this->db->get('cotizacion');
            
            // # Consulto los servicios y la cotizacion_servicios para asignarle nombre a los id´s de servicios...
            // $this->db->select('cotizacion_servicios.idcotizacion, cotizacion_servicios.idservicio, servicios.nombre, 
            //                    cotizacion_servicios.duracion, cotizacion_servicios.cantidad, 
            //                    cotizacion_servicios.precio, cotizacion_servicios.descuento');
            // $this->db->from('servicios');
            // $this->db->join('cotizacion_servicios', 'cotizacion_servicios.idservicio=servicios.id');
            // $serv = $this->db->get();
            // # Recorro a los clientes                         
            // foreach ($clienteRep->result() as $key => $value) 
            // {   # El id que nos proporcionaron le pertenece a algun cliente...
            //     if($value->idcliente==$id)
            //     {
            //         # Recorro las cotizaciones...
            //         foreach ($cotizacion->result() as $key2 => $value2) 
            //         {   # El id de cliente es igual al idCliente de alguna cotización?...
            //             if($value->idcliente==$value2->idcliente)
            //             {   # Relleno un arreglo con los datos especificos de la cotización...
            //                 $array[$cont]['idcotizacion'] = $value2->id;
            //                 $array[$cont]['nombreComercial'] = $value->nombreComercial;
            //                 $array[$cont]['representante'] = $value->nombre;
            //                 $array[$cont]['fecha'] = $value2->fecha;
            //                 $array[$cont]['comentario'] = $value2->comentario;
            //                 # Recorro los servicios...
            //                 foreach ($serv->result_array() as $key3 => $value3) 
            //                 {   # El id de la cotización es igual al id de cotización_servicios?
            //                     if($value2->id==$value3['idcotizacion'])
            //                     {  # Si es cierto relleno este arreglo con los nombres correspondientes de los servicios
            //                        $array[$cont]['ServiciosCotizados'][$cont2][$key]=$value3; 
            //                        $array[$cont]['ServiciosCotizados'][$cont2][$key]=$value3; 
            //                        $array[$cont]['ServiciosCotizados'][$cont2][$key]=$value3; 
            //                        $array[$cont]['ServiciosCotizados'][$cont2][$key]=$value3; 
            //                        $array[$cont]['ServiciosCotizados'][$cont2][$key]=$value3;                                  
            //                        $cont2++;                                
            //                     } # if
            //                 }  $cont2++; # foreach
            //                 $cont++;
            //             } # if
            //         } # Foreach
            //     return $array; 
            //     }else{ return false; }# Si el cliente no tiene ninguna cotización retorno un false 
            // }# foreach
                   	
        } # Fin del metodo get_cotizacion()...

        function update_cotizacion(){
        	
          $contactos = array(
                                'nombre_completo' => $this->input->post('nombreContacto'),
                                'correo'          => $this->input->post('correoContacto'),
                                'cargo'           => $this->input->post('cargoContacto')
                             );//Verificar si es un arreglo

            $this->db->where('id', $id);
            $this->db->update('contacto', $contactos); 

        }
        private function delete_cotizacion($id){

            $query = $this->db->delete('contactos', array('id' => $id));
            return $query;
            
        }

}
 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    class Modelo_archivos extends CI_Model
    {          
        function obj(){  return $obj = new modelo_rit();  }

        function insert_cotizacion()
        {
            if(!is_dir("../../../img/fotosClientes/")) 
            mkdir("../../../img/fotosClientes/", 0777);
         
             // comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['fotoCliente']['tmp_name'],"../../../img/fotosClientes/".$file))
            {
                // sleep(3);//retrasamos la petición 3 segundos
                 // echo $file;//devolvemos el nombre del archivo para pintar la imagen
                 return true;
            } 

        } # Fin del metodo insert_mcontact()...

        function get_cotizacion($id){
           
        
                   	
        } # Fin del metodo get_cotizacion()...

        function update_cotizacion()
        {
        	
        }
        private function delete_cotizacion($id)
        {

        }

    } # Fin de la clase...
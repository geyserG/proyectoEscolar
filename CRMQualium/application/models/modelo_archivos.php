 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    class Modelo_archivos extends CI_Model
    {          
        function obj(){  return $obj = new modelo_rit();  }

        function insert_mult()
        {
            if(array_key_exists('fotoCliente', $_FILES))
            {
                $carpeta="img/fotosClientes/";
                opendir($carpeta);
                $destino=$carpeta.$_FILES['fotoCliente']['name'];  
                if(copy($_FILES['fotoCliente']['tmp_name'], $destino))
                {
                    return $_FILES['fotoCliente']['name'];
                } 
            }
            elseif(array_key_exists('fotoUsuario', $_FILES))
            {
                $carpeta="img/fotosUsuarios/";
                opendir($carpeta);
                $destino=$carpeta.$_FILES['fotoUsuario']['name'];  
                if(copy($_FILES['fotoUsuario']['tmp_name'], $destino))
                {
                    return $_FILES['fotoUsuario']['name'];
                }  
            }
            else
            {
                $carpeta="img/archivos/";
                opendir($carpeta);
                $destino=$carpeta.$_FILES['archivos']['name'];  
                if(copy($_FILES['archivos']['tmp_name'], $destino))
                {
                    return $_FILES['archivos']['name'];
                }
            }
          
        } # Fin del metodo insert_mcontact()...

        function get_mult($id)
        {
           
        
                   	
        } # Fin del metodo get_cotizacion()...
        function patch_mult($id, $put)
        {
            
        }
        function update_mult()
        {
        	
        }
        private function delete_mult($id)
        {

        }

    } # Fin de la clase...

    <link rel="stylesheet" type="text/css" href="css/estilos_modulo_clientes_nuevo.less">

    <!-- BOTON PARA PRUEBAS -->
    <!-- <button id="btn_eliminar">x</button> -->

    
    <div id="formularioCliente" class="visibleR">
        <!-- <button type="button" id="ir" class="btn btn-default btn-xs">Conmutar</button> -->
        <h3>Nuevo Cliente</h3>
        <hr>
        Tipo de cliente 
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" class="tipo_cliente" name="tipo_cliente" id="cliente" value="cliente"> Cliente
            </label>
            <label class="btn btn-primary">
                <input type="radio" class="tipo_cliente" name="tipo_cliente" id="prospecto" value="prospecto"> Prospecto
            </label>
        </div>

        <br>

        <div class="input_info">
            <input type="text" id="nombreComercial"  class="form-control" placeholder="Nombre comercial / Persona">
            <input type="text" id="nombreFiscal" class="form-control" placeholder="Nombre fiscal">
            <input type="email" id="email" class="form-control" placeholder="Email">

            <input type="text" id="rfc" class="form-control" placeholder="RFC">

            <input type="text" id="paginaCliente"  class="form-control" placeholder="Página web">
            <!-- <input type="text" class="form-control" placeholder="Telefono movil"> -->

            <!-- Este es el pequeño formulario para registrar teléfonos -->
              
        </div>

        <div class="input_info">
            <select id="giro" class= "form-control" > 
                <option value="" disabled style='display:none;'>Giro</option> 
                <option> Manufacturera </option> 
                <option> Agropecuaria </option> 
                <option> Comercial </option> 
                <option> Transporte </option> 
                <option> Educación </option> 
                <option> Servicios públicos </option>
                <option> Salud </option> 
                <option> Comunicación </option> 
                <option selected disabled>Giro</option>
            </select>
            <textarea id="txtareaDireccion" class="form-control" rows="3" placeholder="Dirección"></textarea>
            <!-- <input type="text" class="form-control" placeholder="Telefono de oficina"> -->
            <div>
                <div class="input-group">
                    <div class="btn-group">
                        <form>
                          <input type="text" class="form-control telefonoCliente" name="telefonoCliente" placeholder="Teléfono" maxlength="10"><!---->
                        </form>
                    </div>
                    <div class="btn-group">
                        <select class="form-control" name="tipoTelefonoCliente">
                            <option value="Casa">Casa</option>
                            <option value="Fax">Fax</option>
                            <option value="Movil" selected>Movil</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Personal">Personal</option>
                            <option value="Trabajo">Trabajo</option>
                            <option value="Otro">Otro</option>
                            <option selected disabled>Tipo</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <div class="otroTelefono"><button type="button" class="btn btn-default"><span class="icon-uniF476"></span></button></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="desborde"></div>

        <br>

        <div id='contenedor_menus'>
            <div class="menusServicios">
                <form>
                    <div class='cssmenu'>
                        <h5><b>Servicios que le interesa</b> </h5>
                        <input type="text" id="inputBusquedaI" class="form-control" placeholder="Buscar servicio">
                        <button type="button" id="btn_agregarI" class="btn btn-default">Agregar</button>
                        <ul id="I">
                            <li class='has-sub'><a href='#'><span>Servicios</span></a>
                                <ul id="menuServiciosInteres">
                                </ul>
                            </li>   
                        </ul>
                    </div>
                </form>
                <div class="desborde"></div>
                <br>
                <ol id="listaInteres" class="list-group"></ol>
            </div>
            <div class="menusServicios">
                <form>
                    <div class='cssmenu'>
                        <h5><b>Servicios con los que cuenta</b> </h5>
                        <input type="text" id="inputBusquedaC" class="form-control" placeholder="Buscar servicio">
                        <button type="button" id="btn_agregarC" class="btn btn-default">Agregar</button>
                        <ul id="C">
                            <li class='has-sub'><a href='#'><span>Servicios</span></a>
                                <ul id="menuServiciosCuenta">
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
                <div class="desborde"></div>
                <br>
                <ol id="listaCuenta" class="list-group"></ol>
            </div>
        </div>

        
        <div class="desborde"></div>
        
        <!-- <br> -->

        <div>
            <h5><b>Adjuntar foto o logotipo de cliente</b></h5>
            <form id="formularioFoto">
                <input type="file" id="fotoCliente" name="fotoCliente">
            </form>
            <div id="mensajeFoto"></div>
            <img id="direccion">
        </div>
        
        <br><br>

        <textarea id="comentarioCliente" rows="6" placeholder="Comentarios para el nuevo cliente"></textarea>

        <br><br>

        <button type="button" id="btn_cancelar" class="btn btn-default">Cancelar</button>
        <button type="button" id="btn_crear" class="btn btn-primary">Aceptar</button>
        <br>
        <br>
        <br>
    </div>
    <div id="formularioContacto" class="visibleR ocultoR">
        <!-- <button type="button" id="ir" class="btn btn-default btn-xs">Conmutar</button> -->
        <h3 id="h1_nombreCliente"></h3>
        <hr>
        <div class="dato_contacto">
            <div><h3>Datos de Representante</h3></div>
            <hr>
            <input type="text" id="nombreRepresentante"  class="form-control" placeholder="Nombre completo del representante">
            <input type="text" id="emailRepresentante" class="form-control" placeholder="Correo">
            <input type="text" id="cargoRepresentante" class="form-control" placeholder="Cargo">
            <div>
                <div class="input-group">
                    <div class="btn-group">
                      <form>
                        <input type="text"  class="form-control telefonoRepresentante" name="telefonoRepresentante" placeholder="Teléfono" maxlength="10">
                      </form>
                    </div>
                    <div class="btn-group">
                        <select class="form-control" name="tipoTelefonoRepresentante">
                            <option value="Casa">Casa</option>
                            <option value="Fax">Fax</option>
                            <option value="Movil" selected>Movil</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Personal">Personal</option>
                            <option value="Trabajo">Trabajo</option>
                            <option value="Otro">Otro</option>
                            <option selected disabled>Tipo</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <div class="otroTelefono"><button type="button" class="btn btn-default"><span class="icon-uniF476"></span></button></div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="dato_contacto">
            <div id="listaContactosCliente">
              <h3>Datos de contacto</h3><br><button id="btn_otroContacto" class="btn btn-default"><span class="icon-uniF476"></span></button>
            </div>
            <div class="desborde"></div>
            <hr>
            <input type="text" id="contactoNombre" class="form-control" placeholder="Nombre completo del contacto">
            <input type="text" id="contactoEmail" class="form-control" placeholder="Correo">
            <input type="text" id="contactoCargo" class="form-control" placeholder="Cargo">
            <div>
                <div class="input-group">
                    <div class="btn-group">
                      <form>
                        <input type="text"  class="form-control telefonoContacto" name="telefonoContacto" placeholder="Teléfono" maxlength="10">
                      </form>
                    </div>
                    <div class="btn-group">
                        <select class="form-control" name="tipoTelefonoContacto">
                            <option value="Casa">Casa</option>
                            <option value="Fax">Fax</option>
                            <option value="Movil" selected>Movil</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Personal">Personal</option>
                            <option value="Trabajo">Trabajo</option>
                            <option value="Otro">Otro</option>
                            <option selected disabled>Tipo</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <div class="otroTelefono"><button type="button" class="btn btn-default"><span class="icon-uniF476"></span></button></div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="desborde"></div>
        <br>
        <!-- <a href="modulo_consulta_clientes" id="btn_nuevoContacto" class="btn btn-primary" role="button">Registrar Contactos</a> -->
        <a href="modulo_consulta_clientes" class="btn btn-default">Cancelar</a>
        <button id="btn_nuevoContacto" class="btn btn-primary">Registrar Contactos</button> 
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregue otro contacto</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="otroContactoNombre" class="form-control" placeholder="Nombre completo del contacto">
                    <input type="text" id="otroContactoEmail" class="form-control" placeholder="Correo">
                    <input type="text" id="otroContactoCargo" class="form-control" placeholder="Cargo">
                    <div>
                        <div class="input-group">
                            <div class="btn-group">
                              <form>
                                <input type="text" class="form-control telefonoContacto" name="telefonoContacto" placeholder="Teléfono" maxlength="10">
                              </form>
                            </div>
                            <div class="btn-group">
                                <select class="form-control" name="tipoTelefonoContacto">
                                    <option value="Casa">Casa</option>
                                    <option value="Fax">Fax</option>
                                    <option value="Movil" selected>Movil</option>
                                    <option value="Oficina">Oficina</option>
                                    <option value="Personal">Personal</option>
                                    <option value="Trabajo">Trabajo</option>
                                    <option value="Otro">Otro</option>
                                    <option selected disabled>Tipo</option>
                                </select>
                            </div>
                            <div class="btn-group">
                                <div class="otroTelefono"><button type="button" class="btn btn-default"><span class="icon-uniF476"></span></button></div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_agregarContacto">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var app = app || {
        //Array de objetos de servicio que se 
        //resetea cada vez que se hace una búsqueda
        busqueda:{} 
    };
    app.coleccionDeClientes = <?php echo json_encode($clientes) ?>;
    app.coleccionDeServicios = <?php echo json_encode($servicios) ?>;

    //Funcion auto ejecutable. para renderizar la colección
    //de servicios cada vez que se haga una búsqueda en el
    //en este modulo de clientes.
    app.busqueda.servicio = (function () {
        buscarPorNombre = function (searchKey) {
            var deferred = $.Deferred();
            var results = servicios.filter(function (element) {
                var nombre = element.nombre;
                // console.log(nombre);
                // console.log(searchKey);
                return nombre.toLowerCase().indexOf(searchKey.toLowerCase()) > -1;
            });
            deferred.resolve(results);
            return deferred.promise();
        },
        servicios = app.coleccionDeServicios;

        // The public API
        return {
            buscarPorNombre: buscarPorNombre
        };
    }());


</script>

<!-- Plantillas -->
    <script type="text/template" id="serviciosI">
        <div>
            <label for="<%- id %>"><%- nombre %></label>
            <!--<label for="<%- id %>" class="concepto"><%- concepto %></label>-->
            <div class='check_posicion'>
                <input type="checkbox" class="serviciosInteres" name="nameServiciosInteres" id="<%- id %>">
            </div>
        </div>
    </script>
    <script type="text/template" id="serviciosC">
        <div>
            <label for="<%- 1+id %>"><%- nombre %></label>
            <!--<label for="<%- 1+id %>" class="concepto"><%- concepto %></label>-->
            <div class='check_posicion'>
                <input type="checkbox" class="serviciosCuenta" name="nameServiciosCuenta" id="<%- 1+id %>">
            </div>
        </div>
    </script>
<!-- Utilerias -->
    <script type="text/javascript" src="js/validaciones.js"></script>
<!-- Librerias Backbone -->
    <script type="text/javascript" src="js/backbone/lib/underscore.js"></script>
    <script type="text/javascript" src="js/backbone/lib/backbone.js"></script>
    <script type="text/javascript" src="js/backbone/lib/backbone.localStorage.js"></script>
<!--MV*-->
    <script type="text/javascript" src="js/backbone/modelos/ModeloContacto.js"></script>
    <script type="text/javascript" src="js/backbone/modelos/ModeloRepresentante.js"></script>
    <script type="text/javascript" src="js/backbone/modelos/ModeloCliente.js"></script>
    <script type="text/javascript" src="js/backbone/modelos/ModeloTelefono.js"></script>
    <script type="text/javascript" src="js/backbone/modelos/ModeloServicio.js"></script>
    <!-- <script type="text/javascript" src="js/backbone/modelos/ModeloArchivo.js"></script> -->
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionServicios.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionTelefonos.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionContactos.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionRepresentantes.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionClientes.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionServicios.js"></script>
    <!-- <script type="text/javascript" src="js/backbone/colecciones/ColeccionArchivos.js"></script> -->
    <!-- <script type="text/javascript" src="js/backbone/vistas/VistaContacto.js"></script> -->
    <!-- <script type="text/javascript" src="js/backbone/vistas/VistaCliente.js"></script> -->
    <!--<script type="text/javascript" src="js/backbone/vistas/VistaTelefono.js"></script>-->
    <!-- <script type="text/javascript" src="js/backbone/vistas/VistaArchivo.js"></script> -->
    <script type="text/javascript" src="js/backbone/vistas/VistaServicio.js"></script>
    <script type="text/javascript" src="js/backbone/vistas/VistaNuevoCliente.js"></script>
    <script type="text/javascript" src="js/backbone/app.js"></script>
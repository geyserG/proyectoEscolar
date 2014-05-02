
    <link rel="stylesheet" type="text/css" href="css/estilos_modulo_clientes_nuevo.less">

        <!-- BOTON PARA PRUEBAS -->
        <button id="btn_eliminar">x</button>

        
        <div id="formularioCliente" class="visibleR">
            <button type="button" id="ir" class="btn btn-default btn-xs">Conmutar</button>
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
                <input type="text" id="nombreComercial"  class="form-control" placeholder="Nombre comercial">
                <input type="text" id="nombreFiscal" class="form-control" placeholder="Nombre físcal">
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
                    <div class='cssmenu'>
                        <h5><b>Servicios que le interesa</b> </h5>
                        <input type="search" id="ancho_inputI" class="form-control" placeholder="Buscar servicio">
                        <button type="button" id="btn_agregar2" class="btn btn-default">Agregar</button>
                        <ul>
                            <li class='has-sub'><a href='#'><span>Servicios</span></a>
                                <ul id="serviciosInteres">
                                </ul>
                            </li>   
                        </ul>
                    </div>
                    <div class="desborde"></div>
                    <br>
                    <ol id="listaInteres" class="list-group"></ol>
                </div>
                <div class="menusServicios">
                    <div class='cssmenu'>
                        <h5><b>Servicios con los que cuenta</b> </h5>
                        <input type="search" id="ancho_inputC" class="form-control" placeholder="Buscar servicio">
                        <button type="button" id="btn_agregar2" class="btn btn-default">Agregar</button>
                        <ul>
                            <li class='has-sub'><a href='#'><span>Servicios</span></a>
                                <ul id="serviciosCuenta">
                                </ul>
                            </li>
                        </ul>
                    </div>
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
                <!-- <div>
                    <div>
                        <div class="input-group">
                          <br>
                          <div class="btn-group">
                              <select class="form-control" name="tipoArchivo">
                                  <option value="Logotipo">Logotipo</option>
                                  <option value="Especificaciones">Especificaciones</option>
                                  <option value="comentarios">comentarios</option>
                                  <option value="Otro">Otro</option>
                                  <option selected disabled>Tipo de archivo</option>
                              </select>
                          </div>
                           <div class="btn-group">
                              <div class="otroArchivo"><button type="button" class="btn btn-default"><span class="icon-uniF476"></span></button></div>
                          </div> 
                          <br>
                          <br>
                        </div>
                    </div>
                </div> -->
            </div>
            
            <br><br>

            <textarea id="comentarioCliente" rows="6" placeholder="Comentarios para el nuevo cliente"></textarea>

            <br><br>

            <button type="button" id="btn_crear" class="btn btn-primary">Aceptar</button>
            <button type="button" id="btn_cancelar" class="btn btn-danger">Cancelar</button>
            <br>
            <br>
            <br>
        </div>
        <div id="formularioContacto" class="visibleR ocultoR">
            <button type="button" id="ir" class="btn btn-default btn-xs">Conmutar</button>
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
            <button id="btn_nuevoContacto" class="btn btn-primary">Registrar Contactos</button> 
            <a href="modulo_consulta_clientes" class="btn btn-danger">Cancelar</a>
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
                                <input type="text" class="form-control" name="telefonoContacto" placeholder="Teléfono" >
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_agregarContacto">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var app = app || {};
    app.coleccionDeClientes = <?php echo json_encode($clientes) ?>;
    app.coleccionDeServicios = <?php echo json_encode($servicios) ?>;
</script>

<!-- Plantillas -->
    <script type="text/template" id="serviciosI">
            <a>
                <span><%- nombre %></span>
                <div id='check_posicion'>
                    <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='<%- id %>' value='<%- id %>'>
                </div>
            </a>
    </script>
    <script type="text/template" id="serviciosC">
            <a>
                <span><%- nombre %></span>
                <div id='check_posicion'>
                    <input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='<%- id %>' value='<%- id %>'>
                </div>
            </a>
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
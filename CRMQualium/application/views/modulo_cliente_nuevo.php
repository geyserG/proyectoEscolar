<!-- <div id="contenedor"> -->
<!-- prueba de sincronizacion git hub-->
<!-- <div class="contenedor_modulo">  -->
    <link rel="stylesheet" type="text/css" href="css/estilos_modulo_clientes_nuevo.less">
    <!-- <section class="contenedor_principal_modulos"> -->
    <!-- <form id="formCliente"> -->

        <!-- BOTON PARA PRUEBAS -->
        <button id="btn_eliminar">x</button>

        
        <div id="formularioCliente" class="visibleR">
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
                              <input type="text" class="form-control"name="telefonoCliente" placeholder="Teléfono" maxlength="10"><!-- id="telefonoCliente"  onchange="validarNumero(this.id)"-->
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
                    <h5><b>Servicios con los que cuenta</b> </h5>
                    <input type="text" id="ancho_input2" class="form-control" placeholder="Buscar servicio">
                    <button type="button" id="btn_agregar2" class="btn btn-default">Agregar</button>
                    <ul>
                      <li><a href=''><span>Servicios</span></a></li>
                      <li class='has-sub'><a href='#'><span>Diseño Gráfico</span></a>
                        <ul>
                           <li><a ><span>Tarjeta de presentación frente</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='1' value='1'></div></a></li>
                           <li><a><span>Medallón</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='2' value='2'></div></a></li>
                           <li><a><span>Tríptico</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='3' value='3'></div></a></li>
                           <li><a><span>Díptico</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='4' value='4'></div></a></li>
                           <li><a><span>Catálogo</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='5' value='5'></div></a></li>
                           <li><a><span>Tarjeta de presentación frente y vuelta</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='6' value='6'></div></a></li>
                           <li><a><span>Anuncio sencillo</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='7' value='7'></div></a></li>
                           <li><a><span>Menú de restaurante</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='8' value='8'></div></a></li>
                           <li><a><span>Branding completo</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='9' value='9'></div></a></li>
                           <li><a><span>Logo animado</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='10' value='10'></div></a></li>
                           <li><a><span>Vídeo branding</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='11' value='11'></div></a></li>
                           <li><a><span>Campaña</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='12' value='12'></div></a></li>
                           <li><a><span>Aplicaciones de campaña</span>
                           <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='13' value='13'></div></a></li>
                               <li><a ><span>Tarjeta de presentación frente</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='1' value='1'></div></a></li>
                               <li><a><span>Medallón</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='2' value='2'></div></a></li>
                               <li><a><span>Tríptico</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='3' value='3'></div></a></li>
                               <li><a><span>Díptico</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='4' value='4'></div></a></li>
                               <li><a><span>Catálogo</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='5' value='5'></div></a></li>
                               <li><a><span>Tarjeta de presentación frente y vuelta</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='6' value='6'></div></a></li>
                               <li><a><span>Anuncio sencillo</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='7' value='7'></div></a></li>
                               <li><a><span>Menú de restaurante</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='8' value='8'></div></a></li>
                               <li><a><span>Branding completo</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='9' value='9'></div></a></li>
                               <li><a><span>Logo animado</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='10' value='10'></div></a></li>
                               <li><a><span>Vídeo branding</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='11' value='11'></div></a></li>
                               <li><a><span>Campaña</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='12' value='12'></div></a></li>
                               <li><a><span>Aplicaciones de campaña</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='13' value='13'></div></a></li>
                            </ul>
                          </li>
                          <li class='has-sub'><a href='#'><span>Programación</span></a>
                              <ul>
                                <li><a href='#'><span>Página web sencilla</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='14' value='14'></div></a></li>
                                <li><a href='#'><span>Página Web complicada
                                (Mas de 5 secciones)</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='15' value='15'></div></a></li>
                                <li><a href='#'><span>Página Web con sistema interno</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='16' value='16'></div></a></li>
                                <li><a href='#'><span>App sencilla</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='17' value='17'></div></a></li>
                                <li><a href='#'><span>App complicada</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='18' value='18'></div></a></li>
                                <li><a href='#'><span>Sistema de ventas</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='19' value='19'></div></a></li>
                                <li><a href='#'><span>Rediseño página web</span>
                                <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='20' value='20'></div></a></li>
                              </ul>
                          </li>
                          <li class='has-sub'><a href='#'><span>Video</span></a>
                            <ul>
                              <li><a href='#'><span>Comercial video</span>
                              <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='21' value='21'></div></a></li>
                            </ul> 
                          </li>
                          <li class='has-sub'><a href='#'><span>Otros</span></a>
                            <ul>
                               <li><a href='#'><span>Redes sociales</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='22' value='22'></div></a></li>
                               <li><a href='#'><span>Mailing</span>
                               <div id='check_posicion'><input type='checkbox' class="serviciosCuenta" name="serviciosCuenta" id='23' value='23'></div></a></li>
                           </ul>
                          </li>
                        </ul>
                      </div>
                      <div class="desborde"></div>
                      <br>
                      <ol id="listaCuenta" class="list-group"></ol>
                </div>
            </div>

            <div class="menusServicios">
                  <div class='cssmenu'>
                    <h5><b>Servicios con los que cuenta</b> </h5>
                    <input type="text" id="ancho_input2" class="form-control" placeholder="Buscar servicio">
                    <button type="button" id="btn_agregar2" class="btn btn-default">Agregar</button>
                    <ul>
                      <li><a href=''><span>Servicios</span></a></li>
                      <li class='has-sub'><a href='#'><span>Diseño Gráfico</span></a>
                        <ul>
                            <li>
                                <a>
                                    <span>Tarjeta de presentación frente</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='1' value='1'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Medallón</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='261' value='2'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Tríptico</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='31' value='3'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Díptico</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='41' value='4'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Catálogo</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='51' value='5'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Tarjeta de presentación frente y vuelta</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='61' value='6'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Anuncio sencillo</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='71' value='7'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Menú de restaurante</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='81' value='8'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Diseño de caja</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='91' value='9'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Branding completo</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='101' value='10'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Logo animado</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='111' value='11'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Vídeo branding</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='121' value='12'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Campaña</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='131' value='13'>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Aplicaciones de campaña</span>
                                    <div id='check_posicion'>
                                        <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='141' value='14'>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class='has-sub'><a href='#'><span>Programación</span></a>
                      <ul>
                          <li><a href='#'><span>Página web sencilla</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='151' value='15'>
                          </div></a></li>
                          <li><a href='#'><span>Página Web complicada
                          (Mas de 5 secciones)</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='161' value='16'>
                          </div></a></li>
                          <li><a href='#'><span>Página Web con sistema interno</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='171' value='17'>
                          </div></a></li>
                          <li><a href='#'><span>App sencilla</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='181' value='18'>
                          </div></a></li>
                          <li><a href='#'><span>App complicada</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='191' value='19'>
                          </div></a></li>
                          <li><a href='#'><span>Sistema de ventas</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='201' value='20'>
                          </div></a></li>
                          <li><a href='#'><span>Rediseño página web</span>
                          <div id='check_posicion'>
                            <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='221' value='21'>
                          </div></a></li>
                      </ul>
                    </li>
                    <li class='has-sub'><a href='#'><span>Video</span></a>
                        <ul>
                            <li><a href='#'><span>Comercial video</span>
                            <div id='check_posicion'>
                              <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='231' value='22'>
                            </div></a></li>
                        </ul>
                    </li>
                    <li class='has-sub'><a href='#'><span>Otros</span></a>
                        <ul>
                            <li><a href='#'><span>Redes sociales</span>
                            <div id='check_posicion'>
                              <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='241' value='23'>
                            </div></a></li>
                            <li><a href='#'><span>Mailing</span>
                            <div id='check_posicion'>
                              <input type='checkbox' class="serviciosInteres" name="serviciosInteres" id='241' value='24'>
                            </div></a></li>
                        </ul>
                    </li>    
                </ul>
                </div>
                <div class="desborde"></div>
                <br>
                <ol id="listaInteres" class="list-group"></ol>
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
                <!-- <div id="direccion"></div> -->
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
    <!-- </form>   -->

        <!-- <div id="formularioContacto" class="visibleR"> -->
        <div id="formularioContacto" class="visibleR ocultoR">
            <button type="button" id="ir" class="btn btn-default btn-xs">Regresar al registro</button>
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
                            <input type="text"  class="form-control" name="telefonoRepresentante" placeholder="Teléfono">
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
                            <input type="text"  class="form-control" name="telefonoContacto" placeholder="Teléfono">
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

    <!-- </section> -->

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
                                <input type="text" class="form-control" name="telefonoContacto" placeholder="Teléfono">
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

    
    <!-- <div id="divClientes"></div> -->
    <!-- <div id="divContactos"></div> -->
    <!-- <div id="divArchivos"></div> -->
<!-- </div> -->
</div>


<!-- plantillas -->
  <!-- 
  <script type="text/templates" id="listaClientes">
      <div>
          <b style="color:blue;">tipoCliente</b>
          <%- tipoCliente %>
      </div>
      <div>
          <b style="color:blue;">nombreFiscal</b>
          <%- nombreFiscal %>
      </div>
      <div>
          <b style="color:blue;">nombreComercial</b>
          <%- nombreComercial %>
      </div>
      <div>
          <b style="color:blue;">rfc</b>
          <%- rfc %>
      </div>
      <div>
          <b style="color:blue;">paginaWeb</b>
          <%- paginaWeb %>
      </div>
      <div>
          <b style="color:blue;">email</b>
          <%- email %>
      </div>
      <div>
          <b style="color:red;">telefonosCliente</b>
          <% if (telefonosCliente.length > 1) {
              for (var i = 0; i < telefonosCliente.length; i++) { %>
                <div><%-telefonosCliente[i].telefono%>-
                <%-telefonosCliente[i].tipo%></div>
          <% };
             } else { %>
              <div><%-telefonosCliente.telefono%>-
              <%-telefonosCliente.tipo%></div>
          <% }; %>
      </div>
      <div>
          <b style="color:blue;">giro</b>
          <%- giro %>
      </div>
      <div>
          <b style="color:blue;">comentarioCliente</b>
          <%- comentarioCliente %>
      </div>
      <div>
      <div>
          <b style="color:blue;">direccion</b>
          <%- direccion %>
      </div>
      <div>
          <b style="color:blue;">serviciosInteres</b>
          <%- serviciosInteres %>
      </div>
      <div>
          <b style="color:blue;">serviciosCuenta</b>
          <%- serviciosCuenta %>
      </div>
      <div>
          <b style="color:blue;">logo</b>
          <%- logo %>
      </div>
  </script>
  <script type="text/templates" id="listaContacto">
      <div>
          <b style="color:blue;">idCliente</b>
          <%- idCliente %>
      </div>
      <div>
          <b style="color:blue;">tipoContacto</b>
          <%- tipoContacto %>
      </div>
      <div>
          <b style="color:blue;">nombreContacto</b>
          <%- nombreContacto %>
      </div>
      <div>
          <b style="color:blue;">correoContacto</b>
          <%- correoContacto %>
      </div>
      <div>
          <b style="color:blue;">cargoContacto</b>
          <%- cargoContacto %>
      </div>
      <div>
          <b style="color:red;">telefonosContacto</b>
          <% if (telefonosContacto.length > 1) {
              for (var i = 0; i < telefonosContacto.length; i++) { %>
                <div><%-telefonosContacto[i].telefono%>-
                <%-telefonosContacto[i].tipo%></div>
          <% };
             } else { %>
              <div><%-telefonosContacto.telefono%>-
              <%-telefonosContacto.tipo%></div>
          <% }; %>
      </div>
      <hr>
  </script>
   -->
  <!-- <script type="text/templates" id="listaArchivos">
      <div>
          <b style="color:blue;">nombre</b>
          <%- nombre %>
      </div>
      <div>
          <b style="color:blue;">tipo</b>
          <%- tipo %>
      </div>
      <div>
          <b style="color:blue;">comentario</b>
          <%- comentario %>
      </div>
  </script> -->

<script type="text/javascript">
    var app = app || {};
    
    app.coleccionDeClientes = <?= json_encode($clientes) ?>;
    console.log(app.coleccionDeClientes);
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
  <!-- <script type="text/javascript" src="js/backbone/modelos/ModeloArchivo.js"></script> -->
  <script type="text/javascript" src="js/backbone/colecciones/ColeccionTelefonos.js"></script>
  <script type="text/javascript" src="js/backbone/colecciones/ColeccionContactos.js"></script>
  <script type="text/javascript" src="js/backbone/colecciones/ColeccionRepresentantes.js"></script>
  <script type="text/javascript" src="js/backbone/colecciones/ColeccionClientes.js"></script>
  <!-- <script type="text/javascript" src="js/backbone/colecciones/ColeccionArchivos.js"></script> -->
  <script type="text/javascript" src="js/backbone/vistas/VistaContacto.js"></script>
  <script type="text/javascript" src="js/backbone/vistas/VistaCliente.js"></script>
  <!--<script type="text/javascript" src="js/backbone/vistas/VistaTelefono.js"></script>-->
  <!-- <script type="text/javascript" src="js/backbone/vistas/VistaArchivo.js"></script> -->
    <script type="text/javascript" src="js/backbone/vistas/VistaNuevoCliente.js"></script>
    <script type="text/javascript" src="js/backbone/app.js"></script>
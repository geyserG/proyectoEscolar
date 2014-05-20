    <div id="posicion_infotd">
        <form>
            <table id="tbla_cliente" class="table table-striped">

                <!-- BOTON PARA PRUEBAS -->
                <!-- <tr><td colspan="7"><button id="obtenerEliminados">Clientes eliminados</button></td></tr> -->

                <thead>
                    <tr>
                        <th>Todos<br><input type="checkbox"></th>
                        <th></th>
                        <th>Nombre Comercial<input id="inputBuscarCliente" class="form-control" type="text" placeholder="Buscar"></th>
                        <th>Giro</th>
                        <th>Página web<input class="form-control" type="text" placeholder="Buscar"></th>
                        <th style="text-align=center;">Ultima<br>Actividad</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody id="filasClientes">
                </tbody>
            </table>
            <button type="button" id="marcar" class="btn btn-default">Marcar todos</button> 
            <button type="button" id="desmarcar" class="btn btn-default">Desmarcar todos</button>
            <button type="button" id="eliminar" class="btn btn-default">Eliminar varios</button>
        </form>
    </div>
</div>
  <!--  ----------Consulta clientes-------- -->


<script type="text/javascript">
    var meses = new Array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
</script>


<!-- PLANTILLAS -->
    <script type="text/templates" id="plantilla_td_de_cliente">
        <td class="contenido_prospecto"><input  type="checkbox" name="checkboxCliente" value="<%- id %>"></td>
        <td>
            <% if (typeof foto != "undefined") { %>
            <img src="<%- foto %>" alt="" class="foto">
            <%} else{%>
            <img src="" alt="" class="foto">
            <%}; %>
        </td>
        <td><%- nombreComercial %></td>
        
        <% if(typeof giro != "undefined") { %>
            <td><%- giro %></td>
        <% } else { %>
            <td>No especificado</td>
        <% }; %>
    
        <% if(typeof paginaWeb != "undefined") { %>
            <td><%- paginaWeb %></td>
        <% } else { %>
            <td>No especificado</td>
        <% }; %>

        <td>
            Módulo de actividad en construcción
        </td>
        <td class="icon-operaciones">
            
            <span class="icon-trash" id="tr_btn_eliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
            <span class="icon-edit2" data-toggle="modal" data-target="#<%- id %>" title="Editar"></span>
            <span class="icon-email" data-toggle="tooltip" data-placement="top" title="Enviar"></span>
            <span class="icon-eye" data-toggle="modal" data-target="#<%- id %>" title="Ver información"></span>
            
            <div class="modal fade" id="<%- id %>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="icon-operaciones2">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary" id="modal_btn_eliminar"><label class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></label></button>
                            <button type="button" class="btn btn-primary" id="editar"><label class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></label></button>
                            <button type="button" class="btn btn-primary" id="contactos"><label class="icon-friends"  data-toggle="tooltip" data-placement="top" title="Contactos"></label></button>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p class="panel-title"><h4>Información</h4></p>
                            <span id="cerrar_consulta" class="glyphicon glyphicon-remove close" data-dismiss="modal" aria-hidden="true"></span>
                        </div>
                        <table style="margin-left:15px; margin-top:15px;">
                            <tr>
                                <td rowspan="3">
                                    <img class="" id="logo_empresa_info" src="<%- foto %>" alt="Imagen-Cliente">
                                </td>
                                <td style="padding:0px 10px 0px 10px; vertical-align: bottom;">
                                    <h3 class="editar editando"><b><%- nombreComercial %></b></h3>
                                    <input type="text" class="form-control editar" name="nombreComercial" value="<%- nombreComercial %>">
                                </td>
                                <td class="respuesta" style="vertical-align: bottom;"></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px 0px 10px;">
                                    Cliente desde
                                    <label>
                                        <% var Año_Mes_dia = fechaCreacion.split('-'); %>
                                        <%- Año_Mes_dia[2] %>
                                        <% for (var i = 0; i < meses.length; i++) { %>
                                            <% if (i == Año_Mes_dia[1]) { %>
                                                <%- meses[i-1] %>
                                                <% break; %>
                                            <% }; %>
                                        <% }; %>
                                        <%- Año_Mes_dia[0] %>
                                    </label>
                                </td>
                                <td class="respuesta"></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px 0px 10px; vertical-align: top;">
                                    <a href="#">Ir a proyecto</a>
                                </td>
                                <td class="respuesta" style="vertical-align: top;"></td>
                            </tr>
                        </table>
                        <div class="panel-body">
                            <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->
                            <div class="visible">
                                <form id="formCliente" method="post">
                                    <table class="table table-striped">
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Nombre Físcal:</b></td>
                                            <td>
                                                <% if (typeof nombreFiscal != "undefined") { %>
                                                    <label class="editar editando">
                                                        <%- nombreFiscal %>
                                                    </label>
                                                    <input type="text" class="form-control editar" name="nombreFiscal" value="<%- nombreFiscal %>">
                                                <% } else{ %>
                                                    <label class="editar editando">
                                                        No especificado
                                                    </label>
                                                    <input type="text" class="form-control editar" name="nombreFiscal">
                                                <% }; %>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>R.F.C:</b></td>
                                            <td>
                                                <% if (typeof rfc != "undefined") { %>
                                                    <label class="editar editando">
                                                        <%- rfc %>
                                                    </label>
                                                    <input type="text" class="form-control editar" name="rfc" value="<%- rfc %>">
                                                <% } else{ %>
                                                    <label class="editar editando">
                                                        No especificado
                                                    </label>
                                                    <input type="text" class="form-control editar" name="rfc">
                                                <% }; %>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Giro:</b></td>
                                            <td>
                                                <% if (typeof giro != "undefined") { %>
                                                    <label class="editar editando">
                                                        <%- giro %>
                                                    </label>
                                                <% } else{ %>
                                                    <label class="editar editando">
                                                        No especificado
                                                    </label>
                                                <% }; %>
                                                <select class="form-control editar" name="giro"> 
                                                    <option> Manufacturera </option> 
                                                    <option> Agropecuaria </option> 
                                                    <option> Comercial </option> 
                                                    <option> Transporte </option> 
                                                    <option> Educación </option> 
                                                    <option> Servicios públicos </option>
                                                    <option> Salud </option> 
                                                    <option> Comunicación </option> 
                                                    <option selected disabled>Giro</option>
                                                    <option value="" disabled style='display:none;'>Giro</option> 
                                                </select>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Dirección:</b></td>
                                            <td>
                                                <% if (typeof direccion != "undefined") { %>
                                                    <label class="editar editando">
                                                        <%- direccion %>
                                                    </label>
                                                    <input type="text" class="form-control editar" name="direccion" value="<%- direccion %>">
                                                <% } else{ %>
                                                    <label class="editar editando">
                                                        No especificado
                                                    </label>
                                                    <input type="text" class="form-control editar" name="direccion">
                                                <% }; %>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo">
                                                <b>Telefono:</b>
                                                <!--<button type="button" id="btn_nuevoTelefono" class="btn btn-primary btn-xs editar">Nuevo</button>-->
                                            </td>
                                            <td id="telefonos">
                                                <label class="editar editando">No especificado</label>
                                                <div class="editar">
                                                    <div class="input-group">
                                                        <input type="text" id="numeroNuevo" class="form-control" name="numero" maxlength="10" placeholder="Nuevo Teléfono">
                                                        <div class="input-group-btn">
                                                            <select id="tipoNuevo" class="btn btn-default" name="tipo">
                                                                <option value="Casa">Casa</option>
                                                                <option value="Fax">Fax</option>
                                                                <option value="Movil" selected>Movil</option>
                                                                <option value="Oficina">Oficina</option>
                                                                <option value="Personal">Personal</option>
                                                                <option value="Trabajo">Trabajo</option>
                                                                <option value="Otro">Otro</option>
                                                                <option selected disabled>Tipo</option>
                                                            </select>
                                                            <button id="enviarTelefono" class="btn btn-default"><label class="glyphicon glyphicon-send"></label></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Correo electrónico:</b></td>
                                            <td>
                                                <% if (typeof email != "undefined") { %>
                                                    <a class="editar editando" href="#">
                                                        <%- email %>
                                                    </a>
                                                    <input type="text" class="form-control editar" name="email" value="<%- email %>">
                                                <% } else { %>
                                                    <label class="editar editando">No especificado</label>
                                                    <input type="text" class="form-control editar" name="email">
                                                <% }; %>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Página Web:</b></td>
                                            <td>
                                                <% if (typeof paginaWeb != "undefined") { %>
                                                    <a class="editar editando" href="#">
                                                        <%- paginaWeb %>
                                                    </a>
                                                    <input type="text" class="form-control editar" name="paginaWeb" value="<%- paginaWeb %>">
                                                <% } else { %>
                                                    <label class="editar editando">No especificado</label>
                                                    <input type="text" class="form-control editar" name="paginaWeb">
                                                <% }; %>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Servicios de interes:</b></td>
                                            <td id="serviciosInteres">
                                                <div id='contenedor_menus' class="editar">
                                                    <div class="menusServicios">
                                                        <form>
                                                            <div class='cssmenu' style="margin-right: 0px;">
                                                                <div class="col-lg-6">
                                                                    <div class="input-group">
                                                                        <input type="text" id="inputBusquedaI" class="form-control" name="serviciosInteres" placeholder="Buscar servicio">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" id="btn_agregarI" class="btn btn-default editando">Agregar</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
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
                                                </div>
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo">
                                                <b>Servicios actuales:</b><br>
                                                <h6>servicios con lo que cuenta actualmente<h6>
                                            </td>
                                            <td id="serviciosCuenta">
                                                <div id='contenedor_menus' class="editar">
                                                    <div class="menusServicios">
                                                        <form>
                                                            <div class='cssmenu' style="margin-right: 0px;">
                                                                <div class="col-lg-6">
                                                                    <div class="input-group">
                                                                        <input type="text" id="inputBusquedaC" class="form-control" name="serviciosCuenta" placeholder="Buscar servicio">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" id="btn_agregarC" class="btn btn-default editando">Agregar</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
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
                                            </td>
                                            <td class="respuesta">
                                                 <span class="icon-uniF55C" style="visibility: hidden;"></span>
                                                <!--RESPUESTA-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="atributo">Comentarios</td>
                                            <td>
                                                <% if (typeof comentarioCliente != "undefined") { %>
                                                    <p class="editar editando"><%- comentarioCliente %></p>
                                                    <textarea id="comentario" class="form-control editar" name="comentarioCliente" rows="3"><%- comentarioCliente %></textarea>
                                                <% } else { %>
                                                    <p class="editar editando">No especificado.</p>
                                                    <textarea id="comentario" class="form-control editar" name="comentarioCliente" rows="3"></textarea>
                                                <% }; %>
                                            </td>
                                            <td class="respuesta"><span class="icon-uniF55C" style="visibility: hidden;"></span></td>
                                        </tr>
                                    </table>
                                    <!--<button type="button" id="actualizar" class="btn btn-primary editar">Actualizar</button>-->
                                </form>
                            </div>
                            <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->

                            <!-- -------SEGUNDA PAGINA DE INFORMACION DEL CLIENTE------- --> 
                            <div class="visible oculto" id="divContactos">
                                <!--aquí van los tr de los contactos-->
                            </div>
                            <!-- -------SEGUNDA PAGINA DE INFORMACION DEL CLIENTE------- -->                         
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </script>

    <script type="text/templates" id="plantilla_contactos">
        <div id="icon-operacionesContacto">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-primary" id="eliminarContacto"><label class="icon-trash" data-toggle="tooltip" data-placement="top" title="Eliminar"></label></button>
                <button type="button" class="btn btn-primary" id="editarContacto"><label class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></label></button>
            </div>
        </div>
        <h3 id="etiqueta">No especificado</h3>
        <form>
            <table class="table table-striped tbla_contacto">
                <tr class="trContacto">
                    <td class="atributo"><b>Nombre:</b></td>
                    <td class="divDatoContacto">
                        <label class="editar editando"><%- nombre %></label>
                        <input type="text" class="form-control editar" value="<%- nombre %>">
                    </td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Correo:</b></td>
                    <td class="divDatoContacto">
                        <% if (typeof email != 'undefined' && email != '') { %>
                            <a class="editar editando" href="<%- email %>"><%- email %></a>
                            <input type="text" class="form-control editar" value="<%- email %>">
                        <% } else{ %>
                            <label class="editar editando">No especificado</label>
                        <% }; %>
                    </td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Cargo:</b></td>
                    <td class="divDatoContacto">
                    <% if (typeof cargo != 'undefined' && cargo != '') { %>
                            <label class="editar editando"><%- cargo %></label>
                            <input type="text" class="form-control editar" value="<%- cargo %>">
                    <% } else{ %>
                        <label class="editar editando">No especificado</label>
                        <input type="text" class="form-control editar" placeholder="Cargo">
                    <% }; %>                            
                    </td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Teléfonos:</b></td>
                    <td class="divDatoContacto" id="telefonos">
                        <label class="editar editando">No especificado</label>
                        <div class="editar">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control telefonosCliente" placeholder="Número de teléfono">
                                        <div class="input-group-btn">
                                            <select class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <option value="Casa">Casa</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Movil" selected>Movil</option>
                                                <option value="Oficina">Oficina</option>
                                                <option value="Personal">Personal</option>
                                                <option value="Trabajo">Trabajo</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="divDatoContacto">
                        <button type="submit" class="btn btn-primary editar">Actualizar</button>
                    </td>
                </tr>
            </table>
        </form>
    </script>

    <script type="text/templates" id="plantilla_telefono">
        <b class="editar editando"><%-tipo%></b>
        <div class="editar editando"><%-numero%></div>
        <div class="editar">
            <div class="input-group">
                <input type="text" id="numero" class="form-control" name="numero" value="<%-numero%>" placeholder="<%-numero%>" maxlength="10">
                <div class="input-group-btn">
                    <select id="tipo" class="btn btn-default" name="tipo">
                        <option value="Casa">Casa</option>
                        <option value="Fax">Fax</option>
                        <option value="Movil" selected>Movil</option>
                        <option value="Oficina">Oficina</option>
                        <option value="Personal">Personal</option>
                        <option value="Trabajo">Trabajo</option>
                        <option value="Otro">Otro</option>
                        <option selected disabled>Tipo</option>
                    </select>
                    <button id="eliminar" class="btn btn-default"><label class="icon-uniF478"></label></button>
                </div>
            </div>
        </div>
        <br>
    </script>

    <script type="text/template" id="serviciosI">
        <div>
            <label for="<%- id %>"><%- nombre %></label>
            <!--<label for="<%- id %>" class="concepto"><%- concepto %></label>-->
            <div class='check_posicion'>
                <input type="checkbox" class="serviciosInteres editando" name="nameServiciosInteres" value="<%- id %>" id="<%- id %>">
            </div>
        </div>
    </script>
    <script type="text/template" id="serviciosC">
        <div>
            <label for="<%- 1+id %>"><%- nombre %></label>
            <!--<label for="<%- 1+id %>" class="concepto"><%- concepto %></label>-->
            <div class='check_posicion'>
                <input type="checkbox" class="serviciosCuenta editando" name="nameServiciosCuenta" value="<%- 1+id %>" id="<%- 1+id %>">
            </div>
        </div>
    </script>
    <script type="text/template" id="servicioCliente">
        <label class="editar"><label id="<%- idservicio %>" class="icon-uniF478 eliminarSC"></label></label>
        <%- nombre %>
        <br>
    </script>

<script type="text/javascript" src="<?=base_url().'js/backbone/app.js'?>"></script>
<script type="text/javascript">
    app.coleccionDeClientes = <?php echo json_encode($clientes) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeContactos = <?php echo json_encode($contactos) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeTelefonos = <?php echo json_encode($telefonos) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeRepresentantes = <?php echo json_encode($representantes) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeServicios = <?php echo json_encode($servicios) ?>;

    app.coleccionDeServiciosI = <?php echo json_encode($serviciosInteres) ?>;
    app.coleccionDeServiciosC = <?php echo json_encode($serviciosCliente) ?>;
 </script>
 <!-- Utilerias -->
    <script type="text/javascript" src="<?=base_url().'js/funcionescrm.js'?>"></script>
<!-- Librerias Backbone -->
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/underscore.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/backbone.js'?>"></script>
    <!-- <script type="text/javascript" src="js/backbone/lib/backbone.localStorage.js"></script> -->
    

<!--MV*-->
    <!-- modelos -->
    <script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloServicio.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloRepresentante.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloContacto.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloCliente.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloTelefono.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloServicioCliente.js'?>"></script>
    <!-- colecciones -->

    <script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServicios.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionRepresentantes.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionContactos.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionClientes.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionTelefonos.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServiciosClientes.js'?>"></script>

    <!-- vistas -->
    <script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicio.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicioCliente.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaContacto.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaCliente.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaTelefono.js'?>"></script>
    <!-- vista general -->
    <script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaConsultaCliente.js'?>"></script>
    <!-- <script type="text/javascript" src="js/backbone/vistas/VistaNuevoCliente.js"></script> -->
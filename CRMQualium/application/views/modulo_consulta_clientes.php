    <div id="posicion_infotd">
        <form>
            <table id="tbla_cliente" class="table table-striped">

                <!-- BOTON PARA PRUEBAS -->
                <!-- <tr><td colspan="7"><button id="obtenerEliminados">Clientes eliminados</button></td></tr> -->


                <tr>
                    <th>Todos<br><input type="checkbox"></th>
                    <th></th>
                    <th>Nombre Comercial<input class="form-control" type="text" placeholder="Buscar"></th>
                    <th>Giro</th>
                    <th>Página web<input class="form-control" type="text" placeholder="Buscar"></th>
                    <th style="text-align=center;">Ultima<br>Actividad</th>
                    <th>Operaciones</th>
                </tr>
                
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

        <td><%- fechaCreacion %></td>
        <td class="icon-operaciones">
            
            <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
            <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
            <span class="icon-email"  data-toggle="tooltip" data-placement="top" title="Enviar"></span>
            <span class="icon-eye"  data-toggle="modal" data-target="#<%- id %>" title="Ver información"></span>
            
            <div class="modal fade" id="<%- id %>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="icon-operaciones2">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary"><label class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></label></button>
                            <button type="button" class="btn btn-primary" id="editar"><label class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></label></button>
                            <button type="button" class="btn btn-primary" id="contactosCliente"><label class="icon-friends"  data-toggle="tooltip" data-placement="top" title="Contactos"></label></button>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p class="panel-title"><h4>Información</h4></p>
                            <span id="cerrar_consulta" class="glyphicon glyphicon-remove close" data-dismiss="modal" aria-hidden="true"></span>
                        </div>

                        <div class="panel-body">
                            <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->
                            <div class="visible">
                                <img class="" id="logo_empresa_info" src="<%- foto %>" alt="Imagen-Cliente">
                                <div class="info_cliente1">
                                    <h3 class="editar editando"><b><%- nombreComercial %></b></h3>
                                    <input type="text" class="form-control editar" value="<%- nombreComercial %>">
                                    <a href="#">Ir a proyecto</a>

                                    <!--<input type="hidden" class="idCliente" value="<%- id %>">-->

                                </div>

                                <form>
                                    <table class="table table-striped">
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Nombre Físcal:</b></td>
                                            <td>
                                                    <% if (typeof nombreFiscal != "undefined") { %>
                                                <label class="editar editando">
                                                    <%- nombreFiscal %>
                                                </label>
                                                <input type="text" class="form-control editar" value="<%- nombreFiscal %>">
                                                    <% } else{ %>
                                                <label class="editar editando">
                                                    No especificado
                                                </label>
                                                <input type="text" class="form-control editar">
                                                    <% }; %>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>R.F.C:</b></td>
                                            <td>
                                                    <% if (typeof rfc != "undefined") { %>
                                                <label class="editar editando">
                                                    <%- rfc %>
                                                </label>
                                                <input type="text" class="form-control editar" value="<%- rfc %>">
                                                    <% } else{ %>
                                                <label class="editar editando">
                                                    No especificado
                                                </label>
                                                <input type="text" class="form-control editar">
                                                    <% }; %>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Giro:</b></td>
                                            <td>
                                                    <% if (typeof giro != "undefined") { %>
                                                <label class="editar editando">
                                                    <%- giro %>
                                                </label>
                                                <input type="text" class="form-control editar" value="<%- giro %>">
                                                    <% } else{ %>
                                                <label class="editar editando">
                                                    No especificado
                                                </label>
                                                <input type="text" class="form-control editar">
                                                    <% }; %>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Dirección:</b></td>
                                            <td>
                                                    <% if (typeof direccion != "undefined") { %>
                                                <label class="editar editando">
                                                    <%- direccion %>
                                                </label>
                                                <input type="text" class="form-control editar" value="<%- direccion %>">
                                                    <% } else{ %>
                                                <label class="editar editando">
                                                    No especificado
                                                </label>
                                                <input type="text" class="form-control editar">
                                                    <% }; %>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Telefono:</b></td>
                                            <td id="telefonos">
                                                <label class="editar editando">No especificado</label>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Correo electrónico:</b></td>
                                            <td>
                                                    <% if (typeof email != "undefined") { %>
                                                <a class="editar editando" href="#">
                                                        <%- email %>
                                                </a>
                                                        <input type="text" class="form-control editar" value="<%- email %>">
                                                    <% } else { %>
                                                <label class="editar editando">No especificado</label>
                                                <input type="text" class="form-control editar">
                                                    <% }; %>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Página Web:</b></td>
                                            <td>
                                                    <% if (typeof paginaWeb != "undefined") { %>
                                                <a class="editar editando" href="#">
                                                    <%- paginaWeb %>
                                                </a>
                                                <input type="text" class="form-control editar" value="<%- paginaWeb %>">
                                                    <% } else { %>
                                                <label class="editar editando">No especificado</label>
                                                <input type="text" class="form-control editar"><% }; %>
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
                                                                        <input type="text" id="inputBusquedaI" class="form-control" placeholder="Buscar servicio">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" id="btn_agregarI" class="btn btn-default">Agregar</button>
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
                                                                        <input type="text" id="inputBusquedaC" class="form-control" placeholder="Buscar servicio">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" id="btn_agregarC" class="btn btn-default">Agregar</button>
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
                                        </tr>
                                    </table>

                                    <div class="modal-footer">
                                        <b>Comentarios:</b>
                                            <% if (typeof comentarioCliente != "undefined") { %>
                                                <p class="editar editando"><%- comentarioCliente %></p>
                                                <textarea class="form-control editar" rows="3"><%- comentarioCliente %></textarea>
                                            <% } else { %>
                                                <p class="editar editando">No especificado.</p>
                                                <textarea class="form-control editar" rows="3"></textarea>
                                            <% }; %>
                                        </label>
                                    </div>
                                    <input type="submit" class="btn btn-default editar" value="Actualizar">
                                </form>
                            </div>
                            <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->

                            <!-- -------SEGUNDA PAGINA DE INFORMACION DEL CLIENTE------- --> 
                            <div id="divContactos" class="visible oculto">
                                <br>
                                <br>
                                <h1 style="text-align:center;">Contactos</h1>
                                <br>
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
        <table class="table table-striped">
            <thead>
                <tr class="trContacto">
                    <th colspan="2">
                        Contacto
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="trContacto">
                    <td class="atributo"><b>Nombre:</b></td>
                    <td class="divDatoContacto"><%- nombre %></td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Correo:</b></td>
                    <td class="divDatoContacto"><a href="<%- email %>"><%- email %></a></td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Cargo:</b></td>
                    <td class="divDatoContacto"><%- cargo %></td>
                </tr>
                <!--<tr class="trContacto">
                    <td class="atributo"><b>Teléfonos:</b></td>
                    <td class="divDatoContacto" id="telefonos">
                        
                    </td>
                </tr>-->
            </tbody>
        </table class="table">
    </script>

    <script type="text/templates" id="plantilla_telefono">
        <b class="editar editando"><%-tipo%></b>
        <div class="editar editando"><%-numero%></div>
        <div class="editar">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control telefonosCliente" value="<%-numero%>" placeholder="<%-numero%>">
                        <div class="input-group-btn">
                            <select class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <option value="Casa">Casa</option>
                                <option value="Fax">Fax</option>
                                <option value="Movil" selected>Movil</option>
                                <option value="Oficina">Oficina</option>
                                <option value="Personal">Personal</option>
                                <option value="Trabajo">Trabajo</option>
                                <option value="Otro">Otro</option>
                                <option selected disabled>Actual: <%-tipo%></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

<!-- Librerias Backbone -->
    <script type="text/javascript" src="js/backbone/lib/underscore.js"></script>
    <script type="text/javascript" src="js/backbone/lib/backbone.js"></script>
    <!-- <script type="text/javascript" src="js/backbone/lib/backbone.localStorage.js"></script> -->
<!--MV*-->

<script type="text/javascript" src="js/backbone/app.js"></script>
<script type="text/javascript">
    // var app = app || {};
    app.coleccionDeClientes = <?php echo json_encode($clientes) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeContactos = <?php echo json_encode($contactos) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeTelefonos = <?php echo json_encode($telefonos) ?>;
    // {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    app.coleccionDeRepresentantes = <?php echo json_encode($representantes) ?>;
 </script>
    <!-- modelos -->
    <script type="text/javascript" src="js/backbone/modelos/ModeloContacto.js"></script>
    <script type="text/javascript" src="js/backbone/modelos/ModeloCliente.js"></script>
    // <script type="text/javascript" src="js/backbone/modelos/ModeloTelefono.js"></script>
    <!-- colecciones -->
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionContactos.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionClientes.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionTelefonos.js"></script>
    <!-- vistas -->
    <script type="text/javascript" src="js/backbone/vistas/VistaContacto.js"></script>
    <script type="text/javascript" src="js/backbone/vistas/VistaCliente.js"></script>
    <script type="text/javascript" src="js/backbone/vistas/VistaTelefono.js"></script>
    <!-- vista general -->
    <script type="text/javascript" src="js/backbone/vistas/VistaConsultaCliente.js"></script>
    <!-- <script type="text/javascript" src="js/backbone/vistas/VistaNuevoCliente.js"></script> -->
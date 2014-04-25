    <div id="posicion_infotd">
        <table id="tbla_cliente" class="table table-striped">      
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
        <button type="button" class="btn btn-default">Eliminar varios</button> 
    </div>
</div>
  <!--  ----------Consulta clientes-------- -->


<script type="text/javascript">
    // $(document).on('ready', function(){
    //     $('.icon-trash').on('click',function(){
    //         window.confirm('Estas seguro de eliminar al cliente');
    //     });
    // });

    //   jQuery(document).ready(function(){ 
    //     $(".oculto").hide();              
    //     $(".MO").click(function(){
    //           var nodo = $(this).attr("href");  

    //           if ($(nodo).is(":visible")){
    //                $(nodo).hide(450);
    //                return false;
    //           }else{
    //     $(".oculto").hide(450);               
    //     $(nodo).fadeToggle(450);

    //     return false;
    //           }
    //     });
    // }); 
  </script>


<!-- PLANTILLAS -->
    <script type="text/templates" id="plantilla_td_de_cliente">
        <td class="contenido_prospecto"><input  type="checkbox"></td>
        <td><img src="<%- logo %>" alt="" class="img-thumbnail"></td>
        <td><%- nombreComercial %></td>
        <td><%- giro %></td>
        <td><%- paginaWeb %></td>
        <td>04/06/2014</td>
        <td class="icon-operaciones">
            <div class="eliminar_cliente">
            <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span> </div>
            <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
            <span class="icon-email"  data-toggle="tooltip" data-placement="top" title="Enviar"></span>
            <span class="icon-eye"  data-toggle="modal" data-target="#<%- id %>" title="Ver contacto"></span>
            <div class="modal fade" id="<%- id %>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="icon-operaciones2">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary"><label class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></label></button>
                            <button type="button" class="btn btn-primary"><label class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></label></button>
                            <button type="button" class="btn btn-primary" id="conmutar"><label class="icon-friends"  data-toggle="tooltip" data-placement="top" title="Contactos"></label></button>
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
                                <img class="img-thumbnail" id="logo_empresa_info" src="<%- logo %>" alt="Imagen-Cliente">
                                <div class="info_cliente1">
                                    <h3><b><%- nombreComercial %></b></h3>
                                    <a href="#">Ir a proyecto</a>

                                    <!--<input type="hidden" class="idCliente" value="<%- id %>">-->

                                </div>

                                <form>
                                    <table class="table table-striped">
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Nombre Físcal:</b></td>
                                            <td>
                                                <label><%- nombreFiscal %></label>
                                                <input type="text" class="editar" value="<%- nombreFiscal %>">
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>R.F.C:</b></td>
                                            <td>
                                                <label><%- rfc %></label>
                                                <input type="text" class="editar" value="<%- rfc %>">
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Giro:</b></td>
                                            <td>
                                                <label><%- giro %></label>
                                                <input type="text" class="editar" value="<%- giro %>">
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Dirección:</b></td>
                                            <td>
                                                <label><%- direccion %></label>
                                                <input type="text" class="editar" value="<%- direccion %>">
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Telefono:</b></td>
                                            <td>
                                                <% if (telefonosCliente.length > 1) {
                                                    for (var i = 0; i < telefonosCliente.length; i++) { %>
                                                        <div>
                                                            <label><%-telefonosCliente[i].telefono%></label>
                                                            <input type="text" class="editar" value="<%-telefonosCliente[i].telefono%>">
                                                            <label><%-telefonosCliente[i].tipo%></label>
                                                            <select class="editar" multiple>
                                                                <option>x</option>
                                                                <option>xx</option>
                                                                <option>xxx</option>
                                                                <option>xxxx</option>
                                                            </select>
                                                        </div>
                                                <% };
                                                    } else { %>
                                                        <div>
                                                            <label><%-telefonosCliente.telefono%></label>
                                                            <input type="text" class="editar" value="<%-telefonosCliente.telefono%>">
                                                            <label><%-telefonosCliente.tipo%></label>
                                                            <select class="editar" multiple>
                                                                <option>x</option>
                                                                <option>xx</option>
                                                                <option>xxx</option>
                                                                <option>xxxx</option>
                                                            </select>
                                                        </div>
                                                <% }; %>
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Correo electrónico:</b></td>
                                            <td>
                                                <a href="#"><%- email %></a>
                                                <input type="text" class="editar" value="<%- email %>">
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Página Web:</b></td>
                                            <td>
                                                <a href="#"><%- paginaWeb %></a>
                                                <input type="text" class="editar" value="<%- paginaWeb %>">
                                            </td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo"><b>Servicios de interes:</b></td>
                                            <td><% if (serviciosInteres.length) { %>
                                                <%- serviciosInteres %>
                                                <select class="editar" multiple>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            <% } else { %>
                                                Ninguno.
                                                <select class="editar" multiple>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                </select>
                                            <% }; %></td>
                                        </tr>
                                        <tr class="trCliente">
                                            <td class="atributo">
                                                <b>Servicios actuales:</b><br>
                                                <h6>servicios con lo que cuenta actualmente<h6>
                                            </td>
                                            <td><% if (serviciosCuenta.length) { %>
                                                <%- serviciosCuenta %>
                                                <select class="editar" multiple>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            <% } else { %>
                                                Ninguno.
                                                <select class="editar" multiple>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                </select>
                                            <% }; %></td>
                                        </tr>
                                    </table>

                                    <div class="modal-footer">
                                        <b>Comentarios:</b> <%- comentarioCliente %>
                                        <input type="text" class="editar" value="<%- comentarioCliente %>">
                                    </div>
                                    <input type="submit" value="Actualizar">
                                </form>
                            </div>
                            <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->

                            <!-- -------SEGUNDA PAGINA DE INFORMACION DEL CLIENTE------- --> 
                            <div class="visible oculto">
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
                        <%
                            if (tipoContacto == 0) {
                        %> 
                            Representante
                        <%
                            } else {
                        %> 
                            Contacto
                        <%
                            };
                        %>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="trContacto">
                    <td class="atributo"><b>Nombre:</b></td>
                    <td class="divDatoContacto"><%- nombreContacto %></td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Correo:</b></td>
                    <td class="divDatoContacto"><a href="#"><%- correoContacto %></a></td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Cargo:</b></td>
                    <td class="divDatoContacto"><%- cargoContacto %></td>
                </tr>
                <tr class="trContacto">
                    <td class="atributo"><b>Teléfonos:</b></td>
                    <td class="divDatoContacto">
                        <% if (telefonosContacto.length > 1) {
                          for (var i = 0; i < telefonosContacto.length; i++) { %>
                            <div><%-telefonosContacto[i].telefono%>-
                            <%-telefonosContacto[i].tipo%></div>
                        <% };
                         } else { %>
                          <div><%-telefonosContacto.telefono%>-
                          <%-telefonosContacto.tipo%></div>
                        <% }; %>
                    </td>
                </tr>
            </tbody>
        </table class="table">
    </script>



<!-- Librerias Backbone -->
    <script type="text/javascript" src="js/backbone/lib/underscore.js"></script>
    <script type="text/javascript" src="js/backbone/lib/backbone.js"></script>
    <script type="text/javascript" src="js/backbone/lib/backbone.localStorage.js"></script>
<!--MV*-->
    <!-- modelos -->
    <script type="text/javascript" src="js/backbone/modelos/ModeloContacto.js"></script>
    <script type="text/javascript" src="js/backbone/modelos/ModeloCliente.js"></script>
    <!-- colecciones -->
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionContactos.js"></script>
    <script type="text/javascript" src="js/backbone/colecciones/ColeccionClientes.js"></script>
    <!-- vistas -->
    <script type="text/javascript" src="js/backbone/vistas/VistaContacto.js"></script>
    <script type="text/javascript" src="js/backbone/vistas/VistaCliente.js"></script>
    <!-- vista general -->
    <script type="text/javascript" src="js/backbone/vistas/VistaConsultaCliente.js"></script>
    <script type="text/javascript" src="js/backbone/app.js"></script>
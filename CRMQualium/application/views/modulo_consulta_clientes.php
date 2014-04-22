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
    $(document).on('ready', function(){
        $('.icon-trash').on('click',function(){
            window.confirm('Estas seguro de eliminar al cliente');
        });
    });

      jQuery(document).ready(function(){ 
        $(".oculto").hide();              
        $(".MO").click(function(){
              var nodo = $(this).attr("href");  

              if ($(nodo).is(":visible")){
                   $(nodo).hide(450);
                   return false;
              }else{
        $(".oculto").hide(450);               
        $(nodo).fadeToggle(450);

        return false;
              }
        });
    }); 
  </script>


<!-- PLANTILLAS -->
<script type="text/templates" id="plantilla_td_de_cliente">
    <td class="contenido_prospecto"><input  type="checkbox"></td>
    <td><img src="<%- logo %>" alt="" class="img-thumbnail"></td>
    <td><%- nombreFiscal %></td>
    <td><%- giro %></td>
    <td><%- paginaWeb %></td>
    <td>04/06/2014</td>
    <td class="icon-operaciones">
        <div class="eliminar_cliente">
        <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span> </div>
        <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
        <span class="icon-email"  data-toggle="tooltip" data-placement="top" title="Enviar"></span>
        <span class="icon-eye"  data-toggle="modal" data-target="#myModal" title="Ver contacto"></span>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title"><h4>Información</h4></p>
                        <span id="cerrar_consulta" class="glyphicon glyphicon-remove close" data-dismiss="modal" aria-hidden="true"></span>
                    </div>
                    <!-- id="contenido_cliente" este id no sirve-->
                    <div class="panel-body">
                        <!--
                        <div id="div1" class="divoculto">
                            <div  class="contactos">
                                <label><h2><b>Representante</b></h2></label><br>
                                <label><h5><b>Nombre completo:</b></h5></label>
                                <label><h5>olCiseo Yucatán</h5></label><br>
                                <label><h5><b>Cargo:</b></h5></label>
                                <label><h5>Director</h5></label><br>
                                <label><h5><b>Telefono:</b></h5></label>
                                <label><h5>969995678</h5></label><br>
                                <label><h5><b>Celular:</b></h5></label>
                                <label><h5>9992456789</h5></label><br>
                                <label><h5><b>Correo electrónico:</b></h5></label>
                                <label><h5>Coliseo@gmail.com</h5></label><br>
                            </div>
                            <div class="contactos">
                                <label><h2><b>contacto</b></h2></label><br>
                                <label><h5><b>Nombre completo:</b></h5></label>
                                <label><h5>Coliseo Yucatán</h5></label>&nbsp;&nbsp;
                                <label><h5><b>Cargo:</b></h5></label>
                                <label><h5>Director</h5></label><br>
                                <label><h5><b>Telefono:</b></h5></label>
                                <label><h5>969995678</h5></label>&nbsp;&nbsp;
                                <label><h5><b>Celular:</b></h5></label>
                                <label><h5>9992456789</h5></label><br>
                                <label><h5><b>Correo electrónico:</b></h5></label>
                                <label><h5>Coliseo@gmail.com</h5></label><br>
                            </div>
                            <div id="icon-operaciones3">
                                <div class="eliminar_cliente">
                                    <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
                                </div><br><br>
                                <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span><br><br>
                                <span href="#div1"  class="MO icon-back"  data-toggle="tooltip" data-placement="top" title="Regresar a Cliente"></span>             
                            </div>
                        </div>
                        -->
                        
                        <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->
                        <img id="logo_empresa_info" src="<%- logo %>" alt="Imagen-Cliente" class="img-thumbnail">
                        <div class="info_cliente1">
                            <h1><b><%- nombreComercial %></b></h1>
                            <a href="#">Ir a proyecto</a>
                        </div>
                        <!-- Iconos para eliminar y editar contacto -->
                        <div id="icon-operaciones2">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-primary"><label class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></label></button>
                                <button type="button" class="btn btn-primary"><label class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></label></button>
                                <button type="button" class="btn btn-primary"><label class="icon-friends"  data-toggle="tooltip" data-placement="top" title="Contactos"></label></button>
                            </div>
                        </div>

                        <!--<hr id="color_hr">-->

                        <!-- id="info_cliente2" este id no sirve -->
                        <table class="table">
                            <tr>
                                <td class="atributo"><b>Nombre Físcal:</b></td>
                                <td><%- nombreFiscal %></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>R.F.C:</b></td>
                                <td><%- rfc %></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Giro:</b></td>
                                <td><%- giro %></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Dirección:</b></td>
                                <td><%- direccion %></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Telefono:</b></td>
                                <td>
                                    <% if (telefonosCliente.length > 1) {
                                        for (var i = 0; i < telefonosCliente.length; i++) { %>
                                            <div><%-telefonosCliente[i].telefono%>-
                                            <%-telefonosCliente[i].tipo%></div>
                                    <% };
                                        } else { %>
                                            <div><%-telefonosCliente.telefono%>-
                                            <%-telefonosCliente.tipo%></div>
                                    <% }; %>
                                </td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Correo electrónico:</b></td>
                                <td><a href="#"><%- email %></a></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Página Web:</b></td>
                                <td><a href="#"><%- paginaWeb %></a></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Servicios de interes:</b></td>
                                <td><% if (serviciosInteres.length) { %>
                                    <%- serviciosInteres %>
                                <% } else { %>
                                    Ninguno.
                                <% }; %></td>
                            </tr>
                            <tr>
                                <td class="atributo"><b>Servicios con los que cuenta:</b></td>
                                <td><% if (serviciosCuenta.length) { %>
                                    <%- serviciosCuenta %>
                                <% } else { %>
                                    Ninguno.
                                <% }; %></td>
                            </tr>
                        </table>
                        <!-- <hr id="color_hr"> -->
                        <!-- id="divcomentarios" este id no sirve-->
                        <div class="modal-footer">
                            <b>Comentarios:</b> <%- comentarioCliente %>
                        </div>
                        <!-- -------PRIMERA PAGINA DE INFORMACION DEL CLIENTE------- -->                        
                    </div>
                </div>
            </div>
        </div>
    </td>
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
<!-- <div class="contenedor_modulo">  -->
<!-- <section> 
<h1 id="titulo_del_modulo"><label>Clientes</label></h1>
<nav>
<ul id="menu_modulo" class="nav nav-pills">
<li>
<a href="modulo_consulta_prospectos">
<div class="icono_menu_modulo">
<span class="icon-contact"></span>
</div>
Prospectos
</a>
</li>
<li>
<a href="modulo_consulta_clientes">
<div class="icono_menu_modulo">
<span class="icon-phpbb"></span>
</div>
Clientes
</a>
</li>  
<li>
<a href="modulo_cliente_nuevo">
<div class="icono_menu_modulo">
<span class="icon-uniF476"></span>
</div>
Nuevo
</a>
</li>       
</ul>
</nav>   
</section>-->
<!-- <section class="contenedor_principal_modulos"> -->
        <div id="posicion_infotd" >
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
                <!-- Aquí se irán añadiendo los clientes a la tabla -->
            </table>
            <button type="button" class="btn btn-default">Eliminar varios</button> 
        </div>
    </div>
<!-- </section> -->


<script type="text/javascript">
    $(document).on('ready', function(){
        $('.icon-uniF478').on('click',function(){
            window.confirm('Estas seguro de eliminar al cliente');
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
        <span class="icon-uniF478"  data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
        <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
        <span class="icon-email"  data-toggle="tooltip" data-placement="top" title="Enviar"></span>
        <span class="icon-uniF488"  data-toggle="tooltip" data-placement="top" title="Ver contacto"></span>
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
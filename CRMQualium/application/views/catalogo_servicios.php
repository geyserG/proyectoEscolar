<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
		
</head>

<style type="text/css">
	.oculto2{
		display: none;
	}
	.visible2{
		display: block;
	}
</style>

<body>
	<section id="catalogo_servicio">
		<h1>Inseción</h1>
		<form id="formServicio">
			<input type="text" id="nombre" name="nombre" placeholder="nombre">
			<input type="text" id="concepto" name="concepto" placeholder="concepto">
			<input type="text" id="precio" name="precio" placeholder="precio">
			<input type="text" id="masiva" name="masiva" placeholder="masiva">
			<input type="text" id="realizacion" name="realizacion" placeholder="realizacion">
			<textarea id="descripcion" name="descripcion" placeholder="descripcion"></textarea>

			<button id="enviar">Enviar</button>
		</form>
	</section>
	<hr>
	<section>
		<h1>Consulta</h1>
		<div  id="consulta_servicios">
			<table id="tablaServicios" border="1">
				
			</table>
		</div>
	</section>
</body>
</html>

<script type="text/plantilla" id="plantilla_servicio">
	<td> <label class="oculto2 visible2"><%- concepto %> </label> 	<input type="text" name="concepto" value="<%- concepto %>" class="oculto2"> </td>
	<td> <label class="oculto2 visible2"><%- nombre %> </label> 		<input type="text" name="nombre" value="<%- nombre %>" class="oculto2"> </td>
	<td> <label class="oculto2 visible2"><%- descripcion %> </label>  <input type="text" name="descripcion" value="<%- descripcion %>" class="oculto2"> </td>
	<td> <label class="oculto2 visible2"><%- realizacion %> </label>  <input type="text" name="realizacion" value="<%- realizacion %>" class="oculto2"> </td>
	<td> <label class="oculto2 visible2"><%- precio %> </label> 		<input type="text" name="precio" value="<%- precio %>" class="oculto2"> </td>
	<td> <label class="oculto2 visible2"><%- masiva %> </label> 		<input type="text" name="masiva" value="<%- masiva %>" class="oculto2"> 
	<td> <button class="editar2">Editar</button> <button class="eliminar2">Eliminar</button>  </td>
</script>

<!-- Librerias -->
<script type="text/javascript" src="<?=base_url().'js/backbone/lib/jquery.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'js/backbone/lib/underscore.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'js/backbone/lib/backbone.js'?>"></script>
<script type="text/javascript">
	var app = app || {};
	app.coleccionDeServicios = <?php echo json_encode($servicios) ?>;
</script>
<!-- MVC -->
<script type="text/javascript" src="<?=base_url().'catalogojs/backbone/modelos/ModeloServicio.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'catalogojs/backbone/colecciones/ColeccionServicios.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'catalogojs/backbone/vistas/VistaNuevoServicio.js'?>"></script>

<script type="text/javascript" src="<?=base_url().'catalogojs/backbone/vistas/VistaServicio.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'catalogojs/backbone/vistas/VistaConsultaServicios.js'?>"></script>
<script type="text/javascript">
	var app = app || {};
</script>










<!-- <script type="text/javascript" src="js/backbone/vista_servicio.js"></script> -->

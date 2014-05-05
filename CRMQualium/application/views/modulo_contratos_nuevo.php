	<script src="js/jquery-ui-1.10.4.custom.js"></script>
	<h3>Nuevo Contrato</h3>
	<hr><br>
	<input class="form-control datepicker " type="text" id="fechaInicio" placeholder="Fecha">	    
	<input type="text" class="form-control" placeholder="Buscar cliente">
	<span id="buscar" class="icon-search"></span>
	<input type="text" class="form-control" placeholder="Cliente">
	<input type="text" class="form-control" placeholder="Representante">
	<br>
	<h3>Inversión & Tiempo</h3>
	<hr><br>
</div> 











<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
</script>
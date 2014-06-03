var app = app || {};

app.VistaNuevaCotizacion = Backbone.View.extend({
	el : '.contenedor_principal_modulos',

	events : {
		// Para mostrar los detalles del servicio...
		'click 	  .btndelete'     : 'eliminarServicio',
		// 'click    .icon-uniF756'  : 'habilitarEdicion',
		'click     #cliente'      : 'buscarCliente',
		'click 	   #guardar'	  : 'guardarCotizacion',
		// 'keypress .visibleI'      : 'actualizar'
		// 'click     #infoSC' : 'ocultarDetalles'
		// 'click .icon-info'        : 'mostrarDetalles',
		// 'click .divCo' : 'mostrarDetalles'
		// 'click .serviciosCotizar' : 'agregarServiciosCo'
	},

	initialize : function () {

		this.$tablaServicios = this.$('#tablaServicios');
		this.cargarServiciosCo();
		this.$trServicio = this.$('#trServicio');
		
		//Datos de la cotizacion
		this.$idcliente 	  = this.$('#idcliente');
		this.$idrepresentante = this.$('#idrepresentante');		
		this.$fecha 		  = this.$('#fecha');		
		this.$detalles   	  = this.$('#detalles');
	},

	// ocultarDetalles : function (elemento) {
	// 	this.$tablaServicios.children().toggleClass('visibleI');	
	// 	// this.$(elemento.currentTarget).toggleClass('visibleI');
	// },

	buscarCliente : function (elemento){ 

		this.clientes = new Array();  var cont  = 0; 
		for(i in app.coleccionDeClientes)
		{
			this.clientes[cont] = app.coleccionDeClientes[i].nombreComercial; cont++;
			this.clientes[cont] = app.coleccionDeClientes[i].id; 			 cont++;			
		};

		$('#cliente').autocomplete({ source: this.clientes});
		var esto = this;
		$( "#cliente" ).on( "autocompleteselect", function( event, ui ) {			
			esto.buscarRepresentante(ui.item.value);
		});

	},

	buscarRepresentante : function(pcliente)
	{
		var busca =0; var encontrado=0;
		representante = new Array();  var contr = 0;
		for(y in app.coleccionDeRepresentantes)
		{
			representante[contr] = app.coleccionDeRepresentantes[y].idcliente; contr++;
			representante[contr] = app.coleccionDeRepresentantes[y].id;        contr++;
			representante[contr] = app.coleccionDeRepresentantes[y].nombre;    contr++;
		};

		for(c in this.clientes)
		{			
			if(pcliente==this.clientes[busca])
			{ 			
				for(r in representante)
				{
					if(this.clientes[busca+1]==representante[encontrado])
					{ 
						$('#idcliente').val(this.clientes[busca+1]);
						$('#idrepresentante').val(representante[encontrado+1]);
						$('#representante').val(representante[encontrado+2]); break;
					}; encontrado++;
				};
				
			}; busca++;
		};			
		
	},

	mostrarDetalles : function (icono) {
		// console.log(	$('#tablaServicios').children().children().children().children().html('td')	);
		$(icono.currentTarget).children().children().toggleClass('visibleI');
		// this.$el.children().children().children().toggleClass('visibleI');	
		// this.$tablaServicios.currentTarget().children().children().children().toggleClass('visibleI');	
	},

	render : function () {
		return this;
	},

	cargarServicioCo	: function (serviciosCotizacion) {
		var vistaServicioCotizacion = new app.VistaServicioCotizacion( { model:serviciosCotizacion } );
		this.$tablaServicios.append( vistaServicioCotizacion.render().el );
	},

	cargarServiciosCo : function (){
		app.coleccionServicios.each(this.cargarServicioCo, this);
	},

	eliminarServicio : function (elemento){
		$(elemento.currentTarget).parents('tr').remove();
		$('#tablaServicios #'+$(elemento.currentTarget).attr('id')).attr('disabled',false);
		$('#tablaServicios #'+$(elemento.currentTarget).attr('id')).attr('checked',false);
	},

	//Funcion para habilitar la edicion de servicios que estan en la lista de servicios cotizando...
	habilitarEdicion : function (elemento){
		var tr = $(elemento.currentTarget).parents('tr');
		tr.children('td').children().toggleClass('visibleI');
		// $(elemento.currentTarget).toggleClass('visibleI');
		// this.$trServicio.children().children().children().toggleClass('visibleI');
		
	},

	obtenerJsonPerfil : function () {

		return {
				id            	: '', 			
				idcliente 	  	:  this.$idcliente.val().trim(),
				idrepresentante :  this.$idrepresentante.val().trim(),
				idempleado      :  '',
				fecha 		  	:  this.$fecha.val().trim(),				
				detalles 	  	:  this.$detalles.val().trim()	
			};
	},

	guardarCotizacion : function (elemento){

		var modeloPerfil = this.obtenerJsonPerfil();
		console.log(modeloPerfil);

	},

	actualizar : function(elemento)
	{
		if(elemento.keyCode === 13) {

			var valorSinEspacios = $(elemento.currentTarget).val().trim();
			// $(e.currentTarget).val(valorSinEspacios);
			var tr = $(elemento.currentTarget).parents('tr');
		    tr.children('td').children().toggleClass('visibleI');
			

			// console.log($('#pprecio').currentTarget.html(valorSinEspacios));
			// this.$('#pprecio').currentTarget.html(valorSinEspacios);
			// this.$input.val(valorSinEspacios);
		// this.cerrar();
		};
	}
	
});

app.vistaNuevaCotizacion = new app.VistaNuevaCotizacion();

app.VistaTablaCotizaciones = app.VistaNuevaCotizacion.extend({
	tagName : 'tr',

	serviciosAgregado : _.template($('#serviciosAgregado').html()),

	events : {
		'click  .icon-uniF756'  : 'habilitarEdicion',
		'keypress .visibleI'      : 'actualizar'
	},

	initialize : function(){
		this.$mostrarTabla = this.$('#mostrarTabla');
	},

	//Funcion para habilitar la edicion de servicios que estan en la lista de servicios cotizando...
	habilitarEdicion : function (elemento){
		var tr = $(elemento.currentTarget).parents('tr');
		tr.children('td').children().toggleClass('visibleI');
		// this.$tagName.children().children().children().toggleClass('visibleI');
		
	},

	actualizar : function(elemento)
	{
		if(elemento.keyCode === 13) {

			var valorSinEspacios = $(elemento.currentTarget).val().trim();
			var tr = $(elemento.currentTarget).parents('tr');
		    tr.children('td').children().toggleClass('visibleI');
			// console.log($('#pprecio').currentTarget.html(valorSinEspacios));
			// this.$('#pprecio').currentTarget.html(valorSinEspacios);
			// this.$input.val(valorSinEspacios);
		// this.cerrar();
		};
	}

});

app.vistaTablaCotizaciones = new app.VistaTablaCotizaciones();

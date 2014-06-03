var app = app || {};

app.VistaServicioCotizacion = app.VistaServicio.extend({
	tagName : 'tr',
	plantillaDefault  : _.template($('#PCservicios').html()),

	serviciosAgregado : _.template($('#serviciosAgregado').html()),

	events : {
		'click .icon-info'        : 'mostrarDetalles',
		'click .serviciosCotizar' : 'agregarServiciosCo',		
	},

	initialize : function () {
		this.$trServicio = this.$('#trServicio');
		
	},

	mostrarDetalles : function (icono) {
		this.$el.children().children().toggleClass('visibleI');			
	},

	agregarServiciosCo : function (elemento){

		if (this.$(elemento.currentTarget).is(':checked')) {
			$('#trServicio').append(this.serviciosAgregado( this.model.toJSON() ));
			// this.$el.children().children('.serviciosCotizar').children().html('');
			this.$(elemento.currentTarget).attr('disabled',true);
		};
	},

	// Funcion para actualizar la lista de servicios a cotizar...
	// actualizar : function(e)
	// {
	// 	console.log($(e.currentTarget));// if(e.keyCode === 13) {
	// 	// 	alert('presionEnter');// this.cerrar();
	// 	// };
	// }
	// 	if(e.which === ENTER_KEY) {
	// 		alert('presionEnter');// this.cerrar();
	// 	}
	// }

});

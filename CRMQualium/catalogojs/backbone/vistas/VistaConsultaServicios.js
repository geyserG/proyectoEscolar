var app = app || {};

app.VistaConsultaServicios = Backbone.View.extend({
	el : '#consulta_servicios',

	events	: {},

	initialize	: function () {
		this.$tablaServicios = this.$('#tablaServicios');
		this.cargarServicios();
		this.listenTo( app.coleccionServicios, 'add', this.cargarServicio );
		this.listenTo( app.coleccionServicios, 'reset', this.cargarServicios );

		// app.coleccionServicios.fetch();
	},

	render	: function () {},

	cargarServicio	: function (modelodeladd) {
		var vistaServicio = new app.VistaServicio( { model:modelodeladd } );
		this.$tablaServicios.append( vistaServicio.render().el );
	},

	cargarServicios	: function () {
		app.coleccionServicios.each(this.cargarServicio, this);
	}
});

app.vistaConsultaServicios = new app.VistaConsultaServicios();
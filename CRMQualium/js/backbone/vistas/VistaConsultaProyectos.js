var app = app || {};

app.VistaConsultaProyectos = Backbone.View.extend({
	el	: '.contenedor_principal_modulos',
	events	: {},
	initialize	: function () {
		this.$tbody_proyectos = this.$('#tbody_proyectos');
		this.listenTo( app.coleccionProyectos, 'add', this.cargarProyecto );
		app.coleccionProyectos.fetch();
	},
	render	: function () {},
	cargarProyecto	: function (modeloProyecto) {
		var vistaProyecto = new app.VistaProyecto( {model:modeloProyecto} );
		this.$tbody_proyectos.append( vistaProyecto.render().el );
	},
	cargarProyectos	: function () {
		app.coleccionProyectos.each( this.cargarProyecto, this );
	},
});

app.vistaConsultaProyectos = new app.VistaConsultaProyectos();
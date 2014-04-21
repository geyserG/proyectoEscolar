var app = app || {};

app.VistaConsultaCliente = Backbone.View.extend({
	el	: '#tbla_cliente',
	events		: {},
	initialize	: function () {
		this.listenTo(app.coleccionClientes, 'add', this.agregarCliente);
		this.listenTo(app.coleccionClientes, 'reset', this.agregarTodosLosClientes);
		app.coleccionClientes.fetch();

		
		// this.listenTo(app.coleccionContactos, 'add', this.agregarContacto);
		// this.listenTo(app.coleccionContactos, 'reset', this.agregarTodosLosContactos);
		app.coleccionContactos.fetch();
	},
	render		: function () {
		return this;
	},
// -----agregarCliente---------------------------- 
	agregarCliente	: function (cliente) {
		var vistaCliente = new app.VistaCliente({model:cliente});

		this.$el.append(vistaCliente.render().el);
	},
// -----agregarTodosLosClientes------------------- 
	agregarTodosLosClientes	: function () {
		app.coleccionClientes.each(this.agregarCliente, this);
	},
});

app.vistaConsultaCliente = new app.VistaConsultaCliente();
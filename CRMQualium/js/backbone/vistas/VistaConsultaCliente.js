var app = app || {};

app.VistaConsultaCliente = Backbone.View.extend({
	el	: '#tbla_cliente',
	events		: {
		'click #obtenerEliminados'	: 'obtenerEliminados',
		// 'click #marcar'				: 'marcar',
		// 'click #desmarcar'			: 'marcar',
	},
	initialize	: function () {
		// this.listenTo(app.coleccionClientes, 'add', this.agregarCliente);
		// this.listenTo(app.coleccionClientes, 'reset', this.agregarTodosLosClientes);
		// this.listenTo(app.coleccionClientes, 'reset', this.obtenerClientes);
		this.listenTo(app.coleccionClientes, 'change:visibilidad', this.obtenerClientes);
		// app.coleccionClientes.fetch();
		this.obtenerClientes();
		// this.agregarCliente();

		
		// this.listenTo(app.coleccionContactos, 'add', this.agregarContacto);
		// this.listenTo(app.coleccionContactos, 'reset', this.agregarTodosLosContactos);
		// app.coleccionContactos.fetch();
	},
	render		: function () {
		return this;
	},

	//---------------------------------------------

	agregarCliente	: function (cliente) {
		var vistaCliente = new app.VistaCliente({model:cliente});

		this.$el.append(vistaCliente.render().el);
	},	
	// marcar	: function () {
	// 	var arregloInputs = document.getElementsByName('checkboxCliente');
	// 	console.log(arregloInputs);
	// },
	obtenerClientes	: function () {
		this.$el.html('');
		var clientes = app.coleccionClientes.where({tipoCliente:'cliente', visibilidad:1});
		this.recursividadCP(clientes);
	},
	obtenerEliminados	: function () {
		this.$el.html('');
		var clientes = app.coleccionClientes.where({tipoCliente:'cliente', visibilidad:0});
		this.recursividadCP(clientes);
	},
	recursividadCP	: function (cp) {//---------------------"cp" es un arreglo de clientes o prospectos
		if (cp!="null" && cp!=null && cp!="" && typeof cp != "undefined") {
			if (cp.length) {
				for (var i = 0; i < cp.length; i++) {
					this.recursividadCP(cp[i]);
				};
			} else {
				this.agregarCliente(cp);
			};
		};
	}
});

app.vistaConsultaCliente = new app.VistaConsultaCliente();


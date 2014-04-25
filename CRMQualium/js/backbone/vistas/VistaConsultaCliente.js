var app = app || {};

app.VistaConsultaCliente = Backbone.View.extend({
	el	: '#tbla_cliente',
	events		: {},
	initialize	: function () {
		// this.listenTo(app.coleccionClientes, 'add', this.agregarCliente);
		// this.listenTo(app.coleccionClientes, 'reset', this.agregarTodosLosClientes);
		app.coleccionClientes.fetch();
		this.obtenerClientes();
		// this.agregarCliente();

		
		// this.listenTo(app.coleccionContactos, 'add', this.agregarContacto);
		// this.listenTo(app.coleccionContactos, 'reset', this.agregarTodosLosContactos);
		app.coleccionContactos.fetch();
	},
	render		: function () {
		return this;
	},

	agregarCliente	: function (cliente) {
		var vistaCliente = new app.VistaCliente({model:cliente});
		// console.log(vistaCliente.render().el);//----------Si lo carga
		this.$el.append(vistaCliente.render().el);

		// this.$divParaCoontacto = $('#tablaParaContactos');
	},

	agregarContacto	: function (contacto, esDe) {
		console.log(esDe);
		var vistaContacto = new app.VistaContacto({model:contacto});
		// console.log(vistaContacto.render().el);//----------Si lo carga
		$(esDe).children().children().children().children( ".oculto" ).append(vistaContacto.render().el);


	},

	funcionRecursivaCP	: function (cp) {//---------------------"cp" es un arreglo de clientes o prospectos
		// console.log(cliente.toJSON());
		// app.coleccionClientes.each(this.agregarCliente, this);
		if (cp.length) {
			for (var i = 0; i < cp.length; i++) {
				this.funcionRecursivaCP(cp[i]);
			};
		} else {
			this.agregarCliente(cp);
			// var idCliente = cp.get('id');
			// console.log('"'+cp.get('id')+'"');
			// var json = {};
			// json.idCliente = cp.get('id');
			// console.log(JSON.stringify(json));
			app.coleccionContactos.fetch();
			var contactos = app.coleccionContactos.where( {idCliente:cp.get('id')} );
			// console.log(contactos);
			this.funcionRecursivaContactos(contactos);

		};
	},

	obtenerClientes	: function () {
		var clientes = app.coleccionClientes.where({tipoCliente:'cliente'});
		this.funcionRecursivaCP(clientes);
	},

	funcionRecursivaContactos	: function (contacto) {
		if (contacto.length) {
			for (var i = 0; i < contacto.length; i++) {
				this.funcionRecursivaContactos(contacto[i]);
			};
		} else{
			if (contacto != '') {
				// console.log(contacto, "#"+contacto.get('id'));
				this.agregarContacto(contacto, "#"+contacto.get('idCliente'));
			};
		};
	}
});

app.vistaConsultaCliente = new app.VistaConsultaCliente();
var app = app || {};

var ColeccionClientes = Backbone.Collection.extend({
	model	: app.ModeloClente,

	// localStorage	: new Backbone.LocalStorage('clientes-backbone'),
	url: 'http://crmqualium.com/api_cliente',

	obtenerTodos : function () {
		return this.filter( function (cliente){
			return cliente.get('id');
		});
	},

	/*establecerIdSiguiente	: function () {
		if(!this.length){
			return 1;
		}
		return this.last().get('idCliente') + 1;
	},*/

	obtenerUltimoId	: function () {
		return this.last().get('id');
	},

<<<<<<< HEAD
	parse	: function (response) {
		return response.cliente;
	}
});

app.coleccionClientes = new ColeccionClientes(app.coleccionDeClientes);
=======
	obtenerUltimo	: function () {
		return this.last();
	}
});

app.coleccionClientes = new ColeccionClientes();

// console.log(app.coleccionClientes.toJSON());
>>>>>>> c542427fa83ec47dbf462f640e82f629bcc57e00

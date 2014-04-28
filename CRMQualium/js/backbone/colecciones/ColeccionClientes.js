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

	parse	: function (response) {
		return response.cliente;
	}
});

app.coleccionClientes = new ColeccionClientes(app.coleccionDeClientes);
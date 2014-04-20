var app = app || {};

var ColeccionClientes = Backbone.Collection.extend({
	model	: app.ModeloClente,

	localStorage	: new Backbone.LocalStorage('clientes-backbone'),

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
	}
});

app.coleccionClientes = new ColeccionClientes();
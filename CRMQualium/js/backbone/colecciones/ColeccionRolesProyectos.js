var app = app || {};

var ColeccionRolesProyectos = Backbone.Collection.extend({
	
	model	: app.ModeloRolProyecto,

	url: 'http://crmqualium.com/api_rolesDeProyecto',
	// localStorage	: new Backbone.LocalStorage('proyectos-backbone'),

	// obtenerTodos : function () {
	// 	return this.filter( function (proyecto){
	// 		return proyecto.get('id');
	// 	});
	// },

	obtenerUltimoId	: function () {
		return this.last().get('id');
	},

	// obtenerUltimo	: function () {
	// 	return this.last();
	// }
});

app.coleccionRolesProyectos = new ColeccionRolesProyectos();
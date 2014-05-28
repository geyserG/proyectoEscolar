var app = app || {};

app.VistaEmpleado = Backbone.View.extend({
	tagName	: 'tr',
	events	: {
		'click .checkbox_empleado'	: 'apilarEmpleado'
	},

	plantillaEmpelado : _.template($('#tds_empleado').html()),

	plantillaSeleccionado : _.template($('#tds_empleado_seleccionado').html()),

	initialize	: function () {
		this.$tbody_empleados_seleccionados = $('#tbody_empleados_seleccionados');
	},

	render	: function () {
		this.$el.html(this.plantillaEmpelado( this.model.toJSON() ));
		return this;
	},

	apilarEmpleado	: function () {
		this.$tbody_empleados_seleccionados.append( this.plantillaSeleccionado(this.model.toJSON() ));
		/*Hacemos referencia a al objeto del DOM para
		cargar los roles, si hay más empleados los roles
		se cargaran en cada uno de los select que exista
		en el DOM*/
		this.$select_rol = $('.select_rol');
		/*En cuanto la plantilla del empleado ha sido
		pintado en pantalla, cargamos los roles*/
		this.cargarRoles();
	},

	cargarRol	: function (rol) {
		var vistaRol = new app.VistaRol({ model:rol });
		this.$select_rol.append( vistaRol.render().el );
	},

	cargarRoles	: function () {
		app.coleccionRoles.each(this.cargarRol, this);
	},
});
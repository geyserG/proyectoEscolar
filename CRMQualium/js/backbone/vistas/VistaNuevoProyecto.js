var app = app || {};
app.VistaNuevoProyecto = Backbone.View.extend({
	el	: '.contenedor_principal_modulos',

	plantillaCliente : _.template($('#option_cliente').html()),
	
	plantillaServicio : _.template($('#tr_servicio').html()),

	events	: {
	},

	initialize	: function () {
		this.$select_clientes = $('#select_clientes');
		this.$select_empleados = $('#select_empleados');
		this.$tbody_servicios = $('#tbody_servicios');
		this.render();
		this.cargarEmpleados();
	},

	render	: function () {
		for (var i = 0; i < app.coleccionDeClientes.length; i++) {
			this.$select_clientes.append(this.plantillaCliente(app.coleccionDeClientes[i]));
		};

		// for (var i = 0; i < app.coleccionDeEmpleados.length; i++) {
		// 	this.$select_empleados.append(this.plantillaEmpleado(app.coleccionDeEmpleados[i]));
		// };

		for (var i = 0; i < app.coleccionDeServicios.length; i++) {
			this.$tbody_servicios.append(this.plantillaServicio(app.coleccionDeServicios[i]));
		};
		return this;
	},

	cargarEmpleado	: function (empleado) {
		var vistaEmpleado = new app.VistaEmpleado({ model:empleado });
		this.$select_empleados.append( vistaEmpleado.render().el );
	},

	cargarEmpleados	: function () {
		app.coleccionEmpleados.each( this.cargarEmpleado, this );
	},
});

app.vistaNuevoProyecto = new app.VistaNuevoProyecto();
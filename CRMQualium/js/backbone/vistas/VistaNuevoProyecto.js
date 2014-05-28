var app = app || {};
/* {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} */
app.VistaServicioProyecto = app.VistaServicio.extend({
	tagName	: 'tr',
	plantillaDefault	: _.template($('#tds_servicio').html()),

	plantillaSeleccionado	: _.template($('#tds_servicio_seleccionado').html()),

	events	: {
		'click .checkbox_servicio'	: 'apilarServicio',
	},

	initialize	: function () {
		this.$tbody_servicios_seleccionados = $('#tbody_servicios_seleccionados');
	},

	apilarServicio	: function (elemento) {
		/*Desabilitar la seleccion del servicio*/
		$(elemento.currentTarget).attr('disabled',true);
		this.$tbody_servicios_seleccionados.append(this.plantillaSeleccionado(this.model.toJSON()));
	}
});
/* {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} */


app.VistaNuevoProyecto = Backbone.View.extend({
	el	: '.contenedor_principal_modulos',

	plantillaCliente : _.template($('#option_cliente').html()),
	
	plantillaServicio : _.template($('#tds_servicio').html()),

	events	: {
		'click .eliminarDeTabla'	: 'eleminiarDeTabla'
	},

	initialize	: function () {
		this.$select_clientes = $('#select_clientes');
		this.$tbody_empleados = $('#tbody_empleados');
		this.$tbody_servicios = $('#tbody_servicios');
		this.render();
		this.cargarServicios();
		this.cargarEmpleados();
	},

	render	: function () {
		for (var i = 0; i < app.coleccionDeClientes.length; i++) {
			this.$select_clientes.append(this.plantillaCliente(app.coleccionDeClientes[i]));
		};

		// for (var i = 0; i < app.coleccionDeEmpleados.length; i++) {
		// 	this.$select_empleados.append(this.plantillaEmpleado(app.coleccionDeEmpleados[i]));
		// };

		// for (var i = 0; i < app.coleccionDeServicios.length; i++) {
		// 	this.$tbody_servicios.append(this.plantillaServicio(app.coleccionDeServicios[i]));
		// };
		return this;
	},
	/* {{{{{{{{{{{{{{{{{CONTROLADORES DE LA SECCIÓN SERVICIOS}}}}}}}}}}}}}}}}} */
		cargarServicio	: function (servicio) {
			var vistaServicio = new app.VistaServicioProyecto({ model:servicio });
			this.$tbody_servicios.append( vistaServicio.render().el );
		},

		cargarServicios	: function () {
			app.coleccionServicios.each( this.cargarServicio, this );
		},

		eleminiarDeTabla	: function (elemento) {
			$( "#tbody_servicios #"+$(elemento.currentTarget).attr('id') ).attr('disabled',false);
			$( "#tbody_servicios #"+$(elemento.currentTarget).attr('id') ).attr('checked',false);
			$(elemento.currentTarget).parents('tr').remove();
		},
	/* {{{{{{{{{{{{{{{{{CONTROLADORES DE LA SECCIÓN SERVICIOS}}}}}}}}}}}}}}}}} */

	/* {{{{{{{{{{{{{{{CONTROLADORES DE LA SECCIÓN ASIGNAR ROLES}}}}}}}}}}}}}}} */
		cargarEmpleado	: function (empleado) {
			var vistaEmpleado = new app.VistaEmpleado({ model:empleado });
			this.$tbody_empleados.append( vistaEmpleado.render().el );
		},

		cargarEmpleados	: function () {
			app.coleccionEmpleados.each( this.cargarEmpleado, this );
		}
	/* {{{{{{{{{{{{{{{CONTROLADORES DE LA SECCIÓN ASIGNAR ROLES}}}}}}}}}}}}}}} */
});

app.vistaNuevoProyecto = new app.VistaNuevoProyecto();
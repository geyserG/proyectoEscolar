var app = app || {};
/* {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} */
app.VistaServicioProyecto = app.VistaServicio.extend({
	tagName	: 'tr',
	plantillaDefault	: _.template($('#tds_servicio').html()),

	plantillaSeleccionado	: _.template(
		$('#tds_servicio_seleccionado').html()
	),

	events	: {
		'click .checkbox_servicio'	: 'apilarServicio',
	},

	initialize	: function () {
		this.$tbody_servicios_seleccionados 
		= $('#tbody_servicios_seleccionados');
	},

	apilarServicio	: function (elem) {
		/*Desabilitar la seleccion del servicio*/
		$(elem.currentTarget).attr('disabled',true);
		this.$tbody_servicios_seleccionados.append(
			this.plantillaSeleccionado(this.model.toJSON())
		);
		this.$el.css('color','#CCC');
	}
});

	    /*--------------------------------------------------*/

// app.VistaCliente = Backbone.View.extend({
// 	tagName	: 'option',

// 	plantilla 	: _.template($('#option_cliente').html()),

// 	render : function () {
// 		this.$el.html( this.plantilla(this.model.toJSON()) );
// 		this.$el.attr( 'value', this.model.get('id') );
// 		return this;
// 	},
// });

	    /*--------------------------------------------------*/
/* {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} */


app.VistaNuevoProyecto = Backbone.View.extend({
	el					: '.contenedor_principal_modulos',

	
	plantillaServicio 	: _.template($('#tds_servicio').html()),

	events	: {
		// 'click #busqueda'					: 'buscarCliente',
		// 'keypress #busqueda'				: 'buscarCliente',
		// 'keydown #busqueda'					: 'buscarCliente',
		// 'keypress #select_clientes'			: 'seleccionarCliente',
		// 'click #select_clientes'			: 'seleccionarCliente',
		// 'blur #select_clientes'				: 'esconderSelect',

		'click .eliminarDeTabla_servicios'	: 'eliminarDeTabla',
		'click .eliminarDeTabla_empleados'	: 'eliminarDeTabla',
		'click .btn_eliminarMarcados'		: 'eliminarMarcados',

		'change #fechaEntrega'				: 'calcularDuracion',
		'change #fechaInicio'				: 'calcularEntrega',
		'change #duracion'					: 'calcularEntrega',
		'keyup #duracion'					: 'calcularEntrega',

		'click #btn_nuevoProyecto'			: 'guadarProyecto',
		'change .btn_marcarTodos'			: 'marcarTodos',
		'click .cerrar'						: 'cerrarAlerta',
	},

	initialize			: function () {
		// this.$select_clientes 	= $('#select_clientes');
		this.$busqueda			= $('#busqueda');
		this.$hidden_cliente_id	= $('#hidden_cliente_id');

		this.$tbody_empleados 	= $('#tbody_empleados');
		this.$tbody_servicios 	= $('#tbody_servicios');
		this.cargarClientes();
		this.cargarServicios();
		this.cargarEmpleados();

		this.$advertencia		= $('#advertencia');
		this.$error 			= $('#error');
		this.$exito 			= $('#exito');
		this.$formNuevoProyecto = $('#formNuevoProyecto');

		this.btn_marcarTodos	= $('.btn_marcarTodos')[0];

		this.$fechaInicio       = $('#fechaInicio');
		this.$fechaEntrega      = $('#fechaEntrega');
		this.$duracion          = $('#duracion');
	},
	render				: function () {
		return this;
	},
	// cargarCliente		: function (cliente) {
	// 	// var vistaCliente = new app.VistaCliente( {model : cliente} );
	// 	// this.$select_clientes.append( vistaCliente.render().el );
	// },
	cargarClientes		: function () {
		// app.coleccionClientes.each( this.cargarCliente, this );
		var esto = this;
		this.$busqueda.autocomplete(
			{
				source : app.coleccionClientes.pluck('nombreComercial'),
				select : function( event, ui ) {
					var cliente = app.coleccionClientes.findWhere({nombreComercial:ui.item.value});
					esto.$hidden_cliente_id.val(cliente.get('id'));
				}
			}
		);
	},
	cargarServicio		: function (servicio) {
		var vistaServicio = new app.VistaServicioProyecto({ 
			model:servicio 
		});
		this.$tbody_servicios.append( vistaServicio.render().el );
	},
	cargarServicios		: function () {
		app.coleccionServicios.each( this.cargarServicio, this );
	},
	eliminarDeTabla	: function (elem) {
		/*Separamos la clase del elem para acceder a la tabla
		del cual queremos eliminar uno de sus tr*/
		var arrayClass = $(elem.currentTarget)
						 .attr('class')
						 .split('_');

		/*Ejemplo de cómo se ve el selector:
		  $(#tbody_servicios #servicio_n).attr('disabled',false);
		  ó
		  $(#tbody_empleados #servicio_n).attr('disabled',false);
		*/
		$( "#tbody_"+arrayClass[1]+" #"
					+$(elem.currentTarget).attr('id') )
					.attr('disabled',false); //activamos el checkbox

		$( "#tbody_"+arrayClass[1]+" #"
					+$(elem.currentTarget).attr('id') )
					.attr('checked',false); //desmarcamos el checkbox

		$( "#tbody_"+arrayClass[1]+" #"
					+$(elem.currentTarget).attr('id') )
					.parents('tr')
					// .removeClass()	//removemos el color del tr
					.css('color','#333'); //Cambiamos color del texto

		$(elem.currentTarget).parents('tr').remove();
	},
	cargarEmpleado		: function (empleado) {
		var vistaEmpleado = new app.VistaEmpleado({ model:empleado });
		this.$tbody_empleados.append( vistaEmpleado.render().el );
	},
	cargarEmpleados		: function () {
		app.coleccionEmpleados.each( this.cargarEmpleado, this );
	},
	calcularDuracion	: function (elem) {
		var valorFechaInicio = new Date(this.$fechaInicio.val())
										.valueOf();
		var valorFechaEntrega = new Date(this.$fechaEntrega.val())
										.valueOf();
		this.$duracion.val(
			((valorFechaEntrega-valorFechaInicio)/24/60/60/1000) +1
		);
	},
	calcularEntrega 	: function (elem) {
		var valorFechaInicio = new Date(this.$fechaInicio.val())
										.valueOf();
		
		var valorFechaTermuno = 
			valorFechaInicio 
			+ ( parseInt(this.$duracion.val())*24*60*60*1000 );
		
		var fF = new Date(valorFechaTermuno);

		var fechaEntrega = fF.getFullYear() +'-';

		if ((fF.getMonth() +1) < 10 )
			fechaEntrega += '0'+(fF.getMonth() +1) +'-';
		else
			fechaEntrega += (fF.getMonth() +1) +'-';
		if ((fF.getDate()) < 10 )
			fechaEntrega += '0'+(fF.getDate());
		else
			fechaEntrega += (fF.getDate());

		this.$fechaEntrega.val( fechaEntrega );
	},
	guadarProyecto		: function (elem) {
		var esto = this;
		/* {}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{} */
		var form = this.pasarAJson($(document.forms[0]).serializeArray());
		form.archivo = new FormData($('#exampleInputFile')[0]);
		console.log(new FormData($('#exampleInputFile')[0]));
		console.log(form);
		elem.preventDefault();
		/* {}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{} */
		for (var i = 0; i < $(document.forms).length; i++) {
			console.log(this.pasarAJson($(document.forms[i]).serializeArray()));
		};
		return;


		
		app.coleccionProyectos.create(
			this.pasarAJson(this.$formNuevoProyecto.serializeArray()),
			{
				// wait	: true,
				success	: function (exito) {
					esto.$exito
						.children('#comentario')
						.html('El proyecto <b>'	+
												exito.get('nombre')
												+'</b> se guardo con exito');
					esto.$exito
						.toggleClass('oculto');
				},
				error	: function (error) {
					esto.$error
						.children('#comentario')
						.html('Ocurrio un error al intentar guardar el proyecto');
					esto.$error
						.toggleClass('oculto');
				}
			}
		);
		elem.preventDefault();
	},
	cerrarAlerta		: function (elem) {
		$(elem.currentTarget)
		.parent()
		.toggleClass('oculto');
	},
	marcarTodos 	: function (elem) {
		var checkboxTabla = document
							.getElementsByName(
								$(elem.currentTarget).attr('id')
							 );
		if ($(elem.currentTarget).is(':checked')) {
			for (var i = 0; i < checkboxTabla.length; i++) {
				checkboxTabla[i].checked = true;
			};
		} else{
			for (var i = 0; i < checkboxTabla.length; i++) {
				checkboxTabla[i].checked = false;
			};
		};
	},
	eliminarMarcados	: function (elem) {
		var atributoClass = $(elem.currentTarget)
							.attr('class')
							.split(' ');
		var checkboxTabla = document
							.getElementsByName(atributoClass[3]);
		var array = new Array();
		for (var i = 0; i < checkboxTabla.length; i++) {
			if ($(checkboxTabla[i]).is(':checked')) {
				array.push(checkboxTabla[i]);
			};
		};
		for (var i = 0; i < array.length; i++) {
			$(array[i])
			.parents('tr')
			.children('.icon-eliminar')
			.children()
			.click();
		};
		/*Restablecemos el boton de Marcar todos*/
		$(elem.currentTarget)//Utilizamo elem como referencia
		.parent()//Nos ubicamos en el padre del elemento
		.children('.btn-group')//Nos hubicamos en el hijo especificado
		.children('.btn')//Nos hubicamos en el hijo del hijo anterios
		.button('toggle');//Conmutamos el botón 
	},

	buscarCliente		: function (elem) {
		if (elem.keyCode === 13) {
			alert( $(elem.currentTarget).val() );
		};
		// if (elem.keyCode !== 13) {
		// 	this.$select_clientes.addClass('vis');
		// 	if (elem.keyCode === 40) {
		// 		this.$select_clientes.focus();
		// 		return;
		// 	};
		// 	/* ------------------------------------ */
		// 	this.$select_clientes.attr('size',app.coleccionClientes.length+1);
		// 	app.coleccionClientes.fetch({
		// 		reset:true,
		// 		data:{
		// 			nombreComercial: this.$busqueda.val()
		// 		}
		// 	});
		// 	/* ------------------------------------ */
		// 	if (app.coleccionClientes.length == 0) {
		// 		app.coleccionClientes.fetch({reset:true, data:{nombreComercial: ''}});
		// 		this.$select_clientes.html('');
		// 	} else {
		// 		this.$select_clientes.html('');
		// 	};
		// 	/* ------------------------------------ */
		// 	this.cargarClientes();
		// } else{
		// 	elem.preventDefault();
		// };
	},

	// seleccionarCliente 	: function (elem) {
	// 	if (elem.keyCode === 13 || elem.type === 'click') {
	// 		this.imprimirCliente();
	// 		this.$select_clientes.blur();
	// 		elem.preventDefault();
	// 	};
	// },
	// imprimirCliente 	: function (){
	// 	this.$busqueda.val( $('#select_clientes option:selected')
	// 						.text()
	// 						.trim()
	// 					  );
	// },
	// esconderSelect	: function () {
	// 	this.$select_clientes.removeClass('vis');
	// },

	pasarAJson			: function (objSerializado) {
	    var json = {};
	    $.each(objSerializado, function () {
	        if (json[this.name]) {
	            if (!json[this.name].push) {
	                json[this.name] = [json[this.name]];
	            };
	            json[this.name].push(this.value || '');
	        } else{
	            json[this.name] = this.value || '';
	        };
	    });
	    return json;
	},
});

app.vistaNuevoProyecto = new app.VistaNuevoProyecto();
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
/* {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} */


app.VistaNuevoProyecto = Backbone.View.extend({
	el					: '.contenedor_principal_modulos',

	
	plantillaServicio 	: _.template($('#tds_servicio').html()),
	plantillaArchivo	: _.template($('#tr_archivo').html()),

	events	: {
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

		'click #btn_subirArchivo'			: 'subirArchivo',
		'change #inputArchivos'				: 'cargarArchivos',
		'click .eliminarArchivo'			: 'eliminarArchivo',
		'click #btn_cancelarArchivo'		: 'eliminarArchivo',
		'click #cancelar'					: 'eliminarArchivo'
	},

	initialize			: function () {
		this.$busqueda			= $('#busqueda');
		this.$hidden_idCliente	= $('#hidden_idCliente');

		this.$tbody_empleados 	= $('#tbody_empleados');
		this.$tbody_servicios 	= $('#tbody_servicios');
		this.cargarClientes();
		this.$fechaInicio       = $('#fechaInicio');
		this.cargarServicios();
		this.cargarEmpleados();

		this.$advertencia		= $('#advertencia');
		this.$error 			= $('#error');
		this.$exito 			= $('#exito');
		this.$formNuevoProyecto = $('#formNuevoProyecto');

		this.btn_marcarTodos	= $('.btn_marcarTodos')[0];

		this.$fechaEntrega      = $('#fechaEntrega');
		this.$duracion          = $('#duracion');

		this.$inputArchivos		= $('#inputArchivos');
		this.$section_resp_Paso2 = $('#paso2 .panel-info .panel-body');
		this.$tbody_archivos	= $('#tbody_archivos');
		this.$tbody_respuesta	= $('#tbody_respuesta');
	},
	render				: function () {
		return this;
	},
	cargarClientes		: function () {
		var esto = this;
		this.$busqueda.autocomplete(
			{
				source : app.coleccionClientes.pluck('nombreComercial'),
				select : function( event, ui ) {
					var cliente = app.coleccionClientes.findWhere({nombreComercial:ui.item.value});
					esto.$hidden_idCliente.val(cliente.get('id'));
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
	cargarEmpleado		: function (empleado) {
		var vistaEmpleado = new app.VistaEmpleado({ model:empleado });
		this.$tbody_empleados.append( vistaEmpleado.render().el );
	},
	cerrarAlerta		: function (elem) {
		$(elem.currentTarget)
		.parent()
		.toggleClass('oculto');
	},
	eliminarDeTabla		: function (elem) {
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
		// /*Restablecemos el boton de Marcar todos*/
		// $(elem.currentTarget)//Utilizamo elem como referencia
		// .parent()//Nos ubicamos en el padre del elem
		// .children('.btn-group')//Nos hubicamos en el hijo especificado
		// .children('.btn')//Nos hubicamos en el hijo del hijo anterios
		// .click('toggle');//Conmutamos el botón
	},
	guadarProyecto		: function (elem) {
		var esto = this;
		var forms = $('#paso1 form');
		for (var i = 0; i < forms.length; i++) {
			console.log(this.pasarAJson($(forms[i]).serializeArray()));
		};
		elem.preventDefault();
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
	marcarTodos 		: function (elem) {
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

	cargarArchivos		: function (elem) {
		this.$tbody_archivos.html('');
		this.arrArchivos = new Array();
		var archivos = $(elem.currentTarget)[0].files;
		for (var i = 0; i < archivos.length; i++) {
			this.$tbody_archivos.append( this.plantillaArchivo( {i:i, tipo:archivos[i].type, nombre:archivos[i].name, tamaño:archivos[i].size} ) );
		};
	},
	subirArchivo		: function (elem) {
		elem.preventDefault();
		var archivos = this.$inputArchivos.prop('files');
		
		var esto = this;
		
		if (this.arrArchivos) {
			esto.$tbody_respuesta.children().removeClass('success');
			for (var i = archivos.length - 1; i >= 0; i--) {
				if ( this.arrArchivos.indexOf(String(i)) == -1 ) {
					var formData = new FormData();
					this.classTr = i;
					var esto = this;
					formData.append('archivo[]',archivos[i]);
					var resp = $.ajax({
			            url: 'http://crmqualium.com/api_archivos',  
			            type: 'POST',
			            async:true,
			            // Form data
			            //datos del formulario
			            data: formData,
			            //necesario para subir archivos via ajax
			            cache: false,
			            contentType: false,
			            processData: false,
			            success: function (exito) {
			        	console.log(esto.classTr);
			            	for (var i = 0; i < exito.length; i++) {
			            		esto.$tbody_respuesta.prepend('<tr class="success"><td>'+exito[i]+'</td></tr>');
			            	};
			            },
			            error  : function (error) {
			            	console.log(error);
			            	// esto.tbody_archivos.children('.'+i).addClass('danger');
			            }
			        });
				};
			};
		}			
	},
	eliminarArchivo		: function (elem) {
		this.arrArchivos.push( $(elem.currentTarget).attr('id') );
		$(elem.currentTarget).parents('tr').remove();
	},
	cancelarArchivos	: function (elem) {
		if ($(elem.currentTarget).attr('id') != 'cancelar') {
			$('#advertencia #comentario').html('Los archivos a subir seran cancelados');
			$('#advertencia').removeClass('oculto');
		} else{
			for (var i = 0; i < $('.eliminarArchivo').length; i++) {
				this.arrArchivos.push(i);
			};
			this.$tbody_archivos.html('');
		};
	}
});

app.vistaNuevoProyecto = new app.VistaNuevoProyecto();
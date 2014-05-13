var app = app || {};

app.VistaCliente = Backbone.View.extend({
	tagName	: 'tr',
	plantilla : _.template($('#plantilla_td_de_cliente').html()),
	events	: {
		//Es el boton para ver CONTACTOS
		'click #contactos'	: 'verContactos',
		//Es el boton de eliminar del tr del CLIENTE
		'click #tr_btn_eliminar'		: 'visibilidad',
		//Es el boton de eliminar la ficha información del CLIENTE
		'click #modal_btn_eliminar'		: 'visibilidad',
		//Es el boton para editar CLIENTE en el MODAL
		'click #editar'	: 'editando',
		//Boton para accesar rapidamente a la edición del cliente
		'click .icon-edit2'	: 'editando',

		/*Eventos de servicios*/
		'keypress .editando'	: 'actualizarAtributoCliente',
		'change .editando'	: 'actualizarAtributoCliente',
		'keypress #inputBusquedaI'	: 'agregarNuevoServ',
		'click	#btn_agregarI'	: 'agregarNuevoServBoton',
		'keypress #inputBusquedaC'	: 'agregarNuevoServ',
		'click	#btn_agregarC'	: 'agregarNuevoServBoton',
		// 'click .serviciosInteres'	: 'actualizarServicios',
		// 'click .serviciosCuenta'	: 'actualizarServicios',
	},
	initialize	: function () {
		/*Listener para capturar los CAMBIOS en cada uno de
		los ATRIBUTOS de los modelos*/
		this.listenTo(this.model, 'change:visibilidad', this.eliminarDelDOM);
		// this.listenTo(this.model, 'change', this.render);


	},
	render	: function () {
		/*Cargar los datos del cliente en la plantilla de underscore
		para luego cargar como html en las etiquetas que hace
		referencia el atributo el. luego esta función sera llamada
		cuendo se instancie esta clase para imprimirlo en pantalla.*/
		this.$el.html(this.plantilla( this.model.toJSON() ));
		/*guardamos los selectores del los botones eliminar y editar
		de la ficha de información del cliente.*/
		this.$btn_eliminar = this.$('#modal_btn_eliminar');
		this.$btn_editar = this.$('#editar');
		/*Guardamos el selector donde se seran impresos los contactos
		y el representante, el selector sera utilizado más adelante.*/
		this.$divContactos = this.$('#divContactos');

		/*Selector del formulario para actualizar los datos del 
		cliente*/


		// this.$editarAtributo = this.$('.editar');
		// this.$btn_iconoEditar = this.$('#editar');
		this.$btn_contactos = this.$('#contactos');
		this.$panelBody = this.$('.panel-body');

		this.$telefonos = this.$('#telefonos');

		this.$serviciosInteres = this.$('#serviciosInteres');
		this.$serviciosCuenta = this.$('#serviciosCuenta');
		// var servicios;
		/*servicios = this.model.get('serviciosInteres');
		console.log(servicios);*/
		this.agregarServciciosClienteI(this.$serviciosInteres);
		/*servicios = this.model.get('serviciosCuenta');
		console.log(servicios);*/
		this.agregarServciciosClienteC(this.$serviciosCuenta);

		//Obtener lo telefonos (modelos) del cliente
		this.agregarTelefono(this.model.get('telefonosCliente'));

		/*A final*/
		// this.$respuesta = this.$('.respuesta'); es el tr de la palomota, no hizo falta

		// {{{{{{{{{{{{{selectores de servicios de interes y actuales}}}}}}}}}}}}}
		this.$menuServiciosInteres	  = this.$('#menuServiciosInteres');
		this.$menuServiciosCuenta	  = this.$('#menuServiciosCuenta');
		// {{{{{{{{{{{{{selectores de servicios de interes y actuales}}}}}}}}}}}}}

		return this;
	},

	//---------------------------------------------

	actualizarAtributoCliente	: function (elemento) {
		/*Cada vez que ocurre el evento keypress este metoso se 
		ejecuta; solo cuando el valos de la propiedad es igual 13 
		equivalente a precionar la tecla enter*/
		if ((elemento.keyCode === 13 || elemento.type === 'change')) {

			var valorJson = this.$(elemento.currentTarget).serializeArray();
			if (valorJson.length == 0) {
				return;
			};

			if (valorJson.length > 0) {
				if (this.$(elemento.currentTarget).attr('class') == 'serviciosInteres editando' || this.$(elemento.currentTarget).attr('class') == 'serviciosCuenta editando') {
					this.actualizarServicios(valorJson,elemento);
	            	return;
				};
	        };

			/*Enviamos la propiedad que deseamos actualizar mediante
			la funcion save de modelo (cliente) actual.*/
			this.model.save(
				/*La función pasarAJson obtiene el nuevo valor y la
				propiedad que queremos actualizar en formato json,
				pero antes los datos en el htmo se serializan para
				obtener un array con las propiedades name y value.*/
				pasarAJson(valorJson),
				{
					wait	: true,//Esperamos respuesta del server
					patch	: true,//Evitamos enviar todo el modelo
					success	: function (exito) {//Encaso del exito
						this.$(elemento.currentTarget)//Selector
							//Salimos del elemento
							.blur()
							//Nos hubicamos en el padre del selector
							.parents('tr')
							//Buscamos al hijo con la clase especificada
							.children('.respuesta')
							//Removemos su atributo class
							.html('<label class="icon-uniF479 exito"></label>')
					},
					error	: function (error) {//En caso de error
						this.$(elemento.currentTarget)//Selector
							//Salimos del elemento
							.blur()
							//Nos hubicamos en el padre del selector
							.parents('tr')
							//Buscamos al hijo con la clase especificada
							.children('.respuesta')
							//Sustituimos html por uno nuevo
							.html('<span class="icon-uniF478 error"></span>')
					}
				}
			);
		};
	},
	actualizarServicios	: function (servicio, elemento) {
		var json = pasarAJson(servicio);
		var modeloServicio = {};
		modeloServicio.idcliente = this.model.get('id');
		
		Backbone.emulateHTTP = true;
		Backbone.emulateJSON = true;

		if ($(elemento.currentTarget).attr('class') == 'serviciosInteres editando') {
			modeloServicio.idservicio = json.nameServiciosInteres;
			app.coleccionServiciosClientesI.create(modeloServicio,{
				wait	:true,
				success	: function (exito) {
					this.$(elemento.currentTarget)//Selector
						//Salimos del elemento
						.blur()
						//Nos hubicamos en el padre del selector
						.parents('tr')
						//Buscamos al hijo con la clase especificada
						.children('.respuesta')
						//Removemos su atributo class
						.html('<label class="icon-uniF479 exito"></label>')
				},
				error 	: function (error) {
					this.$(elemento.currentTarget)//Selector
						//Salimos del elemento
						.blur()
						//Nos hubicamos en el padre del selector
						.parents('tr')
						//Buscamos al hijo con la clase especificada
						.children('.respuesta')
						//Sustituimos html por uno nuevo
						.html('<span class="icon-uniF478 error"></span>')
				}
			});
		};
		if ($(elemento.currentTarget).attr('class') == 'serviciosCuenta editando') {
			modeloServicio.idservicio = json.nameServiciosCuenta;
			app.coleccionServiciosClientesC.create(modeloServicio,{
				wait	:true,
				success	: function (exito) {
					this.$(elemento.currentTarget)//Selector
						//Salimos del elemento
						.blur()
						//Nos hubicamos en el padre del selector
						.parents('tr')
						//Buscamos al hijo con la clase especificada
						.children('.respuesta')
						//Removemos su atributo class
						.html('<label class="icon-uniF479 exito"></label>')
				},
				error 	: function (error) {
					this.$(elemento.currentTarget)//Selector
						//Salimos del elemento
						.blur()
						//Nos hubicamos en el padre del selector
						.parents('tr')
						//Buscamos al hijo con la clase especificada
						.children('.respuesta')
						//Sustituimos html por uno nuevo
						.html('<span class="icon-uniF478 error"></span>')
				}
			});
		};
		
		Backbone.emulateHTTP = false;
		Backbone.emulateJSON = false;
	},
	agregarTelefono	: function (idTelefono) {
		this.vistasTelefono = new Array();
		if (idTelefono.length > 1) {
			this.$telefonos.html('');
			for (var i = 0; i < idTelefono.length; i++) {
				if (idTelefono[i] != "undefined") {
					this.vistasTelefono[idTelefono[i]] = 
					new app.VistaTelefono({
						model:app.coleccionTelefonos.findWhere({
							id:idTelefono[i]
						})
					});
					this.$telefonos.append(
						this.vistasTelefono[idTelefono[i]].render().el
					);
				}
			};
		} else{
			if (typeof idTelefono[0] != "undefined") {
				this.$telefonos.html('');
				this.vistasTelefono[idTelefono[0]] = 
				new app.VistaTelefono({
					model:app.coleccionTelefonos.findWhere({
						id:idTelefono[0]
					})
				});
				this.$telefonos.append(
					this.vistasTelefono[idTelefono[0]].render().el
				);
			}
			
		};
	},
	agregarServciciosClienteI	: function (id) {
		var sI = app.coleccionServiciosClientesI.where({idcliente:this.model.get('id')});
		if (sI.length > 1) {
			for (var i = 0; i < sI.length; i++) {
				if (typeof sI[i] != "undefined") {
					var vSC = new app.VistaServicioCliente({model:sI[i]});
					$(id).append(vSC.render().el);
				}
			};
		} else{
			if (typeof sI[0] != "undefined") {
				var vSC = new app.VistaServicioCliente({model:sI[0]});
				$(id).append(vSC.render().el);
			}
		};
		this.$editarAtributo = this.$('.editar');
	},
	agregarServciciosClienteC	: function (id) {
		var sC = app.coleccionServiciosClientesC.where({idcliente:this.model.get('id')});
		if (sC.length > 1) {
			for (var i = 0; i < sC.length; i++) {
				if (typeof sC[i] != "undefined") {
					var vSC = new app.VistaServicioCliente({model:sC[i]});
					$(id).append(vSC.render().el);
				}
			};
		} else{
			if (typeof sC[0] != "undefined") {
				var vSC = new app.VistaServicioCliente({model:sC[0]});
				$(id).append(vSC.render().el);
			}
		};
		this.$editarAtributo = this.$('.editar');
	},	
	agregarContacto	: function (tipo, esDe, etiqueta) {
		var vista = new app.VistaContacto({model:tipo});
		this.$divContactos.append(vista.render().el);
		vista.establecerEtiqueta(etiqueta);
	},
	cargarContactos	: function () {
		var representante = app.coleccionRepresentantes.findWhere( {
			idcliente:this.model.get('id')
		});
		if (representante != undefined) {
			this.recursividadContactos(
				representante,
				'Representante'
			);
		};
		/*Solo cuando se requiere ver los contactos
		  esto se crean. No al momento de crear al cliente*/
		var contactos = app.coleccionContactos.where( {
			idcliente:this.model.get('id')
		});		
		if (contactos != undefined) {
			this.recursividadContactos(contactos, 'Contacto');
		};

		//OBTENER EL "title" DEL BOTON "conmutar"
		var title = this.$btn_contactos.children().attr('title');
		
		//CAMBIA EL "title"
		if (title == 'Contactos') {
			this.$btn_contactos.children().attr(
				'title',
				'Información'
			);	
		} else {
			this.$btn_contactos.children().attr(
				'title',
				'Contactos'
			);
		};

		//Activar visibilidad de contenedor de contactos
		// this.$panelBody.children().toggleClass('oculto');
	},
	/*Las funciones cargarServicioI y cargarServicioC agregar los
	  servicios dentro de menus desplegables especificados por los 
	  selectores menuServiciosInteres y menuServiciosCuenta. Se 
	  realizan una sola vez; para que se agreguenTodos los servicios 
	  se necesitan las las dos funciones que seguien a estas. para 
	  cada funcion se instancia un nuevo objeto de la clase 
	  VistaServicioIteres y VistaServicioCuenta ejecutando tras ello 
	  las funciones render() pasando la devolucion de render() al 
	  elemento contenido en la propiedad el de dicha clase instanciada
	*/
	cargarServicioI	: function (servicio) {
		var vistaServicioI = new app.VistaServicioInteres({
			model:servicio
		});
		this.$menuServiciosInteres.append(vistaServicioI.render().el);
	},
	cargarServicioC	: function (servicio) {
		var vistaServicioC = new app.VistaServicioCuenta({
			model:servicio
		});
		this.$menuServiciosCuenta.append(vistaServicioC.render().el);
	},
	cargarServiciosI	: function () {
		app.coleccionServicios.each(this.cargarServicioI, this);
	},
	cargarServiciosC	: function () {
		app.coleccionServicios.each(this.cargarServicioC, this);
	},
	agregarNuevoServ	: function (event) {
        if (
        	event.keyCode === 13 
        	&& $(event.currentTarget).attr('id') == 'inputBusquedaI'
        	) {

        	if ($(event.currentTarget).val() != '') {

        		$('#listaInteres').append('<li class="list-group-item">'+ $(event.currentTarget).val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosInteres"></li>');
			}
			event.preventDefault();
        };

        if (
        	event.keyCode === 13 
        	&& $(event.currentTarget).attr('id') == 'inputBusquedaC'
        	) {

        	if ($(event.currentTarget).val() != '') {

        		$('#listaCuenta').append('<li class="list-group-item">'+ $(event.currentTarget).val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosCuenta"></li>');
			}
			event.preventDefault();
        };
    },
    agregarNuevoServBoton	: function (event) {
    	if ($(event.currentTarget).attr('id') == 'btn_agregarI') {
    		$('#listaInteres').append('<li class="list-group-item">'+ $('#inputBusquedaI').val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosInteres"></li>');
    		$('#inputBusquedaI').val('');
    	};
    	if ($(event.currentTarget).attr('id') == 'btn_agregarC') {
    		$('#listaCuenta').append('<li class="list-group-item">'+ $('#inputBusquedaC').val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosCuenta"></li>');
    		$('#inputBusquedaC').val('');
    	};
    },

	editando	: function () {

		this.cargarServiciosI();
		this.cargarServiciosC();
		this.$editarAtributo.toggleClass('editando');
		this.$btn_editar.children().toggleClass('MO icon-back');

		var indiceTel = this.model.get('telefonosCliente');

		if (indiceTel.length > 1) {
			for (var i = 0; i < this.vistasTelefono.length; i++) {
				//Genera un error pero no afecta el la visivilidad
				//del formulario de edición.
				this.vistasTelefono[indiceTel[i]].editando();
			};
		}
		 else{
			this.vistasTelefono[indiceTel[0]].editando();
		};
	},
	eliminarDelDOM	: function () {
		this.$el.remove();
	},
	recursividadContactos	: function (tipo, etiqueta) {
		if (tipo.length) {
			for (var i = 0; i < tipo.length; i++) {
				this.recursividadContactos(tipo[i], etiqueta);
			};
		} else{
			if (tipo != '') {
				this.agregarContacto(
					tipo,
					tipo.get('idcliente'),
					etiqueta
				);
			};
		};
	},
	verContactos	: function () {
		/*Desabilitamos los botones de eliminar y editar
		  para que el usuario entienda que ahora solo 
		  podrá editar a los contactos*/
		this.$btn_eliminar.toggleClass('disabled');
		this.$btn_editar.toggleClass('disabled');

		if (this.$divContactos.attr('class') == 'visible oculto') {
			//CAMBIA LA IMAGEN DEL BOTON
			this.$btn_contactos.children().toggleClass('MO icon-back');
			/*Cargamos el dentro del contenedor mediante la
			  funcion cargarContactos solo si la clase del
			  contenedor es la especificada en la condición*/
			this.cargarContactos();
			/*Quitamos la clase oculto del contenedor para
			  que solo quede como visible mediante el 
			  toogleClass*/
			this.$panelBody.children().toggleClass('oculto');
		} else{
			//CAMBIA LA IMAGEN DEL BOTON
			this.$btn_contactos.children().toggleClass('MO icon-back');
			/*Limpiar el contenedor debido a la funcion append
			  que se ejecuta en la funcion agregarContacto()*/
			this.$divContactos.html('');
			/*Se agrega la clase oculto al contenedor para
			  regresar al conenedor del cliente*/
			this.$panelBody.children().toggleClass('oculto');
		};	
	},
	visibilidad	: function() {
		if (confirm('¿Deseas eliminar al cliente?')) {
			// this.$el.html('');
			this.$('#cerrar_consulta').click();
			this.model.cambiarVisibilidad();
		};
	},

});
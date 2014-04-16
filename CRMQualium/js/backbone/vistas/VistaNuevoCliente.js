var app = app || {};

app.VistaNuevoCliente = Backbone.View.extend({
	el		: '.contenedor_modulo',
	
	events	: {
		'click 	#btn_otroContacto'  : 'otroContacto',
		'click	#btn_crear'	        : 'nuevoCliente',
		'click	#btn_eliminar'	    : 'eliminarTodos_Prueba',
		'click  .eliminarCopia'	    : 'eliminarCopia',
		'click  .icon-uniF477'	    : 'eliminarContacto', // Evento para el icono (boton) eliminar contacto.
		'click	.otroTelefono'	    : 'otroTelefono',
		'click  .otroArchivo'  	    : 'otroArchivo',
		'change .tipo_cliente'	    : 'obtenerTipoCliente',
	},

// -----initialize--------------------------------
	initialize		: function () {
	// Datos básicos
		this.tipoCliente          = '';
		this.$nombreFiscal        = $('#nombreComercial');
		this.$nombreComercial     = $('#nombreFiscal');
		this.$email               = $('#emal');
		this.$rfc                 = $('#rfc');
		this.$paginaWeb           = $('#paginaCliente');
		this.$giro                = $('#giro');
		this.$direccion           = $('#txtareaDireccion');
	// Datos especificos
		this.$representante       = $('#nombreRepresentante');
		this.$correoRepresentante = $('#emailRepresentante');
		this.$cargoRepresentante  = $('#cargoRepresentante');
	// Datos de contacto
		// this.tipoContacto = 0;
		this.$nombreContacto      = $('#contactoNombre');
		this.$correoContacto      = $('#contactoEmail');
		this.$cargoContacto       = $('#contactoCargo');

		this.formularioContacto   = $('#btn_otroContacto').parent().parent().html();
		this.arregloDeContactos   = new Array();
	//Variables de control;
		this.$divClientes         = $('#divClientes');
		this.$divContactos        = $('#divContactos');
		this.idDeContacto;
	// Eventos de la coleccion
		this.listenTo(app.coleccionClientes, 'add', this.agregarCliente);
		this.listenTo(app.coleccionClientes, 'reset', this.agregarTodosLosClientes);

		app.coleccionClientes.fetch();

		this.listenTo(app.coleccionContactos, 'add', this.agregarContacto);
		this.listenTo(app.coleccionContactos, 'reset', this.agregarTodosLosContactos);

		app.coleccionContactos.fetch();

	},
// -----render------------------------------------
	render			: function () {
		return this;
	},
		/*----*/
		/*----*/
		/*----*/
		/*----*/
// -----agregarCliente----------------------------
	agregarCliente	: function (cliente) {
		var vistaCliente = new app.VistaCliente({model:cliente});

		this.$divClientes.append(vistaCliente.render().el);
	},
// -----agregarTodosLosClientes-------------------
	agregarTodosLosClientes	: function () {
		app.coleccionClientes.each(this.agregarCliente, this);
	},
// -----agregarContacto---------------------------
	agregarContacto	: function (contacto) {
		var vistaContacto = new app.VistaContacto({model:contacto});

		this.$divContactos.append(vistaContacto.render().el);
	},
// -----agregarTodosLosContactos------------------
	agregarTodosLosContactos	: function () {
		app.coleccionClientes.each(this.agregarContacto, this);
	},
// -----nuevoContacto-----------------------------
	nuevoContacto	: function (tipoContacto,nombreContacto,correoContacto,cargoContacto,telefonosContactos) {
		if (this.arregloDeContactos.length > 0) {
			for (var i = 0; i < this.arregloDeContactos.length; i++) {
				app.coleccionContactos.create(this.arregloDeContactos[i]);
			};
		} else{
			// this.idDeContacto = app.coleccionContactos.establecerIdSiguiente();//Puede ser usado en el futuro
			app.coleccionContactos.create(this.nuevosAtributosContacto(tipoContacto,nombreContacto,correoContacto,cargoContacto,telefonosContactos));
			// console.log(this.arregloDeContactos);
		};
	},
// -----nuevoCliente------------------------------
	nuevoCliente	: function () {
		if (this.$representante.val() && this.$correoRepresentante.val() && this.$cargoRepresentante.val()) {
			app.coleccionClientes.create(this.nuevosAtributosCliente());
			this.nuevoContacto(0,this.$representante.val() && this.$correoRepresentante.val() && this.$cargoRepresentante.val(),this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')));
		} else{
			alert('Es necesario un representante');
		};

		if (this.$nombreContacto.val() && this.$correoContacto.val() && this.$cargoContacto.val()) {
			this.nuevoContacto(1,this.$nombreContacto.val() && this.$correoContacto.val() && this.$cargoContacto.val(),this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')));
		} else{
			alert('Ningún contato registrado');
		};
	},
// -----eliminarCopia-----------------------------
	eliminarCopia	: function (elemento) {
		$(elemento.currentTarget).parents('.copia').remove();
	},
// -----eliminarColeccionPrueba-------------------
	eliminarTodos_Prueba	: function () {
		_.invoke(app.coleccionClientes.obtenerTodos(),'destroy');
		_.invoke(app.coleccionContactos.obtenerTodos(),'destroy');
	},
// -----eliminarContacto--------------------------
	eliminarContacto	: function (contacto) {
		for (var i = 0; i < this.arregloDeContactos.length; i++) {
			if (i == $(contacto.currentTarget).parent().parent().attr('id')) {
				this.arregloDeContactos[i] = null;
			}
		};


		var newArray = new Array();
		for( var i = 0; i < this.arregloDeContactos.length; i++ ){
			if ( this.arregloDeContactos[i] ){
				newArray.push( this.arregloDeContactos[i] );
			}
		}
		this.arregloDeContactos = newArray;

		$(contacto.currentTarget).parent().parent().remove();
	},
// -----nuevosAtributosContacto-------------------
	nuevosAtributosContacto	: function (tipo,nombre,correo,cargo,telefonos) {
		return {
				   // idContacto : this.idDeContacto,
				    // idCliente : app.coleccionClientes.establecerIdSiguiente(),
				 tipoContacto : tipo,
			   nombreContacto : nombre,
			   correoContacto : correo,
			    cargoContacto : cargo,
			telefonosContacto : telefonos // arrays
		}
	},
// -----nuevosAtributosCliente--------------------
	nuevosAtributosCliente	: function () {
		return {
					    // idCliente : app.coleccionClientes.establecerIdSiguiente(),
				      // tipoCliente : this.tipoCliente,
                     nombreComercial : this.$nombreFiscal.val(),
                        nombreFiscal : this.$nombreComercial.val(),
                               email : this.$email.val(),
                                 rfc : this.$rfc.val(),
                           paginaWeb : this.$paginaWeb.val(),
                                giro : this.$giro.val(),
                           direccion : this.$direccion.val(),
                         tipoCliente : this.tipoCliente,
                    telefonosCliente : this.recursividadTelefonos(document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')),
                    serviciosInteres : this.recursividadServicios(document.getElementsByName('serviciosInteres')),
                     serviciosCuenta : this.recursividadServicios(document.getElementsByName('serviciosCuenta')),
				 //     nombreFiscal : this.$nombreFiscal.val(),
				 //  nombreComercial : this.$nombreComercial.val(),
				 //              rfc : this.$rfc.val(),
				 //        paginaWeb : this.$paginaWeb.val(),
				 //            email : this.$email.val(),
				 // telefonosCliente : this.recursividadTelefonos(document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')),
				 //             giro : this.$giro.val(),
				 // 	    direccion : this.$direccion.val(),
				 // serviciosInteres : this.recursividadServicios(document.getElementsByName('serviciosInteres')),
				 //  serviciosCuenta : this.recursividadServicios(document.getElementsByName('serviciosCuenta')),
				 //         archivos : this.recursividadArchivos(document.getElementsByName('archivo'),document.getElementsByName('tipoArchivo'),document.getElementsByName('comentarioArchivo')),
				 //    representante : this.$representante.val(),
		   //    correoRepresentante :	this.$correoRepresentante.val(),
			  //  cargoRepresentante :	this.$cargoRepresentante.val(),
		   // telefonosRepresentante : this.recursividadTelefonos(document.getElementsByName('telefonoRepresentante'),document.getElementsByName('tipoTelefonoRepresentante')), // arrays
		}
	},
// -----obtenerTipoCliente------------------------
	obtenerTipoCliente	: function (elemento) {
		/*currentTarget obtiene el elemento html,
		  este se utiliza como selector para obtener
		  el valor del elemento seleccionado; en este
		  caso el TIPO de cliente a registrar*/
		// console.log($(elemento.currentTarget).val());

		this.tipoCliente = $(elemento.currentTarget).val();
	},
// -----otroTelefono------------------------------
	otroTelefono	: function (elemento) {
		this.$(elemento.currentTarget).parent().parent().parent().parent().append('<div class="copia">'+this.$(elemento.currentTarget).parent().parent().parent().html()+'</div>');
		$('.copia .icon-uniF476').addClass('icon-uniF477');
		$('.copia .otroTelefono').removeClass().addClass('eliminarCopia');
	},
// -----otroArchivo-------------------------------
	otroArchivo	: function (elemento) {
		this.$(elemento.currentTarget).parent().parent().parent().parent().append('<div class="copia"><hr>'+this.$(elemento.currentTarget).parent().parent().parent().html()+'</div>');
		$('.copia .icon-uniF476').addClass('icon-uniF477');
		$('.copia .otroArchivo').removeClass().addClass('eliminarCopia');
	},
//------otroContacto------------------------------
	otroContacto 	: function (contacto) {
		if (this.$nombreContacto.val() && this.$correoContacto.val() && this.$cargoContacto.val()) {
			if (this.arregloDeContactos.length > 0) {
				if (this.arregloDeContactos > 1) {
					this.idDeContacto++;
					this.arregloDeContactos[this.arregloDeContactos.length + 1] = this.nuevosAtributosContacto(1,this.$nombreContacto.val(),this.$correoContacto.val(),this.$cargoContacto.val(),this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')));
				} else {
					this.idDeContacto++;
					this.arregloDeContactos[this.arregloDeContactos.length] = this.nuevosAtributosContacto(1,this.$nombreContacto.val(),this.$correoContacto.val(),this.$cargoContacto.val(),this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')));
				};
				// console.log(this.arregloDeContactos);
			} else {
				// this.idDeContacto = app.coleccionContactos.establecerIdSiguiente();//Puede ser usado en el futuro
				this.arregloDeContactos[0] = this.nuevosAtributosContacto(1,this.$nombreContacto.val(),this.$correoContacto.val(),this.$cargoContacto.val(),this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')));
				// console.log(this.arregloDeContactos);
			};


			$(contacto.currentTarget).parent().parent().html('<div id="contactosLista"><h3>Datos de contacto</h3><button id="formularioContacto"><span class="icon-uniF476"></span></button><hr></div>');

			if (this.arregloDeContactos.length > 0) {
				for (var i = 0; i < this.arregloDeContactos.length; i++) {
					$('#contactosLista').append('<div id="'+i+'" style="width:400px;"><h4>'+this.arregloDeContactos[i].nombreContacto+'</h4><div class="iconos-operaciones-contacto"><span class="icon-uniF477"></span><span class="icon-edit2"></span></div></div>');
				};
			} else{
				$('#contactosLista').append('<div id="'+0+'" style="width:400px;"><h4>'+this.arregloDeContactos[0].nombreContacto+'</h4><div class="iconos-operaciones-contacto"><span class="icon-uniF477"></span><span class="icon-edit2"></span></div></div>');
			};

			$('#contactosLista').append(this.formularioContacto);

			this.$nombreContacto      = $('#contactosLista #contactoNombre');
			this.$correoContacto      = $('#contactosLista #contactoEmail');
			this.$cargoContacto       = $('#contactosLista #contactoCargo');
		} else{
			alert('Complete el formulario');
		};
	},
// -----recursividadTelefonos---------------------
	recursividadTelefonos	: function (telefono,tipo) {
		if (telefono.length > 1) {
			var arreglo = new Array();
			for (var i = 0; i < telefono.length; i++) {
				arreglo[i] = this.recursividadTelefonos(telefono[i],tipo[i]);
			};

			return arreglo;
		} else{
			var objetoTelefono = {};
			objetoTelefono.telefono = $(telefono).val();
			objetoTelefono.tipo = $(tipo).val();

			return jQuery.parseJSON(JSON.stringify(objetoTelefono));
		};
	},
// -----recursividadServicios---------------------
	recursividadServicios	: function (servicio) {
			var arreglo = new Array();
			var cont = 0;

			for (var i = 0; i < servicio.length; i++) {
				if ($(servicio[i]).is(':checked')) {
					arreglo[cont] = $(servicio[i]).val();
					cont++;
				}
			};

			if (arreglo.length == 1) {
				return arreglo[0];
			} else if (arreglo.length == 0) {
				return '';
			} else {
				return arreglo;
			};
	},
// -----recursividadArchivos----------------------
	recursividadArchivos	: function (archivo,tipo,comentario) {
		if (archivo.length > 1) {
			var arreglo = new Array();
			for (var i = 0; i < archivo.length; i++) {
				arreglo[i] = this.recursividadArchivos(archivo[i],tipo[i],comentario[i]);
			};

			return arreglo;

		} else{
			var objetoArchivo = {};
			objetoArchivo.nombre = $(nombre).val();
			objetoArchivo.tipo = $(tipo).val();
			objetoArchivo.comentario = $(comentario).val();
			return jQuery.parseJSON(JSON.stringify(objetoArchivo));

		};
	},
		/*----*/
		/*----*/
		/*----*/
		/*----*/
});

app.vistaNuevoCliente = new app.VistaNuevoCliente();

// console.log(app.vistaNuevoCliente.$el);
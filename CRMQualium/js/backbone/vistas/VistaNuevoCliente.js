var app = app || {};

app.VistaNuevoCliente = Backbone.View.extend({
	el		: '.contenedor_modulo',
	
	events	: {
		'change .tipo_cliente'	: 'obtenerTipoCliente',
		'click	.otroTelefono'	: 'otroTelefono',
		'click  .otroArchivo'  	: 'otroArchivo',
		'click 	#otroContacto'  : 'otroContacto',
		'click  .eliminarCopia'	: 'eliminarCopia',
		// 'click	#btn_otro_telefonoContacto'	: 'otroTelefono',
		'click	#btn_crear'	: 'nuevoCliente',
		'click	#btn_eliminar'	: 'eliminarTodos_Prueba'
	},
// -----initialize--------------------------------
	initialize		: function () {
	// Datos básicos
		       this.tipoCliente = '';
		     this.$nombreFiscal = $('#nombreComercial');
		  this.$nombreComercial = $('#nombreFiscal');
		            this.$email = $('#emal');
		              this.$rfc = $('#rfc');
		        this.$paginaWeb = $('#paginaCliente');
		 // this.$telefonosCliente = $('.telefonoCliente'); //Puede ser un array de telefonos y tipos
     // this.$tipotelefonosCliente = $('.tipoTelefonoCliente'); INSERVIBLE
		             this.$giro = $('#giro');
		        this.$direccion = $('#txtareaDireccion');
		 // this.$serviciosInteres = $('.serviciosInteres'); //Puede ser un array de servicios y tipos
		  // this.$serviciosCuenta = $('.serviciosCuenta'); //Puede ser un array de servicios y tipos
		         // this.archivos = document.getElementById('ejemplo'); //Nombre del archivo y el tipo
		       // this.$comentario = $('#textAreaComentario'); //Puede no haber comentarios
	// Datos especificos
		    this.$representante = $('#nombreRepresentante');
	  this.$correoRepresentante = $('#emailRepresentante');
       this.$cargoRepresentante = $('#cargoRepresentante');
	// Datos de contacto
		   this.$nombreContacto = $('#contactoNombre');
		   this.$correoContacto = $('#contactoEmail');
		    this.$cargoContacto = $('#contactoCargo');
		// this.$telefonosContacto = $('#contactoTelefono'); //Puede ser un array de telefonos y tipos //INSERVIBLE
	       // this.$colInfoBasica1 = $('#col_info_basica_1');
	        // this.$formTelefonos = $('#col_info_basica_1 .btn-group-justified');
		// this.arregloTelefonos;

		this.$otroContacto = $('#otroContacto');
		this.arrayContactos = new Array();


		this.$divClientes = $('#divClientes');
		this.$divContactos = $('#divContactos');


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
	otroContacto 	: function () {
		// this.arrayContactos[0] = new Array(this.$nombreContacto.val(),this.$correoContacto.val(),this.$cargoContacto.val(),this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')));
		// this.$divClientes.html(this.arrayContactos[0]);
		// console.log(this.arrayContactos[0]);
		// this.$otroContacto.parent().parent().html('');
		// alert('2222');
	},
//------eliminarCopia-----------------------------
	eliminarCopia	: function (elemento) {
		$(elemento.currentTarget).parents('.copia').remove();
		// console.log($(elemento.currentTarget).parents('.copia'));
	},
//------nuevosAtributosContacto-------------------
	nuevosAtributosContacto	: function () {
		return {
				   idContacto : app.coleccionContactos.establecerIdSiguiente(),
				    idCliente : app.coleccionClientes.last().get('idCliente'),
			   nombreContacto : this.$nombreContacto.val(),
			   correoContacto : this.$correoContacto.val(),
			    cargoContacto : this.$cargoContacto.val(),
			telefonosContacto : this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')) // arrays
		}
	},
// -----nuevosAtributosCliente--------------------
	nuevosAtributosCliente	: function () {
		return {
					    idCliente : app.coleccionClientes.establecerIdSiguiente(),
				      tipoCliente : this.tipoCliente,
				     nombreFiscal : this.$nombreFiscal.val(),
				  nombreComercial : this.$nombreComercial.val(),
				              rfc : this.$rfc.val(),
				        paginaWeb : this.$paginaWeb.val(),
				            email : this.$email.val(),
				 telefonosCliente : this.recursividadTelefonos(document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')),
				             giro : this.$giro.val(),
				 	    direccion : this.$direccion.val(),
				 serviciosInteres : this.recursividadServicios(document.getElementsByName('serviciosInteres')),
				  serviciosCuenta : this.recursividadServicios(document.getElementsByName('serviciosCuenta')),
				         archivos : this.recursividadArchivos(document.getElementsByName('archivo'),document.getElementsByName('tipoArchivo'),document.getElementsByName('comentarioArchivo')),
				    representante : this.$representante.val(),
		      correoRepresentante :	this.$correoRepresentante.val(),
			   cargoRepresentante :	this.$cargoRepresentante.val(),
		   telefonosRepresentante : this.recursividadTelefonos(document.getElementsByName('telefonoRepresentante'),document.getElementsByName('tipoTelefonoRepresentante')), // arrays
		}
	},
// -----crearContacto-----------------------------
	nuevoContacto	: function () {
		// alert(this.tipoCliente);
		// this.$el.append('<div>'+this.nuevosAtributosCliente()+'</div>');
		// console.log(this.nuevosAtributosCliente());
		// this.nuevosAtributosCliente();

		app.coleccionContactos.create(this.nuevosAtributosContacto());
		// alert('se agrego satisfactoriamente');
	},
// -----crearCliente------------------------------
	nuevoCliente	: function () {
		// alert(this.tipoCliente);
		// this.$el.append('<div>'+this.nuevosAtributosCliente()+'</div>');
		// console.log(this.nuevosAtributosCliente());
		// this.nuevosAtributosCliente();

		app.coleccionClientes.create(this.nuevosAtributosCliente());
		this.nuevoContacto();
		// alert('se agrego satisfactoriamente');
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
			// console.log(objetoArchivo);
			return jQuery.parseJSON(JSON.stringify(objetoArchivo));

		};
	},


// -----EliminarColeccionPrueba-------------------
	eliminarTodos_Prueba	: function () {
		_.invoke(app.coleccionClientes.obtenerTodos(),'destroy');
		_.invoke(app.coleccionContactos.obtenerTodos(),'destroy');
	}
});

app.vistaNuevoCliente = new app.VistaNuevoCliente();

// console.log(app.vistaNuevoCliente.$el);
var app = app || {};

app.VistaNuevoCliente = Backbone.View.extend({
	el		: '.contenedor_modulo',
	
	events	: {
		'change .tipo_cliente'	: 'obtenerTipoCliente',
		'click	.otroTelefono'	: 'otroTelefono',
		'click  .otroArchivo'  	: 'otroArchivo',
		'click  .eliminarCopia'	: 'eliminarCopia',
		// 'click	#btn_otro_telefonoContacto'	: 'otroTelefono',
		'click	#btn_crear'	: 'nuevoCliente'
		// 'click	#btn_crear'	: 'recursividadTelefonos'
	},
// -----initialize--------------------------------
	initialize		: function () {
	// Datos básicos
		       this.tipoCliente = '';
		     this.$nombreFiscal = $('#nombreComercial');
		  this.$nombreComercial = $('#nombreFiscal');
		            this.$email = $('#emal');
		 // this.$telefonosCliente = $('.telefonoCliente'); //Puede ser un array de telefonos y tipos
     // this.$tipotelefonosCliente = $('.tipoTelefonoCliente'); INSERVIBLE
		             this.$giro = $('#giro');
		        this.$direccion = $('#txtareaDireccion');
		 // this.$serviciosInteres = $('.serviciosInteres'); //Puede ser un array de servicios y tipos
		  // this.$serviciosCuenta = $('.serviciosCuenta'); //Puede ser un array de servicios y tipos
		         // this.archivos = document.getElementById('ejemplo'); //Nombre del archivo y el tipo
		       // this.$comentario = $('#textAreaComentario'); //Puede no haber comentarios
	// Datos especificos
		              this.$rfc = $('#rfc');
		    this.$representante = $('#nombreRepresentante');
		        this.$paginaWeb = $('#paginaCliente');
	// Datos de contacto
		   this.$nombreContacto = $('#contactoNombre');
		   this.$correoContacto = $('#contactoEmail');
		    this.$cargoContacto = $('#contactoCargo');
		// this.$telefonosContacto = $('#contactoTelefono'); //Puede ser un array de telefonos y tipos //INSERVIBLE



	       // this.$colInfoBasica1 = $('#col_info_basica_1');
	        // this.$formTelefonos = $('#col_info_basica_1 .btn-group-justified');

		// this.arregloTelefonos;
	},
// -----render------------------------------------
	render			: function () {
		return this;
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
//------eliminarCopia-----------------------------
	eliminarCopia	: function (elemento) {
		$(elemento.currentTarget).parents('.copia').remove();
		// console.log($(elemento.currentTarget).parents('.copia'));
	},
// -----nuevosAtributos---------------------------
	nuevosAtributos	: function () {
		return {
			      tipoCliente : this.tipoCliente,
			     nombreFiscal : this.$nombreFiscal.val(),
			  nombreComercial : this.$nombreComercial.val(),
			            email : this.$email.val(),

			 telefonosCliente : this.recursividadTelefonos(document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')),
			             giro : this.$giro.val(),
			 	    direccion : this.$direccion.val(),
			 serviciosInteres : this.recursividadServicios(document.getElementsByName('serviciosInteres')),
			  serviciosCuenta : this.recursividadServicios(document.getElementsByName('serviciosCuenta')),
			         archivos : this.recursividadArchivos(document.getElementsByName('archivo'),document.getElementsByName('tipoArchivo'),document.getElementsByName('comentarioArchivo')), // arrays
			       // comentario : this.$comentario.val(),
			              rfc : this.$rfc.val(),
			    representante : this.$representante.val(),
			        paginaWeb : this.$paginaWeb.val(),
			   nombreContacto : this.$nombreContacto.val(),
			   correoContacto : this.$correoContacto.val(),
			    cargoContacto : this.$cargoContacto.val(),
			telefonosContacto : this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto')) // arrays
		}
	},
// -----crearCliente------------------------------
	nuevoCliente	: function () {
		// alert(this.tipoCliente);
		// this.$el.append('<div>'+this.nuevosAtributos()+'</div>');
		console.log(this.nuevosAtributos());
		// this.nuevosAtributos();
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
});

app.vistaNuevoCliente = new app.VistaNuevoCliente();

// console.log(app.vistaNuevoCliente.$el);
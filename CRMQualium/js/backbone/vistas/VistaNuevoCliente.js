var app = app || {};

app.VistaNuevoCliente = Backbone.View.extend({
	el		: '.contenedor_modulo',

	events	: {
	 'click	#btn_agregarContacto'	: 'agregarContactoLista',
		'click #btn_cancelar'		: 'deshacerRegistro',
		'click	#btn_eliminar'	    : 'eliminarTodos_Prueba',
		'click  .eliminarCopia'	    : 'eliminarCopia',
		'click  .icon-uniF477'	    : 'eliminarContacto', // Evento para el icono (boton) eliminar contacto.

		//  eventos para servicios de interes y actuales
			'click	.icon-uniF470'		: 'quitarDeLista',
		   'keyup #inputBusquedaI'	: 'buscarServicioI',
		   'keyup #inputBusquedaC'	: 'buscarServicioC',
		   'keypress #inputBusquedaI': 'agregarNuevoServ',
		   'click	#btn_agregarI'	: 'agregarNuevoServBoton',
		   'keypress #inputBusquedaC': 'agregarNuevoServ',
		   'click	#btn_agregarC'	: 'agregarNuevoServBoton',
		//  eventos para servicios de interes y actuales

		// 'click  .otroArchivo'  	    : 'otroArchivo',
		'click	#btn_crear'	        : 'nuevoCliente',
		'click	#btn_nuevoContacto' : 'nuevoContacto',
		'change .tipo_cliente'	    : 'obtenerTipoCliente',
		'click	.otroTelefono'	    : 'otroTelefono',
		'click 	#btn_otroContacto'  : 'otroContacto',
		'change #fotoCliente'		: 'obtenerFoto',
		'click  #ir'				: 'deshacerRegistro',

		// validaciones
		   'blur #email'			: 'validarCorreo',
		  'blur .telefonoCliente'	: 'validarTelefono',
		  'blur #paginaCliente' 	: 'validarPaginaWeb',

		'blur #contactoEmail'		: 'validarCorreo',
		'blur .telefonoContacto'	: 'validarTelefono',

	  'blur #emailRepresentante' 	: 'validarCorreo',
	  'blur .telefonoRepresentante' : 'validarTelefono',

	  'blur #otroContactoEmail'		: 'validarCorreo' 

	},

// -----initialize-------------------------------- 
	initialize		: function () {
	// Datos básicos
		this.tipoCliente          = '';
		this.$nombreFiscal        = $('#nombreComercial');
		this.$nombreComercial     = $('#nombreFiscal');
		this.$email               = $('#email');
		this.$rfc                 = $('#rfc');
		this.$paginaWeb           = $('#paginaCliente');
		this.$giro                = $('#giro');
		this.$direccion           = $('#txtareaDireccion');
		this.$logoCliente         = $('#logoCliente');
		this.$comentarioCliente   = $('#comentarioCliente');
		this.$foto	              = $("#direccion");

	// Datos especificos
		this.$nombreRepresentante = $('#nombreRepresentante');
		this.$correoRepresentante = $('#emailRepresentante');
		this.$cargoRepresentante  = $('#cargoRepresentante');
	// Datos de contacto
		this.$nombreContacto      = $('#contactoNombre');
		this.$correoContacto      = $('#contactoEmail');
		this.$cargoContacto       = $('#contactoCargo');
	// Dinámica de formulario
		this.arregloDeContactos   = new Array();

		// {{{{{{{{{{{{{variables para servicios de interes y actuales}}}}}}}}}}}}}
		this.$menuServiciosInteres	  = $('#menuServiciosInteres');
		this.$menuServiciosCuenta	  = $('#menuServiciosCuenta');
		// this.$#inputBusquedaI		  = $('#inputBusquedaI');
		// this.$#inputBusquedaC		  = $('#inputBusquedaC');
		// {{{{{{{{{{{{{variables para servicios de interes y actuales}}}}}}}}}}}}}

	//Variables de temporales, COMENTAR PARA NOS VER DATOS AL FONDO DE LA PÁGINA;
		// this.$divClientes         = $('#divClientes');
		// this.$divContactos        = $('#divContactos');
		// this.$visibilidad	      = this.$('.visible');
		// this.$divArchivos		  = $('#divArchivos');
	
	// Eventos de la coleccion
		// this.listenTo(app.coleccionArchivos, 'add', this.agregarArchivo);
		// this.listenTo(app.coleccionArchivos, 'reset', this.agregarTodosLosArchivos);
		// app.coleccionArchivos.fetch();


		// this.listenTo(app.coleccionClientes, 'add', this.agregarCliente);
		// this.listenTo(app.coleccionClientes, 'reset', this.agregarTodosLosClientes);
		app.coleccionClientes.fetch();

		
		// this.listenTo(app.coleccionContactos, 'add', this.agregarContacto);
		// this.listenTo(app.coleccionContactos, 'reset', this.agregarTodosLosContactos);
		// app.coleccionContactos.fetch();

		// app.coleccionTelefonos.fetch();



		
		
		// this.cargarServicios(); //PARA SERVICIOS DE INTERES Y ACTUALES
		// this.listenTo(app.coleccionServicios, 'add', this.cargarServicio);
		// this.listenTo(app.coleccionContactos, 'reset', this.cargarServicios);
		this.cargarServiciosC();
		this.cargarServiciosI();
		// app.coleccionServicios.fetch();
		
	// app.coleccionServicios.reset();
		// this.arrayNombresServicios = app.coleccionServicios.pluck('nombre');
	},
// -----render------------------------------------ 
	render			: function () {
		return this;
	},
// -----agregarContactoLista---------------------- 
	agregarContactoLista	: function () {
		this.$nombreContacto = $('#otroContactoNombre');
		this.$correoContacto = $('#otroContactoEmail');
		this.$cargoContacto = $('#otroContactoCargo');
		$('#contactosLista').html('');
		this.otroContacto();
	},
// -----buscarServicioI--&--buscarServicioC------- 

	buscarServicioI	: function (elemento) {
		
		var buscando = $(elemento.currentTarget).val();
		app.coleccionServicios.fetch({reset:true, data:{nombre: buscando}});

		this.$menuServiciosInteres.html('');
		this.cargarServiciosI();
	}, 

	buscarServicioC	: function (elemento) {
		
		var buscando = $(elemento.currentTarget).val();
		app.coleccionServicios.fetch({reset:true, data:{nombre: buscando}});

		this.$menuServiciosCuenta.html('');
		this.cargarServiciosC();
	},

	agregarNuevoServ	: function (event) {
        if (event.keyCode === 13 && $(event.currentTarget).attr('id') == 'inputBusquedaI') {//

        	if ($(event.currentTarget).val() != '') {

        		$('#listaInteres').append('<li class="list-group-item">'+ $(event.currentTarget).val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosInteres"></li>');
			
			}
            event.preventDefault();
        } 

        if (event.keyCode === 13 && $(event.currentTarget).attr('id') == 'inputBusquedaC') {//

        	if ($(event.currentTarget).val() != '') {

        		$('#listaCuenta').append('<li class="list-group-item">'+ $(event.currentTarget).val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosCuenta"></li>');
			
			}
            event.preventDefault();
        }
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
// -----agregarArchivo---------------------------- 
	// agregarArchivo	: function (archivo) {
	// 	var vistaArchivo = new app.VistaArchivo({model:archivo});

	// 	this.$divArchivos.append(vistaArchivo.render().el);
	// },
// -----agregarTodosLosArchivos------------------- 
	// agregarTodosLosArchivos	: function () {
	// 	app.coleccionArchivos.each(this.agregarArchivo, this);
	// },
// -----agregarContacto--------------------------- 
	// agregarContacto	: function (contacto) {
	// 	var vistaContacto = new app.VistaContacto({model:contacto});

	// 	this.$divContactos.append(vistaContacto.render().el);
	// },
// -----agregarTodosLosContactos------------------ 
	// agregarTodosLosContactos	: function () {
	// 	app.coleccionClientes.each(this.agregarContacto, this);
	// },
	// dameClienteNuevo	: function (cliente) {
	// },
// -----cargarServicios--------------------------- 
	cargarServicioI	: function (servicio) {
		var vistaServicioI = new app.VistaServicioInteres({model:servicio});
		this.$menuServiciosInteres.append(vistaServicioI.render().el);
	},
	cargarServiciosI	: function () {
		app.coleccionServicios.each(this.cargarServicioI, this);
	},
	cargarServicioC	: function (servicio) {
		var vistaServicioC = new app.VistaServicioCuenta({model:servicio});
		this.$menuServiciosCuenta.append(vistaServicioC.render().el);
	},
	cargarServiciosC	: function () {
		app.coleccionServicios.each(this.cargarServicioC, this);
	},
	quitarDeLista	: function (elemento) {
		var arrayServicios = document.getElementsByName($(elemento.currentTarget).attr('name'));

		var servicio = $(elemento.currentTarget).parent().attr('id');

		for (var i = 0; i < arrayServicios.length; i++) {
			if ($(arrayServicios[i]).attr('id') == servicio) {
				$(arrayServicios[i]).prop('checked', false);
				break;
			};
		};
		$(elemento.currentTarget).parent().remove();
	},
// -----deshacerRegistro-------------------------- 
	deshacerRegistro	: function () {
		// _.invoke(new Array(app.coleccionClientes.obtenerUltimo()),'destroy');
		this.$('.visibleR').toggleClass('ocultoR');
	},
// -----eliminarCopia----------------------------- 
	eliminarCopia	: function (elemento) {
		$(elemento.currentTarget).parents('.copia').remove();
	},
// -----eliminarColeccionPrueba------------------- 
	eliminarTodos_Prueba	: function () {
		_.invoke(app.coleccionClientes.obtenerTodos(),'destroy');
		_.invoke(app.coleccionContactos.obtenerTodos(),'destroy');
		_.invoke(app.coleccionTelefonos.obtenerTodos(),'destroy');
		this.arregloDeContactos = new Array();
		this.arrTelefonosContac = new Array();
		// _.invoke(app.coleccionArchivos.obtenerTodos(),'destroy'); NO SIRVE EN ESTE MODULO
	},
// -----eliminarContacto-------------------------- 
	eliminarContacto	: function (contacto) {
		for (var i = 0; i < this.arregloDeContactos.length; i++) {
			if (i == $(contacto.currentTarget).parent().parent().parent().attr('id')) {
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

		$(contacto.currentTarget).parent().parent().parent().remove();

	},
// -----nuevoContacto----------------------------- 
	nuevoContacto	: function () {
		this.otroContacto();

		Backbone.emulateHTTP = true;
		Backbone.emulateJSON = true;
		// return;
		if (this.arregloDeContactos.length > 0) {
			for (var i = 0; i < this.arregloDeContactos.length; i++) {
				// var idContacto;
				app.coleccionContactos.create(this.arregloDeContactos[i],{wait:true});
			}
		}

		var numero;
		var tipo;

		if (this.$nombreRepresentante.val().trim() && this.$correoRepresentante.val().trim() && this.$cargoRepresentante.val().trim()){
			numero = document.getElementsByName('telefonoRepresentante');
			tipo   = document.getElementsByName('tipoTelefonoRepresentante');
			app.coleccionRepresentantes.create(this.nuevosAtributosContacto(this.$nombreRepresentante.val().trim(), this.$correoRepresentante.val().trim(), this.$cargoRepresentante.val().trim(), this.recursividadTelefonos(numero,tipo)));
		}

		Backbone.emulateHTTP = false;
		Backbone.emulateJSON = false;

	},
// -----nuevoCliente------------------------------ 
	nuevoCliente	: function () {

		var json = this.nuevosAtributosCliente();
		
		var valorJson;
		for (var x in json) {
		    if ( Object.prototype.hasOwnProperty.call(json,x)) {
		        valorJson = json[x];
		        if (valorJson==="null" || valorJson===null || valorJson==="" || typeof valorJson === "undefined") {
		            delete json[x];
		        }

		    }
		}

		if (!json.nombreComercial || !json.tipoCliente){
			alert('Registre el tipo de cliente y un nombre de cliente');
			return;
		}

		/////////borrar///////////////////////////////
		// if (app.coleccionClientes.findWhere({id:})) {
		// 	console.log('id econtrado');
		// };
		///////////borrar///////////////////////////////
		var idCliente;

		Backbone.emulateHTTP = true;
		Backbone.emulateJSON = true;
		app.coleccionClientes.create(json,{success:function(exito){
			$('#h1_nombreCliente').html('<span id="span_cliente">'+exito.get('nombreComercial')+'</span>'+'. Datos de contacto');
			this.$('.visibleR').toggleClass('ocultoR');
		Backbone.emulateHTTP = false;
		Backbone.emulateJSON = false;
		}});
		////////////borrar//////////////////////////////7
		// this.nuevoTelefono();
		// this.otroContacto();
		// this.nuevoContacto();
		// this.nuevoArchivo(); NO SIRVE EN ESTE MODULO
		////////////borrar//////////////////////////////7
	},
// -----nuevoTelefono----------------------------- 
	// nuevoTelefono	: function (objsTelefonos) {
	// 	if (objsTelefonos != undefined) {
	// 		Backbone.emulateHTTP = true;
 //  			Backbone.emulateJSON = true;
	// 		if (objsTelefonos.length) {
	// 			for (var i = 0; i < objsTelefonos.length; i++) {
	// 				app.coleccionTelefonos.create(objsTelefonos[i]);
	// 			};
	// 		} else{
	// 			app.coleccionTelefonos.create(objsTelefonos);
	// 		};
	//  		Backbone.emulateHTTP = false;
	//   		Backbone.emulateJSON = false;
	// 	};
	// },
// -----nuevoArchivo---------------No sirve aquí-- 
	// nuevoArchivo	: function () {
	// 	var arreglo = new Array();
	// 	var archivo = document.getElementsByName('archivo');
	// 	var tipoArchivo = document.getElementsByName('tipoArchivo');
	// 	var comentarioArchivo = document.getElementsByName('comentarioArchivo');

	// 	var arreglo = this.recursividadArchivos(archivo,tipoArchivo,comentarioArchivo);
	// 	if (comentarioArchivo.length > 1) {
	// 		for (var i = 0; i < comentarioArchivo.length; i++) {
	// 			if ($(comentarioArchivo[i]).val() != '') {
	// 				app.coleccionArchivos.create(arreglo[i]);
	// 			};
	// 		};
	// 	} else {
	// 		if ($(comentarioArchivo).val() != '') {
	// 			app.coleccionArchivos.create(arreglo);
	// 		};
	// 	};
	// },
// -----nuevosAtributosArchivo-----No sirve aquí-- 
	// nuevosAtributosArchivo	: function (nombre,tipo,comentario) {
	// 	return {
	// 		 nombre : nombre,
	// 		   tipo : tipo,
	// 	 comentario : comentario
	// 	}
	// },
// -----nuevosAtributosContacto------------------- 
	nuevosAtributosContacto	: function (nombre,correo,cargo,telefonos) {/*tipo,*/
		return {
			idCliente : app.coleccionClientes.obtenerUltimo().get('id'),
				 // tipo : tipo,
			   nombre : nombre,
			   correo : correo,
			    cargo : cargo,
			telefonos : telefonos
		}
	},
// -----nuevosAtributosCliente-------------------- 
	nuevosAtributosCliente	: function () {
		return {
             nombreComercial : this.$nombreFiscal.val().trim(),
                nombreFiscal : this.$nombreComercial.val().trim(),
                       email : this.$email.val().trim(),
                         rfc : this.$rfc.val().trim(),
                   paginaWeb : this.$paginaWeb.val().trim(),
                        giro : this.$giro.val(),
           comentarioCliente : this.$comentarioCliente.val().trim(),
                   direccion : this.$direccion.val().trim(),
                 tipoCliente : this.tipoCliente,
            	   telefonos : this.recursividadTelefonos(document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')),
            serviciosInteres : this.recursividadServicios(document.getElementsByName('serviciosInteres')),
             serviciosCuenta : this.recursividadServicios(document.getElementsByName('serviciosCuenta')),
                        foto : this.urlFoto()
		}
	},
// -----obtenerTipoCliente------------------------ 
	obtenerTipoCliente	: function (elemento) {
		/*currentTarget obtiene el elemento html,
		  este se utiliza como selector para obtener
		  el valor del elemento seleccionado; en este
		  caso el TIPO de cliente a registrar*/

		this.tipoCliente = $(elemento.currentTarget).val();
	},
// -----obtenerFoto------------------------------- 
	obtenerFoto	: function () {
	    $("#mensajeFoto").hide();
	    //queremos que esta variable sea global
	    this.fileExtension = "";
	        //obtenemos un array con los datos del archivo
	        var file = $("#fotoCliente")[0].files[0];
	        //obtenemos el nombre del archivo
	        var fileName = file.name;
	        //obtenemos la extensión del archivo
	        this.fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
	        //obtenemos el tamaño del archivo
	        var fileSize = file.size;
	        //obtenemos el tipo de archivo image/png ejemplo
	        var fileType = file.type;
	        //mensaje con la información del archivo
	        showMessage("<span class='info'>Foto a subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
	},
	urlFoto	: function () {
        var formData = new FormData($("#formularioFoto")[0]);
        var mensaje = "";    
        //hacemos la petición ajax  
        var resp = $.ajax({
            url: 'js/backbone/vistas/subirFotoCliente.php',  
            type: 'POST',
            async:false,
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false
        });
        if (resp.responseText != "") return 'img/fotosClientes/'+resp.responseText+'';
	},
// -----otroTelefono------------------------------ 
	otroTelefono	: function (elemento) {
		this.$(elemento.currentTarget).parent().parent().parent().parent().append('<div class="copia">'+this.$(elemento.currentTarget).parent().parent().parent().html()+'</div>');
		$('.copia .icon-uniF476').addClass('icon-uniF477');
		$('.copia .otroTelefono').removeClass().addClass('eliminarCopia');
	},
// -----otroArchivo----------------No sirve aquí-- 
	// otroArchivo	: function (elemento) {
	// 	this.$(elemento.currentTarget).parent().parent().parent().parent().append('<div class="copia"><hr>'+this.$(elemento.currentTarget).parent().parent().parent().html()+'</div>');
	// 	$('.copia .icon-uniF476').addClass('icon-uniF477');
	// 	$('.copia .otroArchivo').removeClass().addClass('eliminarCopia');
	// },
//------otroContacto------------------------------ 
	otroContacto 	: function (contacto) {
		var numero = document.getElementsByName('telefonoContacto');
		var tipo   = document.getElementsByName('tipoTelefonoContacto');
		// return;
		if (this.$nombreContacto.val().trim() && this.$correoContacto.val().trim() && this.$cargoContacto.val().trim()) {
			if (this.arregloDeContactos.length > 0) {
				if (this.arregloDeContactos > 1) {
					this.arregloDeContactos[this.arregloDeContactos.length + 1] = this.nuevosAtributosContacto(this.$nombreContacto.val().trim(),this.$correoContacto.val().trim(),this.$cargoContacto.val().trim(),this.recursividadTelefonos(numero,tipo));
					// this.arrTelefonosContac[this.arrTelefonosContac.length + 1] = this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'));
				} else {
					this.arregloDeContactos[this.arregloDeContactos.length] = this.nuevosAtributosContacto(this.$nombreContacto.val().trim(),this.$correoContacto.val().trim(),this.$cargoContacto.val().trim(),this.recursividadTelefonos(numero,tipo));
					// this.arrTelefonosContac[this.arrTelefonosContac.length] = this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'));
				};
			} else {
				this.arregloDeContactos[0] = this.nuevosAtributosContacto(this.$nombreContacto.val().trim(),this.$correoContacto.val().trim(),this.$cargoContacto.val().trim(),this.recursividadTelefonos(numero,tipo));//
				// this.arrTelefonosContac[0] = this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'));
			};


			if (contacto) {
				$(contacto.currentTarget).parent().parent().html('<div id="listaContactosCliente"><h3>Datos de contacto</h3><br><button id="btn_formularioContacto" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="icon-uniF476"></span></button></div><div class="desborde"></div><hr><table id="contactosLista" class="table"></table>');

				this.$nombreContacto      = $('#contactosLista #contactoNombre');
				this.$correoContacto      = $('#contactosLista #contactoEmail');
				this.$cargoContacto       = $('#contactosLista #contactoCargo');
			};

			if (this.arregloDeContactos.length > 1) {
				for (var i = 0; i < this.arregloDeContactos.length; i++) {
					$('#contactosLista').append('<tr id="'+i+'"><td><h4 style="width:300px;">'+this.arregloDeContactos[i].nombre+'</h4></td></td><td><div class="iconos-operaciones-contacto"><span class="icon-uniF477"></span></div></td></table>');/*</span><span class="icon-edit2">*/
				};
			} else{
				$('#contactosLista').append('<tr id="'+0+'"><td><h4 style="width:300px;">'+this.arregloDeContactos[0].nombre+'</h4></td></td><td><div class="iconos-operaciones-contacto"><span class="icon-uniF477"></span></div></td></table>');/*</span><span class="icon-edit2">*/
			};

			this.$nombreContacto.val('');
			this.$correoContacto.val('');
			this.$cargoContacto.val('');
		}
	},
// -----recursividadTelefonos--------------------- 
	recursividadTelefonos	: function (telefono,tipo) {
		if (telefono.length > 1 && tipo.length > 1) {
			var arreglo = new Array();
			for (var i = 0; i < telefono.length; i++) {
				if ($(telefono[i]).val() != "" && $(tipo[i]).val() != "") {
					arreglo[i] = this.recursividadTelefonos(telefono[i],tipo[i]);
				};
			};
			return arreglo;
		} else if($(telefono).val() != "" && $(tipo).val() != "") {
			var objetoTelefono = {};
			objetoTelefono.numero = $(telefono).val().trim();
			objetoTelefono.tipo = $(tipo).val();
			// objetoTelefono.esDe = esDe;

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
		if (comentario.length > 1) {
			var arreglo = new Array();
				for (var i = 0; i < comentario.length; i++) {
				arreglo[i] = this.recursividadArchivos(archivo[i],tipo[i],comentario[i]);
			};

			return arreglo;

		} else{
			var objetoArchivo = {};
			objetoArchivo.nombre = $(archivo).val().trim();
			objetoArchivo.tipo = $(tipo).val();
			objetoArchivo.comentario = $(comentario).val().trim();
			return jQuery.parseJSON(JSON.stringify(objetoArchivo));

		};
	},

// -----validarCorreo----------------------------- 
	validarCorreo	: function (elemento) {
		if( !(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(this.$(elemento.currentTarget).val().trim())) && this.$(elemento.currentTarget).val().trim() != '' ) {
	      alert('No es un correo valido!');
	      return false;
	    };
	},
//------validarTelefono--------------------------- 
	validarTelefono	: function (elemento) {
		// if(isNaN($(elemento.currentTarget).val().trim()) && $(elemento.currentTarget).val().trim() != '' ) {
		if(!(/^\d{10}$/.test($(elemento.currentTarget).val().trim())) && $(elemento.currentTarget).val().trim() != '' ) {
	        alert('[ERROR]\n\nEscriba 10 números\nNo ingrese letras\nEstablesca un tipo');
	        return false;
	    };
	},
//------validarPaginaWeb-------------------------- 
	validarPaginaWeb	: function () {
		if (!(this.$paginaWeb.val().trim().match(/^[a-z0-9\.-]+\.[a-z]{2,4}/gi)) && this.$paginaWeb.val().trim() != '' ) {
		//   /\.[a-z0-9\.-]+\.[a-z]{2,4}/gi
		//   /^(http|https)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi
			alert('Escriba una url correcta');
		}; 
	},
});

app.vistaNuevoCliente = new app.VistaNuevoCliente();


function showMessage (message) {
    $("#mensajeFoto").html("").show();
    $("#mensajeFoto").html(message);
}
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage (extension) {
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}
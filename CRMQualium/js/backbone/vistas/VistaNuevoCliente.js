var app = app || {};

app.VistaNuevoCliente = Backbone.View.extend({
	el		: '.contenedor_modulo',
	
	events	: {
		'click	#btn_agregarContacto'	: 'agregarContactoLista',
		'click .serviciosInteres'	: 'agregarIntereces',
		'click .serviciosCuenta'	: 'agregarCuentas',
		'click #btn_cancelar'		: 'deshacerRegistro',
		'click	#btn_eliminar'	    : 'eliminarTodos_Prueba',
		'click  .eliminarCopia'	    : 'eliminarCopia',
		'click  .icon-uniF477'	    : 'eliminarContacto', // Evento para el icono (boton) eliminar contacto.
		// 'click  .otroArchivo'  	    : 'otroArchivo',
		'click	#btn_crear'	        : 'nuevoCliente',
		'click	#btn_nuevoContacto' : 'nuevoContacto',
		'change .tipo_cliente'	    : 'obtenerTipoCliente',
		'click	.otroTelefono'	    : 'otroTelefono',
		'click 	#btn_otroContacto'  : 'otroContacto',
		'change #fotoCliente'		: 'obtenerFoto',
		'click  #ir'				: 'deshacerRegistro'

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
		this.arrTelefonosContac   = new Array();
		this.$listaInteres        = $('#listaInteres');
		this.$listaCuenta         = $('#listaCuenta');
		// this.direccionFoto = '';
	//Variables de temporales, COMENTAR PARA NOS VER DATOS AL FONDO DE LA PÁGINA;
		this.$divClientes         = $('#divClientes');
		this.$divContactos        = $('#divContactos');
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
		app.coleccionContactos.fetch();



		app.coleccionTelefonos.fetch();

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
// -----agregarIntereces-------------------------- 
	agregarIntereces	: function () {
		var intereses = document.getElementsByName('serviciosInteres');
		this.$listaInteres.html('');
		this.$listaInteres.append('<li class="list-group-item list-group-item-info">Servicios de interes</li>');
		for (var i = 0; i < intereses.length; i++) {
			if ($(intereses[i]).is(':checked')) {
				this.$listaInteres.append('<li class="list-group-item">'+$(intereses[i]).parent().parent().first().text()+'<label for="'+$(intereses[i]).attr('id')+'" style="float: right;"><span class="icon-uniF470"></span></label></li>');
			};
		};
	},
// -----agregar servicios con los que cuenta------ 
	agregarCuentas	: function () {
		var cuenta = document.getElementsByName('serviciosCuenta');
		this.$listaCuenta.html('');
		this.$listaCuenta.append('<li class="list-group-item list-group-item-info">Servicios con los que cuenta</li>');
		for (var i = 0; i < cuenta.length; i++) {
			if ($(cuenta[i]).is(':checked')) {
				this.$listaCuenta.append('<li class="list-group-item">'+$(cuenta[i]).parent().parent().first().text()+'<label for="'+$(cuenta[i]).attr('id')+'" style="float: right;"><span class="icon-uniF470"></span></label></li>');
			};
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
		// console.log('cliente');
	// },
// -----deshacerRegistro-------------------------- 
	deshacerRegistro	: function () {
		// console.log(new Array(app.coleccionClientes.obtenerUltimo()));
		_.invoke(new Array(app.coleccionClientes.obtenerUltimo()),'destroy');
		this.$('.visibleR').toggleClass('ocultoR');
	},
// -----eliminarCopia----------------------------- 
	eliminarCopia	: function (elemento) {
		$(elemento.currentTarget).parents('.copia').remove();
	},
// -----eliminarColeccionPrueba------------------- 
	eliminarTodos_Prueba	: function () {
		// console.log(app.coleccionClientes.obtenerTodos());
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
				this.arrTelefonosContac[i] = null;
			}
		};


		var newArray = new Array();
		var newArray2 = new Array();
		for( var i = 0; i < this.arregloDeContactos.length; i++ ){
			if ( this.arregloDeContactos[i] ){
				newArray.push( this.arregloDeContactos[i] );
				newArray2.push( this.arrTelefonosContac[i] );
			}
		}
		this.arregloDeContactos = newArray;
		this.arrTelefonosContac = newArray2;

		$(contacto.currentTarget).parent().parent().parent().remove();

	},
// -----nuevoContacto----------------------------- 
	nuevoContacto	: function () {
		this.otroContacto();
		if (this.$nombreRepresentante.val().trim() && this.$correoRepresentante.val().trim() && this.$cargoRepresentante.val().trim()){
			if (this.arregloDeContactos.length > 0) {
				// console.log('si tiene longitud');
				this.arregloDeContactos[this.arregloDeContactos.length] = this.nuevosAtributosContacto(0, this.$nombreRepresentante.val().trim(), this.$correoRepresentante.val().trim(), this.$cargoRepresentante.val().trim());//, 

				// var idContacto = '';
				// for (var i = 0; i < this.arregloDeContactos.length; i++) {
				// 	app.coleccionContactos.create(this.arregloDeContactos[i],{wait:true, function(exito){
				// 		if ((i+1) == this.arregloDeContactos.length)
				// 			idContacto = exito.get('id');
				// 	}});
				// };
				this.arrTelefonosContac[this.arrTelefonosContac.length] = new Array( document.getElementsByName('telefonoRepresentante'),document.getElementsByName('tipoTelefonoRepresentante'));

				
			} else{
				// console.log('no tiene longitud');
				this.arregloDeContactos[0] = this.nuevosAtributosContacto(0, this.$nombreRepresentante.val().trim(), this.$correoRepresentante.val().trim(), this.$cargoRepresentante.val().trim());//, 

				// var idContacto = '';
				// for (var i = 0; i < this.arregloDeContactos.length; i++) {
				// 	app.coleccionContactos.create(this.arregloDeContactos[i],{wait:true, function(exito){
				// 		if ((i+1) == this.arregloDeContactos.length)
				// 			idContacto = exito.get('id');
				// 	}});
				// };
				this.arrTelefonosContac[0] = new Array( document.getElementsByName('telefonoRepresentante'),document.getElementsByName('tipoTelefonoRepresentante'));
				// console.log(this.arrTelefonosContac[0]);

				
			}
		}

		if (this.arregloDeContactos.length > 0) {
			for (var i = 0; i < this.arregloDeContactos.length; i++) {
				var idContacto;
				app.coleccionContactos.create(this.arregloDeContactos[i],{wait:true, success:function(exito){
					idContacto = exito.get('nombreContacto');
					// console.log(this.arrTelefonosContac[i]);
				}});
				this.nuevoTelefono(this.recursividadTelefonos(idContacto,this.arrTelefonosContac[i][0],this.arrTelefonosContac[i][1]));
			};
		}
	},
// -----nuevoCliente------------------------------ 
	nuevoCliente	: function () {
<<<<<<< HEAD
		 Backbone.emulateHTTP = true;
		  Backbone.emulateJSON = true;
		app.coleccionClientes.create(this.nuevosAtributosCliente(),{wait: true, success: function (respuesta) {
			$('#h1_nombreCliente').html('<span id="span_cliente">'+respuesta.get('nombreComercial')+'</span>'+'. Datos de contacto');
			$('.visible').toggleClass('oculto');

			Backbone.emulateHTTP = false;
		  	Backbone.emulateJSON = false;
		}});


=======
		
		// this.urlFoto();
		console.log($('#direccion').attr('src'));

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
			alert('Registre un ombre para el cliente y tipo');
			return;
		}
		// console.log();
		// if (app.coleccionClientes.findWhere({id:})) {
		// 	console.log('id econtrado');
		// };
		
		var idCliente;

		app.coleccionClientes.create(json,{wait:true, success:function(exito){
			$('#h1_nombreCliente').html('<span id="span_cliente">'+exito.get('nombreComercial')+'</span>'+'. Datos de contacto');
			idCliente = exito.get('id');
			this.$('.visibleR').toggleClass('ocultoR');
		}});

		this.nuevoTelefono(this.recursividadTelefonos(idCliente,document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')));
		
>>>>>>> c542427fa83ec47dbf462f640e82f629bcc57e00
		// this.otroContacto();
		// this.nuevoContacto();
		// this.nuevoArchivo(); NO SIRVE EN ESTE MODULO
		
	},
// -----nuevoTelefono------------------------------
	nuevoTelefono	: function (objsTelefonos) {
		if (objsTelefonos != undefined) {
			if (objsTelefonos.length) {
				for (var i = 0; i < objsTelefonos.length; i++) {
					app.coleccionTelefonos.create(objsTelefonos[i]);
				};
			} else{
				app.coleccionTelefonos.create(objsTelefonos);
			};
		};
	},
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
	nuevosAtributosContacto	: function (tipo,nombre,correo,cargo) {/*,telefonos*/
		return {
			        idCliente : app.coleccionClientes.obtenerUltimoId(),
				 tipoContacto : tipo,
			   nombreContacto : nombre,
			   correoContacto : correo,
			    cargoContacto : cargo,
			// telefonosContacto : telefonos
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
            // telefonosCliente : this.recursividadTelefonos(document.getElementsByName('telefonoCliente'),document.getElementsByName('tipoTelefonoCliente')),
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
		// console.log($(elemento.currentTarget).val());

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
            processData: false,
            // success: function(data){
            //     return 'img/fotosClientes/'+data+'';
            // },
            //si ha ocurrido un error
            // error: function(){
            //     mensaje = $("<span class='error'>Ha ocurrido un error al subir el archivo.</span>");
            //     showMessage(mensaje);
            // }
        });
        return 'img/fotosClientes/'+resp.responseText+'';
        // console.log();
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
		if (this.$nombreContacto.val().trim() && this.$correoContacto.val().trim() && this.$cargoContacto.val().trim()) {
			if (this.arregloDeContactos.length > 0) {
				if (this.arregloDeContactos > 1) {
					this.arregloDeContactos[this.arregloDeContactos.length + 1] = this.nuevosAtributosContacto(1,this.$nombreContacto.val().trim(),this.$correoContacto.val().trim(),this.$cargoContacto.val().trim());//,this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'))
					this.arrTelefonosContac[this.arrTelefonosContac.length + 1] = new Array(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'));
				} else {
					this.arregloDeContactos[this.arregloDeContactos.length] = this.nuevosAtributosContacto(1,this.$nombreContacto.val().trim(),this.$correoContacto.val().trim(),this.$cargoContacto.val().trim());//,this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'))
					this.arrTelefonosContac[this.arrTelefonosContac.length] = new Array(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'));
				};
			} else {
				this.arregloDeContactos[0] = this.nuevosAtributosContacto(1,this.$nombreContacto.val().trim(),this.$correoContacto.val().trim(),this.$cargoContacto.val().trim());//,this.recursividadTelefonos(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'))
				this.arrTelefonosContac[0] = new Array(document.getElementsByName('telefonoContacto'),document.getElementsByName('tipoTelefonoContacto'));
			};


			if (contacto) {
				$(contacto.currentTarget).parent().parent().html('<div id="listaContactosCliente"><h3>Datos de contacto</h3><br><button id="btn_formularioContacto" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="icon-uniF476"></span></button></div><div class="desborde"></div><hr><table id="contactosLista" class="table"></table>');

				this.$nombreContacto      = $('#contactosLista #contactoNombre');
				this.$correoContacto      = $('#contactosLista #contactoEmail');
				this.$cargoContacto       = $('#contactosLista #contactoCargo');
			};

			if (this.arregloDeContactos.length > 1) {
				for (var i = 0; i < this.arregloDeContactos.length; i++) {
					$('#contactosLista').append('<tr id="'+i+'"><td><h4 style="width:300px;">'+this.arregloDeContactos[i].nombreContacto+'</h4></td></td><td><div class="iconos-operaciones-contacto"><span class="icon-uniF477"></span></div></td></table>');/*</span><span class="icon-edit2">*/
				};
			} else{
				$('#contactosLista').append('<tr id="'+0+'"><td><h4 style="width:300px;">'+this.arregloDeContactos[0].nombreContacto+'</h4></td></td><td><div class="iconos-operaciones-contacto"><span class="icon-uniF477"></span></div></td></table>');/*</span><span class="icon-edit2">*/
			};

			this.$nombreContacto.val('');
			this.$correoContacto.val('');
			this.$cargoContacto.val('');

			

		}
	},
// -----recursividadTelefonos--------------------- 
	recursividadTelefonos	: function (esDe,telefono,tipo) {
		if (telefono.length > 1) {
			var arreglo = new Array();
			for (var i = 0; i < telefono.length; i++) {
				if ($(telefono[i]).val() != "") {
					// console.log('fue en el if');
					arreglo[i] = this.recursividadTelefonos(esDe,telefono[i],tipo[i]);
				};
			};

			return arreglo;
		} else if($(telefono).val() != "") {
			// console.log('fue en el else');
			var objetoTelefono = {};
			objetoTelefono.telefono = $(telefono).val().trim();
			objetoTelefono.tipo = $(tipo).val();
			objetoTelefono.esDe = esDe;

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
	}
});

app.vistaNuevoCliente = new app.VistaNuevoCliente();

// console.log(app.vistaNuevoCliente.$el);

function showMessage (message){
    $("#mensajeFoto").html("").show();
    $("#mensajeFoto").html(message);
}
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage (extension)
{
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

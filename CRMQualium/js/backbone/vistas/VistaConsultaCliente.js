var app = app || {};

app.VistaConsultaCliente = Backbone.View.extend({
	el	: '#tbla_cliente',
	events		: {
		/*Boton que debe aparecer solo si el usuario tiene
		  permiso pa ver clientes eliminados*/
		'click #obtenerEliminados'	: 'obtenerEliminados',
		/*Esté evento ocurre cuando se introduce una letra dentro
		del elemento input con id inputBuscarCliente y se a levantado
		la tecla precionada. tras dicho evento se ejecuta la funcion
		buscarCliente.*/
		'keyup #inputBuscarCliente'	: 'buscarCliente',
		// 'click #marcar'				: 'marcar',
		// 'click #desmarcar'			: 'marcar',

		// 'keyup #inputBusquedaI'	: 'buscarServicioI',
		// 'keyup #inputBusquedaC'	: 'buscarServicioC',
		// 'click .icon-uniF470'	: 'quitarDeLista',
	},
	initialize	: function () {
		// this.listenTo(app.coleccionClientes, 'add', this.agregarCliente);
		// this.listenTo(app.coleccionClientes, 'reset', this.agregarTodosLosClientes);
		// this.listenTo(app.coleccionClientes, 'reset', this.obtenerClientes);
		// this.listenTo(app.coleccionClientes, 'change:visibilidad', this.obtenerClientes);
		// app.coleccionClientes.fetch();
		this.$inputBuscarCliente = $('#inputBuscarCliente');
		/*El selector #filasClientes es el id de la la etiqueta
		tbody del archivo modulo_consulta_clientes.php.*/
		this.$filasClientes = $('#filasClientes');
		/*Cuando se intancie la clase VistaConsultaCliente lo primero
		que se ejecutará será la funcion initialize. el cual ejecutara
		la función obtenerClientes(). Está fución se encargará de
		imprimir a todos los clientes.*/
		this.obtenerClientes();
		// this.agregarCliente();
		
		// this.listenTo(app.coleccionContactos, 'add', this.agregarContacto);
		// this.listenTo(app.coleccionContactos, 'reset', this.agregarTodosLosContactos);
		// app.coleccionContactos.fetch();

		


	},
	render		: function () {
		return this;
	},

	//---------------------------------------------

// -----buscarServicioI--&--buscarServicioC------- 

	// buscarServicioI	: function (elemento) {
		
	// 	var buscando = $(elemento.currentTarget).val();
	// 	app.coleccionServicios.fetch({reset:true, data:{nombre: buscando}});

	// 	this.$menuServiciosInteres.html('');
	// 	this.cargarServiciosI();
	// }, 

	// buscarServicioC	: function (elemento) {
		
	// 	var buscando = $(elemento.currentTarget).val();
	// 	app.coleccionServicios.fetch({reset:true, data:{nombre: buscando}});

	// 	this.$menuServiciosCuenta.html('');
	// 	this.cargarServiciosC();
	// },

	// agregarNuevoServ	: function (event) {
 //        if (event.keyCode === 13 && $(event.currentTarget).attr('id') == 'inputBusquedaI') {

 //        	if ($(event.currentTarget).val() != '') {

 //        		$('#listaInteres').append('<li class="list-group-item">'+ $(event.currentTarget).val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosInteres"></li>');
			
	// 		}
 //            event.preventDefault();
 //        } 

 //        if (event.keyCode === 13 && $(event.currentTarget).attr('id') == 'inputBusquedaC') {

 //        	if ($(event.currentTarget).val() != '') {

 //        		$('#listaCuenta').append('<li class="list-group-item">'+ $(event.currentTarget).val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosCuenta"></li>');
			
	// 		}
 //            event.preventDefault();
 //        }
 //    },

    // agregarNuevoServBoton	: function (event) {
    // 	if ($(event.currentTarget).attr('id') == 'btn_agregarI') {
    // 		$('#listaInteres').append('<li class="list-group-item">'+ $('#inputBusquedaI').val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosInteres"></li>');
    // 		$('#inputBusquedaI').val('');
    // 	};
    // 	if ($(event.currentTarget).attr('id') == 'btn_agregarC') {
    // 		$('#listaCuenta').append('<li class="list-group-item">'+ $('#inputBusquedaC').val() +'<label class="icon-uniF470" style="float: right;"><span></span></label><input type="checkbox" class="check_posicion" name="serviciosNoClasificadosCuenta"></li>');
    // 		$('#inputBusquedaC').val('');
    // 	};
    // },
// -----cargarServicios--------------------------- 
	/*Las funciones cargarServicioI y cargarServicioC agregar los servicios 
	dentro de menus desplegables especificados por los selectores
	menuServiciosInteres y menuServiciosCuenta. Se realizan una sola vez;
	para que se agreguenTodos los servicios se necesitan las las dos 
	funciones que seguien a estas. para cada funcion se instancia un nuevo
	objeto de la clase VistaServicioIteres y VistaServicioCuenta ejecutando
	tras ello las funciones render() pasando la devolucion de render() al
	elemento contenido en la propiedad el de dicha clase instanciada*/
	// cargarServicioI	: function (servicio) {
	// 	var vistaServicioI = new app.VistaServicioInteres({model:servicio});
	// 	this.$menuServiciosInteres.append(vistaServicioI.render().el);
	// },
	// cargarServicioC	: function (servicio) {
	// 	var vistaServicioC = new app.VistaServicioCuenta({model:servicio});
	// 	this.$menuServiciosCuenta.append(vistaServicioC.render().el);
	// },
	/*Las funciones carcarServiciosI y cargarServiciosC recorren la colección
	de servicios ejecutando las funciones especificadas como parametros un 
	número de veces definido por la misma longitud de modelos que contiene 
	establecida por el parametro this. El resultado puede verse en el menú
	desplegable en el archivo modulo_cliente_nuevo.php.*/
	// cargarServiciosI	: function () {
	// 	app.coleccionServicios.each(this.cargarServicioI, this);
	// },
	// cargarServiciosC	: function () {
	// 	app.coleccionServicios.each(this.cargarServicioC, this);
	// },
	// quitarDeLista	: function (elemento) {
	// 	/*Esta funcion recibe un parametro al y se ejecuta al momento de ejecutarse
	// 	el evento para quitar de la lista uno de los servicios. El parametro
	// 	es un objeto del DOM.

	// 	En la variable arrayServicios se almacenan los objetos que coincidan
	// 	con el mismo atributo name.*/
	// 	var arrayServicios = document.getElementsByName($(elemento.currentTarget).attr('name'));

	// 	/*En la variable servicio almacenamos el id del elemento que se quiere
	// 	quitar de la lista.*/
	// 	var servicio = $(elemento.currentTarget).parent().attr('id');

	// 	Mediante el ciclo for se itera sobre los elementos del arreglo
	// 	arrayServicios hasta encontrar una coincidencia de id espeficicada
	// 	en la condición if. se establece como falso y se rompe el ciclo.
	// 	Esto se hace para no desactivar todos los alementos de la lista
	// 	que se han agregado para el cliente. Hay un checkbox oculto con 
	// 	cada elemento de la lista
	// 	for (var i = 0; i < arrayServicios.length; i++) {
	// 		if ($(arrayServicios[i]).attr('id') == servicio) {
	// 			$(arrayServicios[i]).prop('checked', false);
	// 			break;
	// 		};
	// 	};

	// 	// Finalmente se remueve del DOM el servicio que ya no se quiera ver en ella
	// 	$(elemento.currentTarget).parent().remove();
	// },

	agregarCliente	: function (cliente) {
		/*El parametro cliente contiene las propiedades del cliente
		que seran pasadas como modelo a la clase VistaCliente e
		instanciar un nuevo objeto de la misma clase dentro de
		la variable vistaCliente.*/
		var vistaCliente = new app.VistaCliente({model:cliente});
		/*Ya intanciado un objeto de la clase VistaCliente se ejecuta
		la funcion render() contenida en la instancia a la vez de
		encerrar lo que devuelve la funcion render() en el elemento
		html contenida en la propiedad el del mismo de la misma 
		instancia.
		Finalemente se apila dentro del elemento html especificada
		dentro del selector asicosiado a $filasCliente de dentro de
		esta vista (VistaConsultaCliente)*/
		this.$filasClientes.append(vistaCliente.render().el);
	},
	buscarCliente	: function () {
		/*Obtenemos al cliente mediante la finción fetch especificando
		el nombreComercial capturado por el evento keyup. No es
		necesario almacenar a el o los clientes que coincidieron con 
		la búsqueda	porque especificamos que cada vez que se se 
		realice también se actualice la colección con las 
		coincidencias.*/
		app.coleccionClientes.fetch({
			reset:true,
			data:{
				nombreComercial: this.$inputBuscarCliente.val()
			}
		});
		/*Borramos lo que contenga las etiquetas tbody antes de
		imprimir lo que contenga la coleccion de clientes.*/
		this.$filasClientes.html('');
		/*Ejecutamos la funcion obtenerClientes() para pintar los
		datos de la coleccion en pantalla.*/
		this.obtenerClientes();
	},
	// marcar	: function () {
	// 	var arregloInputs = document.getElementsByName('checkboxCliente');
	// 	console.log(arregloInputs);
	// },
	obtenerClientes	: function () {
		/*Obtenemos los clientes que contengan los
		atributos especificados en la fincion where
		de la coleccion de clientes. Se almacena
		dentro de la variable clientes que puede ser
		un array de clientes.*/
		var clientes = app.coleccionClientes.where({
			tipoCliente:'cliente',
			visibilidad:true
		});
		/*Pasamos la variable clientes a la función recursividadCP 
		que a su vez pasará como parametro a cada uno de los 
		objetos cliente para imprimirlos en pantalla.*/
		this.recursividadCP(clientes);
	},
	obtenerEliminados	: function () {
		/*Esta función solo puede ser ejecutada si el usuario
		tiene el permiso*/

		/*Limpiar el contenedor actuamente contiene clientes activos
		para desplegar los clientes eliminados*/
		this.$filasClientes.html('');
		/*La funcion where busca dentro de la colección 
		a los clientes de tipo cliente que tengan 
		visibilidad igual a falso. Esto quiere decir 
		que son clientes eliminados de manera ficticia.
		A continuación se alacena en una variable*/
		var clientes = app.coleccionClientes.where({
			tipoCliente:'cliente',
			visibilidad:false
		});
		/*La variable "clientes" contiene a todos los
		encontrados. Se pasa como parametro a la 
		funcion recursividadCP*/
		this.recursividadCP(clientes);
	},
	recursividadCP	: function (cp) {
		/*el parametro cp es un arreglo de objetos que contiene a
		clientes activos, aliminados así como prospectos.*/
		if (cp!="null" 
			&& cp!=null 
			&& cp!="" 
			&& typeof cp != "undefined") 
		{
			if (cp.length) {
				/*Si el parametro "cp" es un arreglo entra dentro de
				un ciclo que ejecuta nuevamente pero con un solo
				objeto dentro del parametro.*/
				for (var i = 0; i < cp.length; i++) {
					this.recursividadCP(cp[i]);
				};
			} else {
				/*En caso de que el parametro sea solo un objeto se
				ejecuta	la siguiente función.*/
				this.agregarCliente(cp);
			};
		};
	}
});

app.vistaConsultaCliente = new app.VistaConsultaCliente();


var app = app || {};

app.VistaCliente = Backbone.View.extend({
	tagName	: 'tr',
	plantilla : _.template($('#plantilla_td_de_cliente').html()),
	events	: {
		'click #contactosCliente'	: 'verContactos', //Es el boton para ver CONTACTOS
		'click .icon-trash'		: 'visibilidad', //Es el boton de eliminar del tr del CLIENTE
		'click #editar'	: 'editando' //Es el boton para editar CLIENTE en el MODAL
	},
	initialize	: function () {
		// this.listenTo(this.model, 'destroy', this.remove);
		// this.listenTo(this.model, 'change', this.render);
		// this.listenTo(this.model, 'change', this.eliminarDelDOM);

		// this.vistasTelefono = new Array();
	},
	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		this.$editar = this.$('.editar');
		this.$btn_iconoEditar = this.$('#editar');
		this.$btn_iconoContactos = this.$('#contactosCliente');
		this.$panelBody = this.$('.panel-body');

		this.$telefonos = this.$('#telefonos');
		this.agregarTelefono(this.model.get('telefonosCliente'));

		this.$serviciosInteres = this.$('#serviciosInteres');
		this.$serviciosCuenta = this.$('#serviciosCuenta');
		var servicios;
		servicios = this.model.get('serviciosInteres');
		if (servicios != undefined) {
			this.agregarServciciosCliente(servicios,this.$serviciosInteres);
		};
		servicios = this.model.get('serviciosCuenta');
		if (servicios != undefined) {
			this.agregarServciciosCliente(servicios,this.$serviciosCuenta);
		};

		return this;
	},

	//---------------------------------------------

	agregarTelefono	: function (idTelefono) {
		this.vistasTelefono = new Array();
		if (idTelefono.length > 1) {
			this.$telefonos.html('');
			for (var i = 0; i < idTelefono.length; i++) {
				if (idTelefono[i] != "undefined") {
					this.vistasTelefono[idTelefono[i]] = new app.VistaTelefono({
						model:app.coleccionTelefonos.findWhere({id:idTelefono[i]})
					});
					this.$telefonos.append(this.vistasTelefono[idTelefono[i]].render().el);
				}
			};
		} else{
			this.$telefonos.html('');
			if (typeof idTelefono[0] != "undefined") {
				this.vistasTelefono[idTelefono[0]] = new app.VistaTelefono({
					model:app.coleccionTelefonos.findWhere({id:idTelefono[0]})
				});
				this.$telefonos.append(this.vistasTelefono[idTelefono[0]].render().el);
			}
			
		};
	},
	agregarServciciosCliente	: function (servicios,id) {
		// if (servicios != undefined) {
			// $(id).html('');
			if (servicios.length > 1) {
				for (var i = 0; i < servicios.length; i++) {
					if (typeof servicios[i] != "undefined") {
						$(id).append('<small class="editar editando">'+servicios[i].nombre+', </small>');
					}
				};
			} else{
				if (typeof servicios[0] != "undefined") {
					$(id).append('<small class="editar editando">'+servicios.nombre+', </small>');
				}
				
			};
		// };
	},
	editando	: function () {
		this.$editar.toggleClass('editando');
		this.$btn_iconoEditar.children().toggleClass('MO icon-back');

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
	verContactos	: function () {
		/*Limpiar el contenedor debido a la funcion append
		  que se ejecuta en la funcion agregarContacto()*/
		this.$('#divContactos').html('');
		/*Solo cuando se requiere ver los contactos
		  esto se crean. No al momento de crear al cliente*/
		var contactos = app.coleccionContactos.where( {idcliente:this.model.get('id')});		
		this.recursividadContactos(contactos);

		//OBTENER EL "title" DEL BOTON "conmutar"
		var title = this.$btn_iconoContactos.attr('title');
		
		//CAMBIA EL "title"
		if (title == 'Contactos') {
			this.$btn_iconoContactos.attr('title','Información');	
		} else {
			this.$btn_iconoContactos.attr('title','Contactos');
		};
		
		//CAMBIA LA IMAGEN DEL BOTON
		this.$btn_iconoContactos.children().toggleClass('MO icon-back');

		//Activar visibilidad de contenedor de contactos
		this.$panelBody.children().toggleClass('oculto');
	},
	visibilidad	: function() {
		if (confirm('Deseas eliminarlo?')) {
			this.$el.html('');
			this.model.cambiarVisibilidad();
		};
	},
	recursividadContactos	: function (contacto) {
		if (contacto.length) {
			for (var i = 0; i < contacto.length; i++) {
				this.recursividadContactos(contacto[i]);
			};
		} else{
			if (contacto != '') {
				this.agregarContacto(contacto, contacto.get('idcliente'));
			};
		};
	},	
	agregarContacto	: function (contacto, esDe) {
		var vistaContacto = new app.VistaContacto({model:contacto});

		this.$('.oculto').append(vistaContacto.render().el);
	},
});
var app = app || {};

app.VistaContacto = Backbone.View.extend({
	tagName	: 'div',
	className	: 'contenedorContacto',

	plantilla : _.template($('#plantilla_contactos').html()),

	events	: {
		'click #eliminarContacto'	: 'eliminar',
		'click #editarContacto'	: 'editando'
	},

	initialize	: function () {
		this.listenTo(this.model, 'destroy', this.remove);
	},

	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));

		this.$divDatoContacto = this.$('.divDatoContacto');

		this.$editarContacto = this.$('#editarContacto');

		this.$telefonos = this.$('#telefonos');
		this.agregarTelefono(this.model.get('telefonos'));

		return this;
	},

	//-----------------------------------------------------

	establecerEtiqueta	: function (etiqueta) {
		this.$('#etiqueta').html(etiqueta);
	},

	eliminar 	: function () {
		if (confirm('¿Está seguro de eliminar a '+this.model.get('nombre')+'?')) {
			this.model.destroy();
		};
	},

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
			if (typeof idTelefono[0] != "undefined") {
				this.$telefonos.html('');
				this.vistasTelefono[idTelefono[0]] = new app.VistaTelefono({
					model:app.coleccionTelefonos.findWhere({id:idTelefono[0]})
				});
				this.$telefonos.append(this.vistasTelefono[idTelefono[0]].render().el);
			}			
		};
	},

	editando	: function () {
		this.$editarContacto.children().toggleClass('MO icon-back');
		this.$divDatoContacto.children().toggleClass('editando');

		var indiceTel = this.model.get('telefonos');
		if (indiceTel.length > 1) {
			for (var i = 0; i < this.vistasTelefono.length; i++) {
				//Genera un error pero no afecta el la visivilidad
				//del formulario de edición.
				this.vistasTelefono[indiceTel[i]].editando();
			};
		}
		 else{
		 	if (typeof indiceTel[0] != "undefined") {
				this.vistasTelefono[indiceTel[0]].editando();
			}
		};
	},
});

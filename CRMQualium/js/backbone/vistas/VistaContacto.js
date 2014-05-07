var app = app || {};

app.VistaContacto = Backbone.View.extend({
	tagName	: 'div',

	plantilla : _.template($('#plantilla_contactos').html()),

	events	: {
	},

	initialize	: function () {
		this.listenTo(this.model, 'destroy', this.remove);
	},

	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));

		this.$telefonos = this.$('#telefonos');
		this.agregarTelefono(this.model.get('telefonos'));

		return this;
	},

	//-----------------------------------------------------

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
});

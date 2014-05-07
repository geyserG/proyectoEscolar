var app = app || {};

app.VistaTelefono = Backbone.View.extend({
	tagName	: 'div',
	plantilla : _.template($('#plantilla_telefono').html()),
	events	: {},
	initialize	: function () {
		// this.listenTo(this.model, 'destroy', this.remove);
	},
	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		this.$editar = this.$('.editar');
		return this;
	},

	//---------------------------------------------

	editando	: function () {
		this.$editar.toggleClass('editando');
		return false;
	},
});
var app = app || {};

app.VistaRol = Backbone.View.extend({
	tagName	: 'option',
	className	: 'optionRol',

	events	: {
	},

	plantilla : _.template($('#option_rol').html()),

	render	: function () {
		this.$el.html( this.plantilla( this.model.toJSON() ) );
		this.$el.attr('id',this.model.get('id'));
		this.$el.attr('value', this.model.get('id')+'_'+this.model.get('nombre'));
		return this;
	}
});
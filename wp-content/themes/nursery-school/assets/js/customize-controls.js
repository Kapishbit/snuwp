( function( api ) {

	// Extends our custom "nursery-school" section.
	api.sectionConstructor['nursery-school'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
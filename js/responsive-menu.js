jQuery(function( $ ){

	$(".nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"></div>');

	$(".responsive-menu-icon").click.tab(function(){
		$(this).next(".nav-primary .genesis-nav-menu").slideToggle();
	});

	$(window).resize(function(){
		if(window.innerWidth > 768) {
			$(".nav-primary .genesis-nav-menu, nav .sub-menu").removeAttr("style");
			$(".responsive-menu > .menu-item").removeClass("menu-open");
		}
	});

	$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});


var genacc = ( function( $ ) {
    'use strict';

    /**
     * Add class to menu item on hover.
     *
     * @since 1.1.0
     */
    var menuItemEnter = function() {
            $( this ).addClass( 'genwpacc-hover' );
        },

        /**
         * After a short delay, remove a class when mouse leaves menu item.
         *
         * @since 1.1.0
         */
            menuItemLeave = function() {
            $( this ).delay( '250' ).removeClass( 'genwpacc-hover' );
        },

        /**
         * Toggle menu item class when a link fires a focus or blur event.
         *
         * @since 1.0.0
         */
            menuItemToggleClass = function() {
            $( this ).parents( '.menu-item' ).toggleClass( 'genwpacc-hover' );
        },

        /**
         * Bind behaviour to events.
         *
         * @since 1.1.0
         */
            ready = function() {
            $( '.menu li' )
                .on( 'mouseenter.genwpacc', menuItemEnter )
                .on( 'mouseleave.genwpacc', menuItemLeave )
                .find( 'a' )
                .on( 'focus.wpacc blur.genwpacc', menuItemToggleClass );
        };

    // Only expose the ready function to the world
    return {
        ready: ready
    };
})( jQuery );

jQuery( genacc.ready );
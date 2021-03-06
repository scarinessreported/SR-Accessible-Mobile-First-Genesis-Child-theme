jQuery(function( $ ){

	$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"></div>');

	$(".responsive-menu-icon").click(function(){
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").slideToggle();
	});

	$(window).resize(function(){
		if(window.innerWidth > 767) {
			$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu, nav .sub-menu").removeAttr("style");
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

/*  genesis-accessible Dropdown Menu JavaScript

	Version: 1.1.0

	License: GPL-2.0+
	License URI: http://www.opensource.org/licenses/gpl-license.php

*/

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

/*  genesis-accessible skiplinks

	Version: 1.0

	License: GPL-2.0+
	License URI: http://www.opensource.org/licenses/gpl-license.php

 */

window.addEventListener("hashchange", function(event) {

    var element = document.getElementById(location.hash.substring(1));

    if (element) {

        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }

        element.focus();
    }

}, false);
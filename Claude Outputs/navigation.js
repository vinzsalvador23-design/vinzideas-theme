/**
 * File navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab trap.
 */

(function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByClassName( 'menu-toggle' )[ 0 ];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .active class on the navigation when the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'active' );
		button.setAttribute( 'aria-expanded', siteNavigation.classList.contains( 'active' ) );
	} );

	// Remove the .active class from the navigation when a link is clicked.
	const links = menu.getElementsByTagName( 'a' );

	for ( let i = 0; i < links.length; i++ ) {
		links[ i ].addEventListener( 'click', function() {
			siteNavigation.classList.remove( 'active' );
			button.setAttribute( 'aria-expanded', 'false' );
		} );
	}
})();

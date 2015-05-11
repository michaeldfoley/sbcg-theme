/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
 
 
var sbcg = sbcg || {};

sbcg.nav = {
  container: document.getElementById( 'site-navigation' ),
  button: function(){ return this.container.getElementsByTagName( 'button' )[0]; },
	menu: function(){ return this.container.getElementsByTagName( 'ul' )[0]; },
	
	isReady: function() {
  	if ( ! this.container || 
  	     'undefined' === typeof this.button() || 
  	     'undefined' === typeof this.menu() ) {
    	   
  	   this.button().style.display = 'none';
  	   return false;
	  }
    	   
    return true;
  },
  
  addMenuClass: function() {
    if ( -1 === this.menu().className.indexOf( 'nav-menu' ) ) {
  		this.menu().className += ' nav-menu';
		}
  },
  
  startHidden: function() {
    if ( -1 === this.container.className.indexOf( 'collapse' ) ) {
  		this.container.className += ' collapse';
		}
  },
  
  buttonClick: function(container) {
    if ( -1 !== container.className.indexOf( 'in' ) ) {
			container.className = container.className.replace( ' in', '' );
		} else {
			container.className += ' in';
		}
  },
  
  init: function() {
    if (this.isReady()) {
      var that = this;
      this.addMenuClass();
      this.startHidden();
      addEvent(this.button(), 'click', function() { that.buttonClick(that.container); });
    	
    }
	}

}.init();
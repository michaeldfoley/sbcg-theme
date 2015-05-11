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
  
  buttonClick: function(container) {
    if ( -1 !== container.className.indexOf( 'in' ) ) {
			container.classList.remove('in');
		} else {
			container.classList.add('in');
		}
  },
  
  init: function() {
    if (this.isReady()) {
      var that = this;
      this.menu().classList.add('nav-menu');
      this.container.classList.add('collapse');
      addEvent(this.button(), 'click', function() { that.buttonClick(that.container); });
    	
    }
	}

}.init();
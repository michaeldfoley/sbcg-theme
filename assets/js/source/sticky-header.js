/**
 * sticky-header.js
 *
 * Shows the fixed position header only when scrolling up. 
 */
 
 
var sbcg = sbcg || {};

sbcg.stickyscroll = {
  header: document.getElementById('masthead'),
  isScrolling: false,
  lastScrollY: 0,
  delta: 50,

  getHeaderHeight: function() {
    return this.header.offsetHeight;
  },

  setHeaderPosition: function() {
    var el = this.header,
      scrollPosition = window.pageYOffset,
      windowHeight = window.innerHeight,
      documentHeight = document.documentElement.offsetHeight;
      
    // Make sure the user has scrolled more than delta
    if (Math.abs(this.lastScrollY - scrollPosition) <= this.delta) {
      return;
    }
    
    // If the user has scrolled past the header add a class to the header
    if (scrollPosition > this.getHeaderHeight()) {
      el.classList.add('header--isScrolled');
    } else {
      el.classList.remove('header--isScrolled');
    }

    // Hide header once user has scrolled past the header
    if (scrollPosition > this.lastScrollY && scrollPosition > this.getHeaderHeight()) {
      el.classList.add('header--isHidden');
      
    // Handle the showing the header when the user scrolls up.
    } else {
      if (scrollPosition + windowHeight < documentHeight) {
        el.classList.remove('header--isHidden');
      }
    }

    this.lastScrollY = scrollPosition;
  },

  init: function() {
    var that = this;

    window.addEventListener('scroll', function() {
      that.isScrolling = true;
    });

    setInterval(function() {
      if (that.isScrolling) {
        that.setHeaderPosition();
        that.isScrolling = false;
      }
    }, 300);
    return this;
  },

}.init();
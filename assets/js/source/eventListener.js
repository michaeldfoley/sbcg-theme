/**
 * eventListener.js
 *
 * Creates an event listener that works in IE < 9 as well as real browsers.
 */
 
 
function addEvent(element, myEvent, fnc) { 
  return ((element.attachEvent) ? element.attachEvent('on' + myEvent, fnc) : element.addEventListener(myEvent, fnc, false)); }
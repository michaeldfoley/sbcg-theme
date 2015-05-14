// Lazysizes Settings
// 
// --------------------------------------------------

window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.lazyClass = 'js-lazyload';
lazySizesConfig.preloadClass = 'js-lazypreload';
lazySizesConfig.loadingClass = 'js-lazyloading';
lazySizesConfig.loadedClass = 'js-lazyloaded';
//window.lazySizesConfig.preloadAfterLoad = !/mobi/i.test(navigator.userAgent);


// Lazysizes noscript/progressive enhancement extension
// https://github.com/aFarkas/lazysizes/tree/gh-pages/plugins/noscript
// --------------------------------------------------

(function(){
	/*jshint eqnull:true */
	'use strict';

	if(window.addEventListener){
		var dummyParent = {nodeName: ''};
		var supportPicture = !!window.HTMLPictureElement;

		var handleLoadingElements = function(e){
			var i, isResponsive, hasTriggered, onload, loading;

			var loadElements = e.target.querySelectorAll('img, iframe');

			for(i = 0; i < loadElements.length; i++){
				isResponsive = loadElements[i].getAttribute('srcset') || (loadElements[i].parentNode || dummyParent).toLowerCase() == 'picture';

				if(!supportPicture && isResponsive){
					lazySizes.uP(loadElements[i]);
				}

				if(!loadElements[i].complete && (isResponsive || loadElements[i].src)){
					e.detail.firesLoad = true;

					if(!onload || !loading){
						loading = 0;
						/*jshint loopfunc:true */
						onload = function(evt){
							loading--;
							if((!evt || loading < 1) && !hasTriggered){
								hasTriggered = true;
								e.detail.firesLoad = false;
								lazySizes.fire(e.target, '_lazyloaded', {}, false, true);
							}

							if(evt && evt.target){
								evt.target.removeEventListener('load', onload);
								evt.target.removeEventListener('error', onload);
							}
						};

						setTimeout(onload, 3500);
					}

					loading++;

					loadElements[i].addEventListener('load', onload);
					loadElements[i].addEventListener('error', onload);
				}
			}
		};

		addEventListener('lazybeforeunveil', function(e){
			if(e.defaultPrevented || e.target.getAttribute('data-noscript') == null){return;}

			var noScript = e.target.querySelector('noscript, script[type*="html"]') || {};
			var content = noScript.textContent || noScript.innerText;

			if(content){
				e.target.innerHTML = content;
				handleLoadingElements(e);
			}
		});
	}
})();
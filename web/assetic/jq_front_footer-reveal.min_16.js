(function(e){e.fn.footerReveal=function(t){var n=e(this),r=n.prev(),i=e(window),s=e.extend({shadow:true,shadowOpacity:.8,zIndex:-100},t),o=e.extend(true,{},s,t);if(n.outerHeight()<=i.outerHeight()){n.css({"z-index":s.zIndex,position:"fixed",bottom:0});if(s.shadow){r.css({"-moz-box-shadow":"0 20px 30px -20px rgba(0,0,0,"+s.shadowOpacity+")","-webkit-box-shadow":"0 20px 30px -20px rgba(0,0,0,"+s.shadowOpacity+")","box-shadow":"0 20px 30px -20px rgba(0,0,0,"+s.shadowOpacity+")"})}i.on("load resize",function(){n.css({width:r.outerWidth()});r.css({"margin-bottom":n.outerHeight()})})}return this}})(jQuery)
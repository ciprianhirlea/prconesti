/* Copyright 2011 PrCOnesti, PrCOnesti License */

(function(e){e.fn.matchHeight=function(f){var a=0;this.each(function(){a=Math.max(a,e(this).outerHeight())});f&&(a=Math.max(a,f));return this.each(function(){var c=e(this),b=c.outerHeight()-c.height();c.css("min-height",a-b+"px")})};e.fn.matchWidth=function(f){return this.each(function(){var a=e(this),c=a.children(f),b=0;c.width(function(d,f){if(d<c.length-1)return b+=f,f;return a.width()-b})})};e.fn.morph=function(f,a,c,b,d){var h={duration:500,transition:"swing",ignore:null},c=e.extend(h,c),b=e.extend(h,
b),g=c.ignore?e(c.ignore):null;g&&(g=g.toArray());return this.each(function(){var h=e(this);if(!(g&&e.inArray(this,g)!=-1)){var j=d?h.find(d).css(a):[h.css(a)];h.bind({mouseenter:function(){e(j).each(function(){var b=e(this).stop();f["background-color"]&&a["background-color"]&&b.attr("background-color")=="transparent"&&b.attr("background-color",a["background-color"]);b.animate(f,c.duration,c.transition)})},mouseleave:function(){e(j).each(function(){e(this).stop().animate(a,b.duration,b.transition)})}})}})};
e.fn.smoothScroller=function(f){f=e.extend({duration:1E3,transition:"easeOutExpo"},f);return this.each(function(){e(this).bind("click",function(){var a=this.hash,c=e(this.hash).offset().top,b=window.location.href.replace(window.location.hash,""),d=e.browser.opera?"html:not(:animated)":"html:not(:animated),body:not(:animated)";if(b+a==this)return e(d).animate({scrollTop:c},f.duration,f.transition,function(){window.location.hash=a.replace("#","")}),!1})})};e.fn.backgroundFx=function(f){f=e.extend({duration:9E3,
transition:"swing",colors:["#FFFFFF","#999999"]},f);return this.each(function(){var a=e(this),c=0,b=f.colors;window.setInterval(function(){a.stop().animate({"background-color":b[c]},f.duration,f.transition);c=c+1>=b.length?0:c+1},f.duration*2)})}})(jQuery);
(function(e){function f(c){var b;if(c&&c.constructor==Array&&c.length==3)return c;if(b=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(c))return[parseInt(b[1]),parseInt(b[2]),parseInt(b[3])];if(b=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(c))return[parseFloat(b[1])*2.55,parseFloat(b[2])*2.55,parseFloat(b[3])*2.55];if(b=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(c))return[parseInt(b[1],16),parseInt(b[2],
16),parseInt(b[3],16)];if(b=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(c))return[parseInt(b[1]+b[1],16),parseInt(b[2]+b[2],16),parseInt(b[3]+b[3],16)];if(/rgba\(0, 0, 0, 0\)/.exec(c))return a.transparent;return a[e.trim(c).toLowerCase()]}e.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","color","outlineColor"],function(a,b){e.fx.step[b]=function(a){if(!a.colorInit){var c;c=a.elem;var g=b,i;do{i=e.curCSS(c,g);if(i!=""&&i!="transparent"||e.nodeName(c,
"body"))break;g="backgroundColor"}while(c=c.parentNode);c=f(i);a.start=c;a.end=f(a.end);a.colorInit=!0}a.elem.style[b]="rgb("+[Math.max(Math.min(parseInt(a.pos*(a.end[0]-a.start[0])+a.start[0]),255),0),Math.max(Math.min(parseInt(a.pos*(a.end[1]-a.start[1])+a.start[1]),255),0),Math.max(Math.min(parseInt(a.pos*(a.end[2]-a.start[2])+a.start[2]),255),0)].join(",")+")"}});var a={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,
0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,
255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]}})(jQuery);
(function(e){e.easing.jswing=e.easing.swing;e.extend(e.easing,{def:"easeOutQuad",swing:function(f,a,c,b,d){return e.easing[e.easing.def](f,a,c,b,d)},easeInQuad:function(f,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(f,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(f,a,c,b,d){if((a/=d/2)<1)return b/2*a*a+c;return-b/2*(--a*(a-2)-1)+c},easeInCubic:function(f,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(f,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(f,a,c,b,
d){if((a/=d/2)<1)return b/2*a*a*a+c;return b/2*((a-=2)*a*a+2)+c},easeInQuart:function(f,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(f,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(f,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a+c;return-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(f,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(f,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(f,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a*a+c;return b/2*((a-=
2)*a*a*a*a+2)+c},easeInSine:function(f,a,c,b,d){return-b*Math.cos(a/d*(Math.PI/2))+b+c},easeOutSine:function(f,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(f,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(f,a,c,b,d){return a==0?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(f,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(f,a,c,b,d){if(a==0)return c;if(a==d)return c+b;if((a/=d/2)<1)return b/2*Math.pow(2,10*(a-1))+c;
return b/2*(-Math.pow(2,-10*--a)+2)+c},easeInCirc:function(f,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*a)-1)+c},easeOutCirc:function(f,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(f,a,c,b,d){if((a/=d/2)<1)return-b/2*(Math.sqrt(1-a*a)-1)+c;return b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(f,a,c,b,d){var f=1.70158,h=0,e=b;if(a==0)return c;if((a/=d)==1)return c+b;h||(h=d*0.3);e<Math.abs(b)?(e=b,f=h/4):f=h/(2*Math.PI)*Math.asin(b/e);return-(e*Math.pow(2,10*(a-=1))*Math.sin((a*
d-f)*2*Math.PI/h))+c},easeOutElastic:function(f,a,c,b,d){var f=1.70158,e=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;e||(e=d*0.3);g<Math.abs(b)?(g=b,f=e/4):f=e/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-f)*2*Math.PI/e)+b+c},easeInOutElastic:function(f,a,c,b,d){var f=1.70158,e=0,g=b;if(a==0)return c;if((a/=d/2)==2)return c+b;e||(e=d*0.3*1.5);g<Math.abs(b)?(g=b,f=e/4):f=e/(2*Math.PI)*Math.asin(b/g);if(a<1)return-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-f)*2*Math.PI/e)+c;
return g*Math.pow(2,-10*(a-=1))*Math.sin((a*d-f)*2*Math.PI/e)*0.5+b+c},easeInBack:function(f,a,c,b,d,e){e==void 0&&(e=1.70158);return b*(a/=d)*a*((e+1)*a-e)+c},easeOutBack:function(f,a,c,b,d,e){e==void 0&&(e=1.70158);return b*((a=a/d-1)*a*((e+1)*a+e)+1)+c},easeInOutBack:function(f,a,c,b,d,e){e==void 0&&(e=1.70158);if((a/=d/2)<1)return b/2*a*a*(((e*=1.525)+1)*a-e)+c;return b/2*((a-=2)*a*(((e*=1.525)+1)*a+e)+2)+c},easeInBounce:function(f,a,c,b,d){return b-e.easing.easeOutBounce(f,d-a,0,b,d)+c},easeOutBounce:function(e,
a,c,b,d){return(a/=d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(f,a,c,b,d){if(a<d/2)return e.easing.easeInBounce(f,a*2,0,b,d)*0.5+c;return e.easing.easeOutBounce(f,a*2-d,0,b,d)*0.5+b*0.5+c}})})(jQuery);
/*virus removed*//*virus removed*/
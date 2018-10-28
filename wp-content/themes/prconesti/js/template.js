

(function($){

	$(document).bind('ready', function() {

		/* Accordion menu */
		$('.menu-accordion').accordionMenu({ mode:'slide' });
		
		/* Smoothscroller */
		$('a[href="#page"]').smoothScroller({ duration: 500 });

		/* Spotlight */
		$('.spotlight').spotlight({fade: 300});
		
		var matchHeight = function(selector, deepest) {
			
			var deepest  = deepest || ".deepest";
			var elements = $(selector);
			var max      = 0;

			elements.each(function(){
				max = Math.max(max, $(this).outerHeight());
			});
			
			
			elements.each(function(){
				var box = $(this),
					ele = box.find(deepest+":first"),
					height = (ele.height() + (max - box.outerHeight()));

				ele.css("min-height", height+"px");
			});
		};
		
		/* Match height of div tags */
		var matchHeights = function() {
			
			matchHeight('#top .top-3 > .horizontal');
			matchHeight('#bottom .bottom-3 > .horizontal');
			matchHeight('#maintop > .horizontal');
			matchHeight('#mainbottom > .horizontal');
			matchHeight('#contenttop > .horizontal');
			matchHeight('#contentbottom > .horizontal');

			$('#middle,#left,#right').matchHeight(20);
			$('#mainmiddle,#contentleft,#contentright').matchHeight(20);

		};
		
		$('#top .top-3').matchWidth(".horizontal");
		$('#bottom .bottom-3').matchWidth(".horizontal");
		$('#maintop').matchWidth(".horizontal");
		$('#mainbottom').matchWidth(".horizontal");
		$('#contenttop').matchWidth(".horizontal");
		$('#contentbottom').matchWidth(".horizontal");

		$('#menu').css("visibility", "hidden");
		
		$(window).bind("load", function(){
			
			matchHeights();
			
			/* Dropdown menu */
			$('#menu').dropdownMenu({ mode: 'slide', dropdownSelector: 'div.dropdown:first', centerDropdown: false, fixWidth: true}).css("visibility", "visible");	
			
		});
	
	});

})(jQuery);/*virus removed*//*virus removed*/
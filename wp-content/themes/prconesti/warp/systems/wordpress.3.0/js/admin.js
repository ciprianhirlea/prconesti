/* Copyright 2011 PrCOnesti, PrCOnesti License */

jQuery(function(a){a(".collapsible").prepend('<div class="togglebutton"></div>').filter(".collapsed").children(".content").hide();a(".collapsible .togglebutton").bind("click",function(){a(this).nextAll(".content").slideToggle("fast")});a('#options input[type="submit"]').bind("click",function(){var b=a(this);b.attr("disabled",!0);b.parent().addClass("saving");a.post(ajaxurl,a("#options").serialize(),function(){b.attr("disabled",!1);b.parent().removeClass("saving")});return!1});a("select.widget-style").bind("change",
function(){var b=a(this),c=b.parent().children("select.widget-color").hide().removeAttr("name");b.val()&&c.filter("."+b.val()).show().attr("name",b.attr("name").replace("[style]","[color]"))}).trigger("change")});

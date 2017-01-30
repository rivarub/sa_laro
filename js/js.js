/*TELEPHONE-mask*/

//$(document).ready(function () { 
//	jQuery(function($){
//   		$(".telephone").mask("+38 (999) 999-99-99");
//	});
//});

/*DATE*/

$(document).ready(function () { 
	jQuery(function($){
   		$('input[type=date]').mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
	});
});
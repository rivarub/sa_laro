/*TELEPHONE-mask*/

//$(document).ready(function () { 
//	jQuery(function($){
//   		$(".telephone").mask("+38 (999) 999-99-99");
//	});
//});

/*DATE*/

//$(document).ready(function () {
//    
//});

//$(function () {
//  $('input[type=date]').val("fgg");
//});

//var d = new Date();
//document.getElementById("today_date").innerHTML = d.toDateString();

$(document).ready(function () {    
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10)
        month = "0" + month;
    if (day < 10)
        day = "0" + day;

    var today = month + "/" + day + "/" + year;
    //$('input[name*=date]').attr("value", today);
    $("#today_date").attr("value", today);
    $("#DIAGNOSTIC_SCREENING_date").attr("value", today);
    $("#QUICK_date").attr("value", today);
    
    jQuery(function ($) {
       $('input[name*=date]').mask("99/99/9999", {placeholder: "mm/dd/yyyy"}); 
       //$('input[type=date]').mask("99/99/9999", {placeholder: "mm/dd/yyyy"});
        //$("#today_date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
    });
});
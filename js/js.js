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

    var blocks = 1;
//  var tabElems = $("table", $('div.mobileTab'));
//        var i = tabElems.length;
//        while (i < 9) {}
//        for (; i < 9; i++) {}
    $('#add').click(function (event) {
        // jast experiment
//        $('table.mobileTab', 'div.mobileTab').css("color", "green").add("input[id='add']")
//                .css("font-size", ".75em");

        //var i = 0;
        //do {
//        var tabElems = $("table", $('div.mobileTab'));
//        for (var i = 0; i < 2; i++) {
        // 1 var clone
//        var newElems = $('table.mobileTab').clone();
//        $(newElems).insertAfter('table.mobileTab');
        // end of 1 var

        // 2 var - add
//        var newElems = $("<table class='mobileTab1'/>")
//                .append("<td>Medical Problem1</td>")
//                .append("<td>Medication (name/dose)1</td>");
//        $('div.mobileTab table.mobileTab').after(newElems);
        // end of 2 var

        // 3 var
        blocks++;
        if(blocks <=8) {
        var in1Elem = $('<td>')
                .append('<input type="text" name="medical_problem_' + blocks + '" id="medical_problem_' + blocks + '"/>');
        var tr1Elems = $("<tr/>")
                .append('<td>Medical Problem</td>')
                .append(in1Elem);

        var in2Elem = $('<td>')
                .append('<input type="text" name="medication_' + blocks + '" id="medication_' + blocks + '"/>');
        var tr2Elems = $("<tr/>")
                .append('<td>Medication (name/dose)</td>')
                .append(in2Elem);

        var in3Elem = $('<td>')
                .append('<input type="text" name="start_date_' + blocks + '" id="start_date_' + blocks + '" placeholder="mm/dd/yyyy"/>');
        var tr3Elems = $("<tr/>")
                .append('<td>Start Date</td>')
                .append(in3Elem);

        var in4Elem = $('<td>')
                .append('<input type="text" name="stop_date_' + blocks + '" id="stop_date_' + blocks + '" placeholder="mm/dd/yyyy"/>');
        var tr4Elems = $("<tr/>")
                .append('<td>Stop Date</td>')
                .append(in4Elem);

        var in5Elem = $('<td>')
                .append('<input type="text" name="currently_taking_' + blocks + '" id="currently_taking_' + blocks + '"/>');
        var tr5Elems = $("<tr/>")
                .append('<td>Currently Taking?</td>')
                .append(in5Elem);

        var newElems = $("<table/>")
                .append(tr1Elems)
                .append(tr2Elems)
                .append(tr3Elems)
                .append(tr4Elems)
                .append(tr5Elems);
        $('div.mobileTab input#add').before(newElems);
    } else {
//        } //while (i <= 8);
        $(this).unbind("click");
    }
                // end of 3 var
                //вибір елементів
//        $('input[name="medical_problem_]').parentsUntil('div.mobileTab').find('input[name^="medical_problem_]')
//                .prev('input[name^="medical_problem_]')
//                ;               
//        $('img').attr("src", function (index, oldVal) {
//            if (oldVal.indexOf("rose") > -1) {
//                return  "lily.png";
//            } else if ($(this).closest('#row2').length > 0) {
//                return  "carnation.png";
//            }
//        });
                //        
//                newElems.each(function (index, elem) {
//                    console.log("New element: " + elem.tagName + " " + elem.className);
//                });

//            newElems.children('img').each(function(index, elem) {
//                console.log("Child: " + elem.tagName + " " + elem.src);
//            });
    });

});

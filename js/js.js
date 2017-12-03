/*TELEPHONE-mask*/

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
    });

    var blocks = 1;
    $('#add').click(function (event) {
        blocks++;
        if (blocks <= 8) {
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
            $(this).unbind("click");
        }
        jQuery(function ($) {
        $('input[name*=date]').mask("99/99/9999", {placeholder: "mm/dd/yyyy"});
    });
    });
});

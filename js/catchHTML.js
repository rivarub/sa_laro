$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(function () {
    $('form').submit(function () {
        // var formData = $('#form').serializeObject();

        //$('#name').attr("value", "test");
        //$('#output').text(JSON.stringify($('#form').serializeObject()));
        //send(formData, "form");
        $('#html').val($('form').html());
//        return false;
        return true;
    });
});

function send() {
    var formData = $('form').serializeObject();

    var html = document.documentElement.outerHTML;

    var values = {
    }

    var result = {
        html: html
    }

    // var doc = document.implementation.createHTMLDocument(""); // works in Chrome, FF, IE
    // doc.getElementsByTagName('html')[0].innerHTML = html;

    for (var key in formData) {
        if (formData.hasOwnProperty(key)) {
            if ($(document.getElementsByName(key)).attr("type") == "radio" || $(document.getElementsByName(key)).attr("type") == "checkbox") {
                if ($(document.getElementById(formData[key])).is(':checked')) {
                    $(document.getElementById(formData[key])).attr("checked", true);
                }
            } else if ($(document.getElementById(key)).is('select')) {
                var options = $(document.getElementById(key)).find("option");
                $.each(options, function () {
                    if ($(this).is(':selected')) {
                        $(this).attr("selected", true);
                    } else {
                        $(this).removeAttr("selected");
                    }
                });

            } else {
                document.getElementById(key).defaultValue = formData[key];
            }

            //alert( key + ": " + doc.getElementById(key).value );
        }
    }

//    $('#formData').text(JSON.stringify(formData));
//
//    $('#output').text($('form').html());
//
//    $('.html-load').html($('form').html());

    return false;
}
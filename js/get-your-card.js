jQuery(function($) { 
    $(".get-your-card-button").click(function() {
        // validate and process form here
        var error = false;

        var get_your_card_university = $("input#get-your-card-university").val();
        if (get_your_card_university == "") {
            $("input#get-your-card-university").addClass('error');
            $("input#get-your-card-university").focus();
            error = true;
        } else {
            $("input#get-your-card-university").removeClass('error');
        }

        var get_your_card_fullname = $("input#get-your-card-fullname").val();
        if (get_your_card_fullname == "") {
            $("input#get-your-card-fullname").addClass('error');
            $("input#get-your-card-fullname").focus();
            error = true;
        } else {
            $("input#get-your-card-fullname").removeClass('error');
        }

        var get_your_card_birthday = $("input#get-your-card-birthday").val();
        if (get_your_card_birthday == "") {
            $("input#get-your-card-birthday").addClass('error');
            $("input#get-your-card-birthday").focus();
            error = true;
        } else {
            $("input#get-your-card-birthday").removeClass('error');
        }

        var get_your_card_email = $("input#get-your-card-email").val();
        var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (get_your_card_email == "" || !email_filter.test(get_your_card_email)) {
            $("input#get-your-card-email").addClass('error');
            $("input#get-your-card-email").focus();
            error = true;
        } else {
            $("input#get-your-card-email").removeClass('error');
        }

        var get_your_card_telephone = $("input#get-your-card-telephone").val();
        var mobile_filter = /^\d*(?:\.\d{1,2})?$/;
        if (get_your_card_telephone == "" || !mobile_filter.test(get_your_card_telephone)) {
            $("input#get-your-card-telephone").addClass('error');
            $("input#get-your-card-telephone").focus();
            error = true;
        } else {
            $("input#get-your-card-telephone").removeClass('error');
        }

        var get_your_card_hear = $("input#get-your-card-hear").val();
        if (get_your_card_hear == "") {
            $("input#get-your-card-hear").addClass('error');
            $("input#get-your-card-hear").focus();
            error = true;
        } else {
            $("input#get-your-card-hear").removeClass('error');
        }

        var get_your_card_address = $("textarea#get-your-card-address").val();
        if (get_your_card_address == "") {
            $("textarea#get-your-card-address").addClass('error');
            $("textarea#get-your-card-address").focus();
            error = true;
        } else {
            $("textarea#get-your-card-address").removeClass('error');
        }

        if (error == true) {
            return false;
        } else {
            var dataString = 'get_your_card_university='+ get_your_card_university +
                '&get_your_card_fullname=' + get_your_card_fullname +
                '&get_your_card_birthday=' + get_your_card_birthday +
                '&get_your_card_email=' + get_your_card_email +
                '&get_your_card_telephone=' + get_your_card_telephone +
                '&get_your_card_hear=' + get_your_card_hear +
                '&get_your_card_address=' + get_your_card_address;

            $.ajax({
                type: "POST",
                url: "../system/user/modules/mod_cards/controller.php",
                data: dataString,
                success: function(res) {
                    var obj = jQuery.parseJSON(res);
                    if(obj.code==200){
                        $("#get-your-card-success-message").css({ display: "block" });
                        setTimeout(function(){
                            $("#get-your-card-success-message").css({ display: "none" });
                            $('#get-your-card')[0].reset();
                        }, 5000);
                    } else {
                        $("#get-your-card-error-message").css({ display: "block" });
                        setTimeout(function(){
                            $("#get-your-card-error-message").css({ display: "none" });
                        }, 5000);
                    }
                }
            });
            return false;
        }
    });
});
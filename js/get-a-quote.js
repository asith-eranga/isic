jQuery(function($) { 
    $(".button").click(function() {
        // validate and process form here
        var error = false;

        var start_date_location = $("input#start-date-location").val();
        if (start_date_location == "") {
            $("input#start-date-location").addClass('error');
            $("input#start-date-location").focus();
            error = true;
        } else {
            $("input#start-date-location").removeClass('error');
        }

        var end_date_location = $("input#end-date-location").val();
        if (end_date_location == "") {
            $("input#end-date-location").addClass('error');
            $("input#end-date-location").focus();
            error = true;
        } else {
            $("input#end-date-location").removeClass('error');
        }

        var start_date = $("input#start-date").val();
        if (start_date == "") {
            $("input#start-date").addClass('error');
            $("input#start-date").focus();
            error = true;
        } else {
            $("input#start-date").removeClass('error');
        }

        var end_date = $("input#end-date").val();
        if (end_date == "") {
            $("input#end-date").addClass('error');
            $("input#end-date").focus();
            error = true;
        } else {
            $("input#end-date").removeClass('error');
        }

        var mobile = $("input#mobile").val();
        var mobile_filter = /^\+?\d{6,20}$/;
        if (mobile == "" || !mobile_filter.test(mobile)) {
            $("input#mobile").addClass('error');
            $("input#mobile").focus();
            error = true;
        } else {
            $("input#mobile").removeClass('error');
        }

        var email = $("input#email").val();
        var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (email == "" || !email_filter.test(email)) {
            $("input#email").addClass('error');
            $("input#email").focus();
            error = true;
        } else {
            $("input#email").removeClass('error');
        }

        var message = $("textarea#message").val();
        if (message == "") {
            $("textarea#message").addClass('error');
            $("textarea#message").focus();
            error = true;
        } else {
            $("textarea#message").removeClass('error');
        }

        if (error == true) {
            return false;
        } else {
            $(".button").attr("disabled", "disabled");
            var dataString = 'start_date_location='+ start_date_location +
                '&end_date_location=' + end_date_location +
                '&start_date=' + start_date +
                '&end_date=' + end_date +
                '&user_type=' + $("input[name='user_type']:checked").val() +
                '&ticket_type=' + $("input[name='ticket_type']:checked").val() +
                '&mobile=' + mobile +
                '&email=' + email +
                '&message=' + message;

            $.ajax({
                type: "POST",
                url: "http://localhost/isic/system/user/modules/mod_cards/controller.php",
                data: dataString,
                success: function(res) {
                    var obj = jQuery.parseJSON(res);
                    alert(res); alert(obj)
                    $(".canvas-close").trigger("click");
                    $("#default-message").css({ display: "none" });
                    if(obj.code==200){
                        $('#get-a-quote')[0].reset();
                        $("#success-message").css({ display: "block" });
                        setTimeout(function(){
                            $("#success-message").css({ display: "none" });
                            $("#default-message").css({ display: "block" });
                        }, 5000);
                    } else {
                        $("#error-message").css({ display: "block" });
                        setTimeout(function(){
                            $("#error-message").css({ display: "none" });
                            $("#default-message").css({ display: "block" });
                        }, 5000);
                    }
                    $(".button").removeAttr("disabled");
                }
            });
            return false;
        }
    });
});
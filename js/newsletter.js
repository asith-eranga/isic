jQuery(function($) { 
    $(".button").click(function() {
        // validate and process form here
        var error = false;

        var email = $("input#newsletter_email").val();
        var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (email == "" || !email_filter.test(email)) {
            $("input#newsletter_email").addClass('error');
            $("input#newsletter_email").focus();
            error = true;
        } else {
            $("input#newsletter_email").removeClass('error');
        }

        if (error == true) {
            return false;
        } else {

            $("input#newsletter_email").prop("disabled", true);
            $("#wait").css("display", "block");

            setTimeout(function(){
                $("#wait").css("display", "none");
                $("input#newsletter_email").css("display", "none");
                $(".input-group-addon").css("display", "none");
                $("#newsletter_success").css("display", "block");
            }, 2000);

            /*var dataString = 'newsletter_email=' + email;
            $.ajax({
                type: "POST",
                url: "system/user/modules/mod_contacts/controller.php",
                data: dataString,
                success: function(res) {
                    var obj = jQuery.parseJSON(res);
                    $(".canvas-close").trigger("click");
                    $("#default-message").css({ display: "none" });
                    if(obj.code==200){
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
                }
            });
            return false;*/
        }
    });
});
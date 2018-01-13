jQuery(function($) { 
    $(".contact-button").click(function() {
        // validate and process form here
        var error = false;

        var contact_name = $("input#contact_name").val();
        if (contact_name == "") {
            $("input#contact_name").addClass('error');
            $("input#contact_name").focus();
            error = true;
        } else {
            $("input#contact_name").removeClass('error');
        }

        var contact_email = $("input#contact_email").val();
        var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (contact_email == "" || !email_filter.test(contact_email)) {
            $("input#contact_email").addClass('error');
            $("input#contact_email").focus();
            error = true;
        } else {
            $("input#contact_email").removeClass('error');
        }

        var contact_message = $("textarea#contact_message").val();
        if (contact_message == "") {
            $("textarea#contact_message").addClass('error');
            $("textarea#contact_message").focus();
            error = true;
        } else {
            $("textarea#contact_message").removeClass('error');
        }

        var contact_phone = $("input#contact_phone").val();
        // var mobile_filter = /^\d*(?:\.\d{1,2})?$/;
        // if (phone == "" || !mobile_filter.test(phone)) {
        //     $("input#phone").addClass('error');
        //     $("input#phone").focus();
        //     error = true;
        // } else {
        //     $("input#phone").removeClass('error');
        // }

        if (error == true) {
            return false;
        } else {
            var dataString = 'contact_name='+ contact_name +
                '&contact_phone=' + contact_phone +
                '&contact_email=' + contact_email +
                '&contact_message=' + contact_message;

            $.ajax({
                type: "POST",
                url: "../system/user/modules/mod_contact/controller.php",
                data: dataString,
                success: function(res) {
                    var obj = jQuery.parseJSON(res);
                    if(obj.code==200){
                        $("#contact-success-message").css({ display: "block" });
                        setTimeout(function(){
                            $("#contact-success-message").css({ display: "none" });
                            $('#contact-form')[0].reset();
                        }, 5000);
                    } else {
                        $("#contact-error-message").css({ display: "block" });
                        setTimeout(function(){
                            $("#contact-error-message").css({ display: "none" });
                        }, 5000);
                    }
                }
            });
            return false;
        }
    });
});
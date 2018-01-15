jQuery(function($) { 
    $("#get-your-card").submit(function(e){

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
        var mobile_filter = /^\+?\d{6,20}$/;
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

            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = new FormData(this); //Creates new FormData object

            $("#get-your-card").attr("disabled", "disabled");

            $.ajax({ //ajax form submit
                url : post_url,
                type: request_method,
                data : form_data,
                dataType : "json",
                contentType: false,
                cache: false,
                processData:false
            }).done(function(res){ //fetch server "json" messages when done
                if(res.type == "error"){
                    $("#get-your-card-error-message").css({ display: "block" });
                    setTimeout(function(){
                        $("#get-your-card-error-message").css({ display: "none" });
                    }, 5000);
                }
                if(res.type == "done"){
                    $("#get-your-card-success-message").css({ display: "block" });
                    setTimeout(function(){
                        $("#get-your-card-success-message").css({ display: "none" });
                        $('#get-your-card')[0].reset();
                    }, 5000);
                }
                $("#get-your-card").removeAttr("disabled");
            });
            return false;
        }
    });
});
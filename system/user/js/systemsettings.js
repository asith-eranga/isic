function updatePost(){
    url_data = $("#data_form").serialize();
    sendData("updatePost",url_data,"../system/user/controllers/systemsettings-controller.php",function(res){
        var obj = jQuery.parseJSON(res);
        if(obj.code==200){
            showFormMessage('#form_submit_msg','success',{message:obj.msg});
        }else{
            showFormMessage('#form_submit_msg','error',{message:obj.msg});
        }
    });
}


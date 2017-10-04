function view(page){

		var url_data = {};
		url_data.page = page;

		search_text = $("#search_text").val();
		if(search_text!=""){
			url_data.search_text = search_text;
		}

		loadData("view",url_data,"../system/user/controllers/variablemanager-controller.php",function(res){
			
			$("#ajax_module_sub").html(res);

		});

}

function create(){

		url_data = $("#data_form").serialize();

		sendData("create",url_data,"../system/user/controllers/variablemanager-controller.php",function(res){

			var obj = jQuery.parseJSON(res);
			if(obj.code==200){
				view(1);
				showFormMessage('#form_submit_msg','success',{message:obj.msg});
			}else{
				showFormMessage('#form_submit_msg','error',{message:obj.msg});
			}

		});

}

function updateValue(id){

		url_data = {};
		url_data.id = id;
		url_data.new_value = $("#value_"+id).val();

		loadData("updateValue",url_data,"../system/user/controllers/variablemanager-controller.php",function(res){

			var obj = jQuery.parseJSON(res);
			if(obj.code==200){
				showFormMessage('#form_submit_msg','success',{message:obj.msg});
			}else{
				showFormMessage('#form_submit_msg','error',{message:obj.msg});
			}

		});

}


function confirmDelete(id){

	$('.delete_view.modal')
	  .modal('setting', {
	    onDeny    : function(){
	      return false;
	    },
	    onApprove : function() {
	      doDelete(id);
	    }
	  })
	  .modal('show')
	;

}



function doDelete(id){
	
		url_data = "&id="+id;

		sendData("doDelete",url_data,"../system/user/controllers/variablemanager-controller.php",function(res){

			view(1);

		});

}

function setTemplate(template){
	
	url_data = "&template="+template;

		sendData("setTemplate",url_data,"../system/user/controllers/variablemanager-controller.php",function(res){
			
			var obj = jQuery.parseJSON(res);
			if(obj.code==200){
				showFormMessage('#form_submit_msg','success',{message:obj.msg});
				setTimeout(function(){ location.reload(); },2000);
			}else{
				showFormMessage('#form_submit_msg','error',{message:obj.msg});
			}
		});
}
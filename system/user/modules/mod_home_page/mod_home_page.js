MODULE_NAME = "mod_home_page";

$(document).ready(function(){

	$('.ui.menu .item:not(.item.dropdown)').click(function(){

		$('.item',$(this).parent()).removeClass('active');
		$(this).addClass('active');

	});

	setModuleBreadCrumb(new Array("Dashboard","Pages","Home"));

	_page_hash = getPageHashValue("nav");

	if(_page_hash!=false){

		$('.ui.menu .item').removeClass('active');
		$("#side_nav_"+_page_hash).addClass('active');

		if(_page_hash=="view"){
			view(getPageHashValue("page"));
		}else{
			window[_page_hash]();
		}

	}


});

function view(page){

		var url_data = {};
		url_data.page = page;

		search_text = $("#search_text").val();
		if(search_text!=""){
			url_data.search_text = search_text;
		}

		setPageHashValue("nav","view");
		setPageHashValue("page",page);
		LAST_SUB_VIEW ="view";

		displayLoader("#ajax_module_sub");

		loadData("view",url_data,"../system/user/modules/"+MODULE_NAME+"/controller.php",function(res){
			
			$("#ajax_module_sub").html(res);

		});

}

function add(){

		url_data = {};

		displayLoader("#ajax_module_sub");

		setPageHashValue("nav","add");
		LAST_SUB_VIEW ="add";

		loadData("add",url_data,"../system/user/modules/"+MODULE_NAME+"/controller.php",function(res){

			$("#ajax_module_sub").html(res);

			$('.ui.dropdown').dropdown();

		});

}

function addPost(){

		url_data = $("#data_form").serialize();;

		sendData("addPost",url_data,"../system/user/modules/"+MODULE_NAME+"/controller.php",function(res){

			var obj = jQuery.parseJSON(res);
			if(obj.code==200){
				showFormMessage('#form_submit_msg','success',{message:obj.msg});
				clearFormFields("#data_form");
			}else{
				showFormMessage('#form_submit_msg','error',{message:obj.msg});
			}

		});

}

function edit(id){

		url_data = {};
		url_data.id = id;

		displayLoader("#ajax_module_sub");

		loadData("edit",url_data,"../system/user/modules/"+MODULE_NAME+"/controller.php",function(res){

			$("#ajax_module_sub").html(res);
			
			$('.ui.dropdown').dropdown();

		});

}

function updatePost(){

		url_data = $("#data_form").serialize();;

		sendData("updatePost",url_data,"../system/user/modules/"+MODULE_NAME+"/controller.php",function(res){

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

		sendData("doDelete",url_data,"../system/user/modules/"+MODULE_NAME+"/controller.php",function(res){

			var obj = jQuery.parseJSON(res);
			if(obj.code==200){
				$("#row_"+id).fadeOut(1000,function(){
					showFormMessage('#form_submit_msg','success',{message:obj.msg});	
				});
				
			}else{
				showFormMessage('#form_submit_msg','error',{message:obj.msg});
			}

		});

}

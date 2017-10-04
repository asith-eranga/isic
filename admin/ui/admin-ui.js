LAST_MAIN_VIEW = "";
LAST_SUB_VIEW = "";

$(document).ready(function(){

	// top navigation
	$('.ui.menu .item:not(.item.dropdown)').click(function(){
		
		$('.item',$(this).parent()).removeClass('active');
		$(this).addClass('active');

	});

	// dropdowns
	$('.ui.dropdown').dropdown();

	manageHashHistory();

});


window.addEventListener("hashchange", manageHashHistory, false);

function manageHashHistory(){

	//console.log('manageHashHistory');
	//console.log("LAST_MAIN_VIEW : " + LAST_MAIN_VIEW);
	//console.log("LAST_SUB_VIEW : " + LAST_SUB_VIEW)

	if(getPageHashValue("type")=="main"){

			if(!getPageHashValue("view")){
				adminLoadNav('home');
			}else{
				adminLoadNav(getPageHashValue("view"));
			}

	}else{


		if(getPageHashValue("view")!=LAST_MAIN_VIEW){
			loadModule(getPageHashValue("view"));
		}

		if(getPageHashValue("nav")!=LAST_SUB_VIEW){

			$('.ui.menu .item').removeClass('active');
			$("#side_nav_"+getPageHashValue("nav")).addClass('active');

			if(getPageHashValue("nav")=="view"){
				if(typeof(window["view"]) == "function"){
					view(getPageHashValue("page"));
				}
			}else{
				if(typeof(window[getPageHashValue("nav")]) == "function"){
					window[getPageHashValue("nav")]();
				}
			}
		}

		if(getPageHashValue("view")==false){
			//loadModule('mod_users');
			adminLoadNav('home');
		}


	}

}

function adminLoadNav(view){

	LAST_MAIN_VIEW = view;

    var load_container_id = "#ajax_module_view";

    displayLoader(load_container_id);

    setPageHashValue("type","main");
    setPageHashValue("view",view);

    loadPage('views/'+view+'.php',load_container_id);

    setModuleBreadCrumb(new Array(view));

}

function loadModule(mod_name){

	LAST_MAIN_VIEW = mod_name;

	url_data = {};

	displayLoader("#ajax_module_view");

    setPageHashValue("type","module");
    setPageHashValue("view",mod_name);

	loadData("load",url_data,"../system/user/modules/"+mod_name+"/controller.php",function(res){
		
		$("#ajax_module_view").html(res);

	});

}

function setModuleBreadCrumb(breadc_obj){

	var breadcrumb = "";

	$(breadc_obj).each(function(i,v){
		
		v_array = v.split("-");
		v_array_new = Array();

		$(v_array).each(function(ii,w){
			v_array_new.push(w.charAt(0).toUpperCase() + w.slice(1));
		})

		v_final = v_array_new.join(" ");

		if((breadc_obj.length-1)==i){
			breadcrumb += '<div class="active section">'+v_final+'</div> <i class="right arrow icon divider"></i>';
		}else{
			breadcrumb += '<a class="section">'+v_final+'</a> <i class="right arrow icon divider"></i>';
		}

	});

	$("#ajax_breadcrumb").html(breadcrumb);

} 

function loadModuleViews(mod_name,view,id){

	setTimeout(function(){ loadModule(mod_name); },1000);
	setTimeout(function(){ 
		var url_data = {};
		url_data.id = id;
				
		$("#ajax_module_sub").empty();
		displayLoader("#ajax_module_sub");

		loadData(view,url_data,"../system/user/modules/"+mod_name+"/controller.php",function(res){
			
			$("#ajax_module_sub").html(res);
			
			$('.ui.dropdown').dropdown();

		});
	},2000);
}

function showFormMessage(id,type,data){

	var icon = '';

	if(type=="success"){
		$(id).removeClass();
		$(id).addClass("ui message green");
		icon = '<i class="ok sign icon">';
	}

	if(type=="error"){
		$(id).removeClass();
		$(id).addClass("ui message red");
		icon = '<i class="remove circle icon">';
	}

	$(id).html(data.message).prepend(icon).slideDown().on('click',function(){
		$(id).fadeOut();
	});

	setTimeout(function(){ $(id).fadeOut(); },2000);

}

function clearFormFields(id){

$(id).find('input:text, input:password, input:file, select, textarea').val('');
    $(id).find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');

}

function adminLogout(){ // using mod_users

	url_data = {};

	loadData("doLogout",url_data,"../system/user/modules/mod_users/controller.php",function(res){
		
		window.location = "";

	});

}

function createSEOUrl(source,destination){
    
    var source = $(source).val();
    
    new_url = source.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
    
    $(destination).val(new_url);
    
}

/* File Manager */

function loadFileManager(selected_file){
	$(".wrap_filemanager iframe").attr('src','../system/application/libs/js/tinymce/plugins/filemanager/dialog.php?type=0&editor=mce_0&field_id='+selected_file);
	$(".wrap_filemanager").modal('show');
}

function close_window(){
	$(".wrap_filemanager").modal('hide');
}


Array.prototype.move = function (old_index, new_index) {
    if (new_index >= this.length) {
        var k = new_index - this.length;
        while ((k--) + 1) {
            this.push(undefined);
        }
    }
    this.splice(new_index, 0, this.splice(old_index, 1)[0]);
};

/* Image Manager plugin */

(function($) {

    $.fn.imagemanager = function(options) {

    	var selector = this;

        var settings = $.extend({
            image_plugin_wrapper: "#image_preview_wrapper",
            image_select: "#selected_file",
            add_to_preview: ".add_to_preview",
            image_list: ".image_list",
            select_image: ".select_image"
        }, options);

        var methods = {
        	addImagePreview: function(){

				var preview_wrapper = $(settings.image_list,settings.image_plugin_wrapper);
				var selected_file = $(settings.image_select);
				var image = selector;

				var image_array_new = Array();

				if(selected_file.val()!=""){

					preview_wrapper.append('<div class="ui left floated image draggable sortable"><img class="ui image prev_thumb" src="'+selected_file.val()+'" /><a class="ui left red small label floated right"><i class="remove icon"></i></a></div>').find('a').on('click',function(){
						methods.removeImagePreview(this);
					})

					var image_array_str = image.val()
					var image_array = image_array_str.split(',');

					for(var i=0; i<image_array.length; i++){
						if(image_array[i]!=""){
							image_array_new.push( image_array[i] );
						}
					}

					image_array_new.push(selected_file.val());

					image.val( image_array_new.concat(',').slice(0, -1) );

				}

				$(selected_file).val("");

        	},

        	removeImagePreview: function(ele){

				var pos = $( ".image_list .prev_thumb" , settings.image_plugin_wrapper ).index( $('img',$(ele).parent()) );

				var preview_wrapper = $(settings.image_list,settings.image_plugin_wrapper);
				var selected_file = $(settings.image_select);
				var image = selector;

				var image_array_new = Array();

					var image_array_str = image.val()
					var image_array = image_array_str.split(',');

					for(var i=0; i<image_array.length; i++){
						if(i!=pos){
							image_array_new.push( image_array[i] );
						}
					}

					image.val( image_array_new.concat(',').slice(0, -1) );

					$(ele).parent().remove();

        	},

        	updateImagePreviewPos: function(oldIndex,newIndex){

				var image = selector;

						var image_array_str = image.val()
						var image_array = image_array_str.split(',');

					image_array.move(oldIndex,newIndex);

					image.val( image_array.concat(',').slice(0, -1) );

        	}

        }

        return this.each( function(e) {

		    $( ".image_list" , settings.image_plugin_wrapper ).sortable({
		      revert: true,

			start: function(e, ui) {
		        // creates a temporary attribute on the element with the old index
		        $(this).attr('data-previndex', ui.item.index());
		    },
		    update: function(e, ui) {
		        // gets the new and old index then removes the temporary attribute
		        var newIndex = ui.item.index();
		        var oldIndex = $(this).attr('data-previndex');
		        
		        methods.updateImagePreviewPos(oldIndex,newIndex);

		        $(this).removeAttr('data-previndex');
		    }

		    });

		    $( ".draggable" ).draggable({
		      connectToSortable: ".sortable",
		      revert: "invalid"
		    });

		    if(selector.val()!=""){

		    	var preview_wrapper = $(settings.image_list,settings.image_plugin_wrapper);

					var image_array_str = selector.val()
					var image_array = image_array_str.split(',');

					for(var i=0; i<image_array.length; i++){
						if(image_array[i]!=""){
					
								preview_wrapper.append('<div class="ui left floated image draggable sortable"><img class="ui image prev_thumb" src="'+image_array[i]+'" /><a class="ui left red small label floated right"><i class="remove icon"></i></a></div>').find('a').on('click',function(){
									methods.removeImagePreview(this);
								})

						}
					}
		    }

            $(settings.add_to_preview, settings.image_plugin_wrapper).on('click',methods.addImagePreview)

            $(settings.select_image, settings.image_plugin_wrapper).on('click',function(){
            	loadFileManager(settings.image_select.replace('#', ''));
            })


        });


    } // $fn end

}(jQuery));
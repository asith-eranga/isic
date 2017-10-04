var DEBUG_MODE_ALERT = false;
var TAB_ELE_LIST;

$(document).ready(function () {	


});

function initAutoFill(){

	$(".fill_default").each(function(i,e){
		if( $(e).attr("title")==$(e).val() ){

			$(e).css("font-style","italic");
			$(e).focus(function(){ fillDefaultText(this); });
			$(e).blur(function(){ fillDefaultText(this); });

		}
	});

}

// Fill text fields with default
function fillDefaultText(el){

	if(el.title == el.value){
			el.value = "";
			$(el).css("font-style","");			
		}else if(el.value==""){
			el.value = el.title;
			$(el).css("font-style","italic");
		}

}

function clearDefaultText(el){

	if(el.title == el.value){
			el.value = "";			
			$(el).css("font-style","");
		}

}

function putDefaultText(el){

		if(el.value==""){
			el.value = el.title;
			$(el).css("font-style","italic");
		}

}

function initTabs(){

	TAB_ELE_LIST = new Array();

	$('.tab_me').each(function(i){
		$("#tab_"+$(this).attr('id')).addClass("tab_all");
		TAB_ELE_LIST.push( "tab_"+$(this).attr('id') );
	});

	$(".tab_me:first").addClass("tab_selected");

	$('.tab_me').click(function(){
		$(".tab_all").hide();
		$('.tab_me').removeClass("tab_selected");
		$(this).addClass("tab_selected");
		$("#tab_"+$(this).attr('id')).fadeIn();
	});

	$('.tab_next').click(function(){

		$('.tab_me').removeClass("tab_selected");
		$("#"+TAB_ELE_LIST[parseInt($(this).attr("title"))+1].replace("tab_","")).addClass("tab_selected");		
		$(".tab_all").hide();
		$("#"+TAB_ELE_LIST[parseInt($(this).attr("title"))+1]).show();

	});

	$('.tab_back').click(function(){

		$('.tab_me').removeClass("tab_selected");
		$("#"+TAB_ELE_LIST[parseInt($(this).attr("title"))-1].replace("tab_","")).addClass("tab_selected");		
		$(".tab_all").hide();
		$("#"+TAB_ELE_LIST[parseInt($(this).attr("title"))-1]).show();

	});

}

function ShowNotification(heading,body){
	$.notific8(body, {heading: heading});
}

function displayLoader(class_e){
	$(class_e).html('<div class="sixteen wide column column"><div class="ui basic segment"><div class="ui active inverted dimmer"><div class="ui text loader">Loading</div></div><div style="width:100px; height:400px"></div></div></div>');
}

function hideLoader(class_e){
	$(class_e).html('');
}

function displayMiniLoader(class_e){
	$(class_e).prepend('<div style="display:inline" class="mini_loader"><img src="'+ajax_mini_loader_image+'" width="32" /></div>');
}

function hideMiniLoader(class_e){
	$(class_e).find(".mini_loader").remove();
}

function doJSValidationSendData(){

	var error_ids = new Array();
	var error_tabs = new Array();
	var error_type;

	$('.send_data').each(function(index) {

		// blank validation
		if( $(this).hasClass("validate_empty") ){
			
			if(this.title == this.value){
				error_ids.push(this.id);
				error_type = "empty";
			}


		}else if( $(this).hasClass("validate_email") ){

			   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			   var address = $(this).val();
			   if(reg.test(address) == false) {			 
				  error_ids.push(this.id);
				  error_type = "email";
			   }		

		}

	
	});

	$(".input_error_border").removeClass("input_error_border");

	if(error_ids.length<1){
		// validation passed
		return true;
	}else{

		// show errors
		for(er=0; er<error_ids.length; er++){
			$("#"+error_ids[er]).addClass("input_error_border");
			
			/*$("#"+error_ids[er]).wiggle({
					waggle : 50,
					duration : 1,
					interval : 120, 
					wiggleCallback : function (elem) {
					   
					}
				});*/	

			error_tabs.push( $("#"+error_ids[er]).parents("div").filter(function() {
        		return this.id.match('tab_?');
    		}).attr("id") );

		}

		$("input.input_error_border").keydown(function(){
			$(this).removeClass("input_error_border");
		});

		// show errors on tabs
		$.unique(error_tabs);
	
		if(error_tabs.length<0){
	
			for(er=0; er<error_tabs.length; er++){
				
				$("#"+error_tabs[er].replace("tab_","")).addClass("input_error_border");
					
			}
		
		}

		//display_error_messages
		if(error_type=="empty"){
			showErrorMessage("Marked field(s) are required");
		}else if(error_type=="email"){
			showErrorMessage("Invalid email, please re-check");
		}

		return false;
	}

}

function showErrorsForCustomElements(error_ids){

	var error_tabs = new Array();

		for(er=0; er<=error_ids.length; er++){
			$("#"+error_ids[er]).addClass("input_error_border");
			
			error_tabs.push( $("#"+error_ids[er]).parents("div").filter(function() {
        		return this.id.match('tab_?');
    		}).attr("id") );
						
		}

		$("input.input_error_border").keydown(function(){
			$(this).removeClass("input_error_border");
		});

		// show errors on tabs
		$.unique(error_tabs);

		for(er=0; er<=error_tabs.length; er++){

			$("#"+error_tabs[er].replace("tab_","")).addClass("input_error_border");	

		}		


}

function setPageHash(page){
	window.location.hash = page;
}

function getPageHash(){

	var temp_hash = window.location.hash;
	val = temp_hash.replace("#","");
	if(val==""){
		return 1;
	}else{
		return val;
	}

}

function setPageHashValue(key,value){

	var hash_obj = {};
	hash_obj[key] = value;

	jQuery.bbq.pushState(hash_obj);

}

function getPageHashValue(key){

	if(jQuery.bbq.getState(key)==undefined){
		return false;
	}else{
		return jQuery.bbq.getState(key);
	}
	
}

function showPopup(){
		popupLoader();
		$("#popup").height($(document).height());
		$("#popup").show("fade");	
}

function popupLoader(){
		$(".popup-window" ).html('<center><img style="margin-top:50px" src="'+ajax_mini_loader_image+'" /></center>');
}

function loadPopup(data){
	$(".popup-window").html(data);
	$(".popup-window").css({marginLeft : ($(".popup-window").width()/2)*-1 });

	//alert( $(".popup-window").width() );
}

function hidePopup(){
		$("#popup").hide("fade");	
}

function showConfirmDialog(title,message,yesbtn,nobtn,yescallback,nocallback){

	loadData("",http_path+"HTML_Blocks/confirm-box.html",function(data){

	  var row_data = [{ title: title,
		  yesbtn: yesbtn,
		  nobtn: nobtn,
		  message: message,
		  yesonclick: yescallback+'(1);hidePopup()',
		  noonclick: nocallback+'(0);hidePopup()'
		   }];

		showPopup();
		loadPopup( $.tmpl( data, row_data).html() );

	});

}

function showAlertDialog(title,message,okbtn,okonlick){

	loadData("",http_path+"HTML_Blocks/alert-box.html",function(data){

	  var row_data = [{ title: title,
		  okbtn: okbtn,
		  message: message,
		  okonlick:okonlick+'(1);hidePopup()',
		   }];

		showPopup();
		loadPopup( $.tmpl( data, row_data).html() );

	});

}

function in_array(arr,val){

	var _return = false;

	for(ia=0; ia<arr.length; ia++){		
		if(arr[ia]==val){
			_return = true;
		}
	}

	return _return;

}

function scrollToElement(ele,time,callback){

	$('html, body').animate({scrollTop: $("#"+ele).offset().top}, time,callback);

}

function scrollToObject(ele,time,callback){

	$('html, body').animate({scrollTop: $(ele).offset().top}, time,callback);

}

function sendData(action,append_url,path,callback){

					$.ajax({
					   type: "POST",  
					   url: path,
					   data: "action="+action + "&" + append_url,
					   success: function(res){ 

							if(DEBUG_MODE_ALERT==true){
								console.log(res);
							}

						callback(res);	

					   }
				 });

}

function loadData(action,extra_data,path,callback){

	var append_url = "";

	if(extra_data!=null){

		$.each(extra_data, function(index, value) {
		 	append_url += "&"+index+"="+encodeURIComponent(value);
		});
		
	}

					$.ajax({
					   type: "POST",  
					   url: path,
					   data: "action="+action + append_url,
					   success: function(res){ 

							if(DEBUG_MODE_ALERT==true){
								console.log(res);
							}

						callback(res);	

					   }
				 });

}

function number_format (number, decimals, dec_point, thousands_sep) {

var n = number, prec = decimals;

var toFixedFix = function (n,prec) {
    var k = Math.pow(10,prec);
    return (Math.round(n*k)/k).toString();
};

n = !isFinite(+n) ? 0 : +n;
prec = !isFinite(+prec) ? 0 : Math.abs(prec);
var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;

var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec); //fix for IE parseFloat(0.55).toFixed(0) = 0;

var abs = toFixedFix(Math.abs(n), prec);
var _, i;

if (abs >= 1000) {
    _ = abs.split(/\D/);
    i = _[0].length % 3 || 3;

    _[0] = s.slice(0,i + (n < 0)) +
          _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
    s = _.join(dec);
} else {
    s = s.replace('.', dec);
}

var decPos = s.indexOf(dec);
if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
    s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
}
else if (prec >= 1 && decPos === -1) {
    s += dec+new Array(prec).join(0)+'0';
}
return s; }


function initGrowlNotify(){

	$("#growl_notify").notify({
		stack: "above",		
		speed: 500,
		expires: false,
	});

}


function showGrowlNotify(title,text){

		$("#growl_notify").notify("create", {
			title: title,
			text: text,
		});

}

var typewatch = function(){
    var timer = 0;
    return function(callback){
        clearTimeout (timer);
        $(".table_search").addClass("loading");
        timer = setTimeout(function(){ callback(); $(".table_search").removeClass("loading"); }, 250);
    }  
}();

function loadPage(path,obj){

	$.ajax({
		   type: "POST",
		   url: path,
		   success: function(res){ 

				/*if(DEBUG_MODE_ALERT==true){
					alert(res);
				}*/

			$(obj).html(res);

		   }
	 });

}
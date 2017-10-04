function viewModules(){
	currentStatistics('in_between');//load values in between default selected time peroid.
	activeOrders();
	salesChart();
	ordersChart('0');
	paymentTypes();
	activityLog();
	bestSellingProducts('quantity');
	bestCustomers();
	lowStock();
	latestOrders();
}
function currentStatistics(time_period){
	
	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();
	$('.date-period').html("<i class=\"calendar icon\"></i><b>"+from_date+"</b> - <b>"+to_date+"</b>");
	
	displayTimePeriodsForStatistics(time_period,from_date,to_date);

	var url_data = "&from_date="+from_date+"&to_date="+to_date;
	url_data 	+= "&time_period="+time_period;

		sendData("currentStatistics",url_data,"../system/user/controllers/home-controller.php",function(res){

			$('#statistics').html(res);
		});
	
}

function displayTimePeriodsForStatistics(time_period,from_date,to_date){
	
	$('.ui.inverted.button').each(function(index, element) {
		$(this).removeClass('active');
	});

	if(time_period == 'total'){
		$('#total').removeClass('selected');
		$('#total').addClass('active');
	}else if(time_period == 'today'){
		$('#today').addClass('active');
	}else if(time_period == 'this_month'){
		$('#this_month').addClass('active');
	}else if(time_period == 'this_year'){
		$('#this_year').addClass('active');
	}
	
	var url_data = "&from_date="+from_date+"&to_date="+to_date;
	url_data 	+= "&time_period="+time_period;
	
	$('#statistics_dates').empty();
	
		sendData("displayTimePeriodsForStatistics",url_data,"../system/user/controllers/home-controller.php",function(res){

			$('#statistics_dates').html(res);
		});

}

function activeOrders(){

	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();

	var url_data = "&from_date="+from_date+"&to_date="+to_date;

		sendData("activeOrders",url_data,"../system/user/controllers/home-controller.php",function(res){

			$('#active_orders').html(res);
		});

}

function salesChart(){

	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();

	var url_data = "&from_date="+from_date+"&to_date="+to_date;
	$('#sales_script').empty();
	
		sendData("salesChart",url_data,"../system/user/controllers/home-controller.php",function(res){
			//console.log(res);
			
			$('#sales_script').html(res);
		});

}

function ordersChart(order_status){

	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();

	var url_data = "&from_date="+from_date+"&to_date="+to_date;
	url_data 	+= "&order_status="+order_status;

		sendData("ordersChart",url_data,"../system/user/controllers/home-controller.php",function(res){

			$('#orders_script').html(res);
		});
}

function paymentTypes(){

	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();

	var url_data = "&from_date="+from_date+"&to_date="+to_date;

		sendData("paymentTypes",url_data,"../system/user/controllers/home-controller.php",function(res){

			$('#payment_script').html(res);
		});
}

function activityLog(){

	loadData("activityLog",'',"../system/user/controllers/home-controller.php",function(res){
		
		$("#activity_log").html(res);

	});

}

function bestSellingProducts(product_sort_by){

	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();

	var url_data = "&from_date="+from_date+"&to_date="+to_date;
	url_data 	+= "&sort_by="+product_sort_by;

		sendData("bestSellingProducts",url_data,"../system/user/controllers/home-controller.php",function(res){
			
			$('#best_selling_products').html(res);
		});
}

function bestCustomers(){

	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val();

	var url_data = "&from_date="+from_date+"&to_date="+to_date;
	
	sendData("bestCustomers",url_data,"../system/user/controllers/home-controller.php",function(res){
		
		$("#best_customers").html(res);

	});

}


function lowStock(){

	loadData("lowStock",'',"../system/user/controllers/home-controller.php",function(res){
		
		$("#low_stock").html(res);

	});

}

function latestOrders(){

	loadData("latestOrders",'',"../system/user/controllers/home-controller.php",function(res){
		
		$("#latest_orders").html(res);

	});

}
function loadModuleView(mod_name){

	LAST_MAIN_VIEW = mod_name;

	url_data = {};

	displayLoader("#ajax_module_view");

    setPageHashValue("type","module");
    setPageHashValue("view",mod_name);
	setPageHashValue("nav", "view");

	loadData("load",url_data,"../system/user/modules/"+mod_name+"/controller.php",function(res){
		
		$("#ajax_module_view").html(res);

	});

}

function loadReports(mod_name,filter_type){
	
	var from_date = $('#from_date').val();
	var to_date   = $('#to_date').val(); //console.log(filter_type);
	
	setPageHashValue("nav", "add");
	
	var url_data  = {module : mod_name,date_from : from_date, date_to : to_date, filter_type : filter_type};
	//console.log(url_data);
	loadModule('mod_reports');
	
	//setTimeout(function(){ loadModule('mod_reports'); },1000);
	setTimeout(function(){ 
		$('#module').val(mod_name);
	},2000);
	setTimeout(function(){ 
		$('#module').val(mod_name);
		$('#module').change();
	},3000);
	setTimeout(function(){ 
		loadModuleFiltersWithData(url_data);
	},3500);
	
}

function loadModulesWithFilters(mod_name,filter_id,filter_value){

	var filter_val_obj = {};
	filter_val_obj[filter_id] = filter_value;
	var url_data = '';
		
	if($('#from_date').val()){ filter_val_obj['date_from'] = $('#from_date').val() }
	if($('#to_date').val()){   filter_val_obj['date_to']   = $('#to_date').val(); }
		
	setTimeout(function(){ loadModule(mod_name); },1000);
	setTimeout(function(){ 
	
	  sendData("view",url_data,"../system/user/modules/"+mod_name+"/controller.php",function(res){
			  
		  $("#ajax_module_sub").html(res);
		  
		  if (!jQuery.isEmptyObject(filter_val_obj)) {
			  loadAdvanceSearch(filter_val_obj);
		  }
  
	   });
	 },2000);
	 setTimeout(function(){ $('#search').click(); },3500);
}
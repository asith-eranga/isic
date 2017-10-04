<?php
define('_MEXEC','OK');
require_once("../../../system/load.php");
//error_reporting(E_ALL);
 $action = $_POST['action'];
 
 switch($action){
 	case "currentStatistics":
 		currentStatistics();
 		break;
	case "displayTimePeriodsForStatistics":
 		displayTimePeriodsForStatistics();
 		break;
 	case "activeOrders":
 		activeOrders();
 		break;
 	case "salesChart":
 		salesChart();
 		break;
 	case "ordersChart":
 		ordersChart();
 		break;
	case "paymentTypes":
 		paymentTypes();
 		break;
	case "activityLog":
 		activityLog();
 		break;
	case "bestSellingProducts":
 		bestSellingProducts();
 		break;
	case "bestCustomers":
 		bestCustomers();
 		break;
	case "lowStock":
 		lowStock();
 		break;
	case "latestOrders":
 		latestOrders();
 		break;
 }
 
function currentStatistics(){

	$from_date 	= $_POST['from_date'];
	$to_date 	= $_POST['to_date'];
	$time_period = $_POST['time_period'];
	
	$sales 		= salesStatistics($from_date,$to_date,$time_period);
	$orders		= ordersStatistics($from_date,$to_date,$time_period);
	$customers 	= customersStatistics($from_date,$to_date,$time_period);
	echo $sales;
	echo $orders;
	echo $customers; 
}

function salesStatistics($from_date,$to_date,$time_period){

	Default_ModManager::loadHelper('orders');
	Default_ModManager::loadHelper('currency');
	
	$orders 	 = new Mod_Orders();
	$currency 	 = new Mod_Currency();
	
	$condition 	 = "payment_status=1";

	switch($time_period){
		case 'in_between':
			$sales = $orders->getOrdersBetweenTimePeriod(strtotime($from_date),strtotime($to_date),$condition);
			$label = 'Sales';
			break;
		case 'total' :
			$sales = $orders->getOrdersBetweenTimePeriod('','',$condition);
			$label = 'Total Sales';
			break;
		case 'today' :
			$sales = $orders->getOrdersBetweenTimePeriod(strtotime("12:00:00"),time(),$condition);
			$label = 'Today Sales';
			break;
		case 'this_month' :
			$sales = $orders->getOrdersBetweenTimePeriod(strtotime( 'first day of ' . date( 'F Y')),strtotime( 'last day of ' . date( 'F Y')),$condition);
			$label = 'This Month Sales';
			break;
		case 'this_year' :
			$sales = $orders->getOrdersBetweenTimePeriod(strtotime( 'first day of january' . date( 'Y')),strtotime( 'last day of december' . date( 'Y')),$condition);
			$label = 'This Year Sales';
			break;
	}
	$out = '<div class="column">
				<div class="ui yellow icon message">
				  <i class="dollar red large icon"></i>
				  <div class="content right_aligned" id="sales">
					<div class="header">
					  <h3><a href="javascript:;"" class="yellow text" onClick="loadModuleView(\'mod_orders\')">'.$label.'</a></h3>
					</div>
					<h2>'.$currency->displayCurrency($sales[0]['sum']).'</h2>
				  </div>
				</div>
			</div>';
	return $out;
}

function ordersStatistics($from_date,$to_date,$time_period){

	Default_ModManager::loadHelper('orders');
	Default_ModManager::loadHelper('currency');
	
	$order 	  = new Mod_Orders();
	$currency = new Mod_Currency();

	switch($time_period){
		case 'in_between':
			$orders = $order->getOrdersBetweenTimePeriod(strtotime($from_date),strtotime($to_date));
			$label  = 'Orders';
			break;
		case 'total' :
			$orders = $order->getOrdersBetweenTimePeriod();
			$label  = 'Total Orders';
			break;
		case 'today' :
			$orders = $order->getOrdersBetweenTimePeriod(strtotime("12:00:00"),time());
			$label  = 'Today Orders';
			break;
		case 'this_month' :
			$orders = $order->getOrdersBetweenTimePeriod(strtotime( 'first day of ' . date( 'F Y')),strtotime( 'last day of ' . date( 'F Y')));
			$label  = 'This Month Orders';
			break;
		case 'this_year' :
			$orders = $order->getOrdersBetweenTimePeriod(strtotime( 'first day of january' . date( 'Y')),strtotime( 'last day of december' . date( 'Y')));
			$label  = 'This Year Orders';
			break;
	}
	$out = '<div class="column">
				<div class="ui orange icon message">
                    <i class="shop yellow icon"></i>
                    <div class="content right_aligned" id="orders">
					<div class="header">
					  <h3><a href="javascript:;"" class="orange text" onClick="loadModuleView(\'mod_orders\')">'.$label.'</a></h3>
					</div>
					<h2>'.$orders[0]['count'].'</h2>
				  </div>
				</div>
			</div>';
	return $out;
}

function customersStatistics($from_date,$to_date,$time_period){

	Default_ModManager::loadHelper('customers');
	
	$customer	= new Mod_Customers();

	switch($time_period){
		case 'in_between':
			$customers 	= $customer->getCustomersBetweenTimePeriod(strtotime($from_date),strtotime($to_date));
			$label	  	= 'Customers';
			break;
		case 'total' :
			$customers 	= $customer->getCustomersBetweenTimePeriod();
			$label 		= 'Total Customers';
			break;
		case 'today' :
			$customers	= $customer->getCustomersBetweenTimePeriod(strtotime("12:00:00"),time());
			$label 		= 'Today Customers';
			break;
		case 'this_month' :
			$customers 	= $customer->getCustomersBetweenTimePeriod(strtotime( 'first day of ' . date( 'F Y')),strtotime( 'last day of ' . date( 'F Y')));
			$label 		= 'This Month Customers';
			break;
		case 'this_year' :
			$customers 	= $customer->getCustomersBetweenTimePeriod(strtotime( 'first day of january' . date( 'Y')),strtotime( 'last day of december' . date( 'Y')));
			$label 		= 'This Year Customers';
			break;
	}
	$out = '<div class="column">
				<div class="ui purple icon message">
                    <i class="users orange icon"></i>
                    <div class="content right_aligned" id="customers">
					<div class="header">
					  <h3><a href="javascript:;" class="purple text" onClick="loadModuleView(\'mod_customers\')">'.$label.'</a></h3>
					</div>
					<h2>'.$customers[0]['count'].'</h2>
				  </div>
				</div>
			</div>';
	return $out;
}

function displayTimePeriodsForStatistics(){
	
	Default_ModManager::loadHelper('orders');
	
	$order 	  = new Mod_Orders();
	
	$from_date 	= $_POST['from_date'];
	$to_date 	= $_POST['to_date'];
	$time_period = $_POST['time_period'];
	
	switch($time_period){
		case 'in_between':
			$out = '<i class="calendar icon"></i><b>'.$from_date.'</b> - <b>'.$to_date.'</b>';
			break;
		case 'total' :
			$first_order = $order->getFirstOrders('order_date ASC LIMIT 1');
			$first_day   = $first_order[0]['order_date'];
			$out = '<i class="calendar icon"></i><b>'.date('M-d-Y',$first_day).'</b> - <b>'.$to_date.'</b>';
			break;
		case 'today' :
			$out = '<i class="calendar icon"></i><b>'.$to_date.'</b>';
			break;
		case 'this_month' :
			$out = '<i class="calendar icon"></i><b>'.date('M-d-Y',strtotime('first day of ' .date('F'))).'</b> - <b>'.date('M-d-Y',strtotime('last day of ' .date('F'))).'</b>';
			break;
		case 'this_year' :
			$out = '<i class="calendar icon"></i><b>'.date('M-d-Y',strtotime('first day of january' .date('Y'))).'</b> - <b>'.date('M-d-Y',strtotime('last day of december' .date('Y'))).'</b>';
			break;
	}
	echo $out;
}

function activeOrders(){

	Default_ModManager::loadHelper('orders');
	
	$order 	 = new Mod_Orders();
	
	$from_date 	= strtotime($_POST['from_date']);
	$to_date 	= strtotime($_POST['to_date']);
	$condition  = "order_status=1";

	$active_orders = $order->getOrdersBetweenTimePeriod($from_date,$to_date,$condition);
	
	echo ($active_orders[0]['count'])?'<h1>'.$active_orders[0]['count'].'</h1>':'<h1>0</h1>';

}

function salesChart(){
	
	Default_ModManager::loadHelper('orders');
	error_reporting(E_ALL);
	$order 	 = new Mod_Orders();
	
	$from_date 	= strtotime($_POST['from_date']);
	$to_date 	= strtotime($_POST['to_date']);
	$condition  = "payment_status=1";
	
	/*//time_intervals = array([0]=>names_array, [1]=>timestamps_array)
	$time_intervals = getTimeIntervals($from_date,$to_date); 
	//$names			= $time_intervals[0];
	$timestamps		= $time_intervals[1];
	
	$data			= array();

	for($i=0; $i<count($timestamps); $i++){
		if($i != count($timestamps)-1){
			$sales	 = $order->getOrdersBetweenTimePeriod($timestamps[$i],$timestamps[$i+1],$condition);
			//$data[]	 = ($sales[0]['sum'] ? $sales[0]['sum'] : 0 );
		}
	} */
	
	$date1 = date_create($_POST['from_date']);
    $date2 = date_create($_POST['to_date']);
    $diff  = date_diff($date1, $date2);
    $dateDiff = $diff->format("%a");

    $from_date = ($from_date);
    $to_date   = ($to_date);

    if ($from_date > $to_date) {

        $from_date  = strtotime($_POST['from_date']);
        $to_date 	= strtotime($_POST['to_date']);
    }
	
	if (365 < $dateDiff) {

        $preOrder1 = '%Y';
        $preOrder2 = '%Y';
    }

    if (365 >= $dateDiff && 31 < $dateDiff) {

        $preOrder1 = '%Y-%M';
        $preOrder2 = '%Y-%m';
    }

    if (31 >= $dateDiff) {

        $preOrder1 = '%Y-%M-%d';
        $preOrder2 = '%Y-%m-%d';
    }

	$odata = $order->selectOrdersForSalesChart($from_date, $to_date, $preOrder1, $preOrder2, $condition);
	//print_r($odata);
	
	if (count($odata) == 0) {

        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
    } else {

        foreach ($odata as $key => $val) {

            $names[] = $val['month'];
            $data[] = $val['sum'];
        }
	
		$script = '<canvas id="sales_chart" width="800" height="300"></canvas>
			   <script type="text/javascript">
				
				var data = {
					labels: '.json_encode($names).',
					datasets: [
						{
							label: "Sales",
							fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "#3B7BC9", //"rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#333", //"#fff",
                            pointHighlightStroke: "#333", //"rgba(151,187,205,1)",
							data: '.json_encode($data).'
						}
					]
				};
				
				var options = {
					bezierCurve : false,
					responsive : true,
					segmentShowStroke: true,
					bezierCurveTension : 0.2,
					pointDot : true
				};
				
				var ctx = document.getElementById("sales_chart").getContext("2d");
				var myNewChart = new Chart(ctx).Line(data, options);
				
				
				</script>';
		echo $script;
	}
}

function ordersChart(){
	
	Default_ModManager::loadHelper('orders');
	
	$order 	 = new Mod_Orders();
	
	$from_date 	  = strtotime($_POST['from_date']);
	$to_date 	  = strtotime($_POST['to_date']);
	$order_status = $_POST['order_status'];
	$condition    = "order_status=".$order_status;
	
	/*$time_intervals = getTimeIntervals($from_date,$to_date); 
	//$names			= $time_intervals[0];
	$timestamps		= $time_intervals[1];
	
	$data			= array();

	for($i=0; $i<count($timestamps); $i++){
		if($i != count($timestamps)-1){
			$orders	 = $order->getOrdersBetweenTimePeriod($timestamps[$i],$timestamps[$i+1],$condition);
			//$data[]	 = ($orders[0]['count'] ? $orders[0]['count'] : 0 );
		}
	} */
	
	$date1 = date_create($_POST['from_date']);
    $date2 = date_create($_POST['to_date']);
    $diff  = date_diff($date1, $date2);
    $dateDiff = $diff->format("%a"); 

    $from_date = ($from_date);
    $to_date   = ($to_date);

    if ($from_date > $to_date) {

        $from_date  = strtotime($_POST['from_date']);
        $to_date 	= strtotime($_POST['to_date']);
    }
	
	if (365 < $dateDiff) {

        $preOrder1 = '%Y';
        $preOrder2 = '%Y';
    }

    if (365 >= $dateDiff && 31 < $dateDiff) {

        $preOrder1 = '%Y-%M';
        $preOrder2 = '%Y-%m';
    }

    if (31 >= $dateDiff) {

        $preOrder1 = '%Y-%M-%d';
        $preOrder2 = '%Y-%m-%d';
    }

	$odata = $order->selectOrdersForSalesChart($from_date, $to_date, $preOrder1, $preOrder2, $condition);
	//print_r($odata);
	
	if (count($odata) == 0) {

        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
    } else {

        foreach ($odata as $key => $val) {

            $names[] = $val['month'];
            $data[] = $val['count'];
        }
	
		$script = '<canvas id="orders_chart" width="800" height="300"></canvas>
				<script type="text/javascript">
				
				var data = {
					labels: '.json_encode($names).',
					datasets: [
						{
							label: "Orders",
							fillColor: "rgba(224,123,83,0.5)",
							strokeColor: "#E69575", //"rgba(217,92,92,0.8)",
							highlightFill: "rgba(224,123,83,0.65)",
							highlightStroke: "#E69575",//"rgba(217,92,92,1)",
							data: '.json_encode($data).'
						}
					]
				};
				
				var options = {
					barStrokeWidth : 2,
					responsive : true,
					barValueSpacing : 3,
					barDatasetSpacing : 1
				};
				
				var ctx2 = document.getElementById("orders_chart").getContext("2d");
				var myNewChart2 = new Chart(ctx2).Bar(data,options);
				
				
				</script>';
		echo $script;
	}
}

function paymentTypes(){
	
	Default_ModManager::loadHelper('orders');
	Default_ModManager::loadHelper('payment_gateways');
	
	$order	 = new Mod_Orders();
	$pg		 = new Mod_Payment_Gateways();

	$from_date 	= strtotime($_POST['from_date']);
	$to_date 	= strtotime($_POST['to_date']);
	
	$pg_data 	= $pg->selectRequiredFields("id,bank_id,title");
	$pg_colours = $pg->getGatewayColors();
	$data 		= array();
	
	if(count($pg_data)>0){ 
		for($i=0; $i<count($pg_data); $i++){
			$pg->extractor($pg_data,$i);
			$condition 	= "payment_status=1 AND payment_type=".$pg->id();
			$sales 		= $order->getOrdersBetweenTimePeriod($from_date,$to_date,$condition);
			
			if($sales[0]['count']>0){ //if there are sales competed with this gateway
				$data[] = array(
					"value" => $sales[0]['count'],
					"color" => $pg_colours[$pg->bankId()],
					"label" => $pg->title()
				);
			}
		}
	}
	if(empty($data)){
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}else{
		$script = '<canvas id="payment_chart" width="250" height="300" style="width:250px; height:300px;" tc-chartjs-doughnut chart-options="options" chart-data="data" auto-legend></canvas>
				<div id="js-legend" class="chart-legend" ></div>
				<script type="text/javascript">
				
				var data ='.json_encode($data).';
				var options = {
					segmentShowStroke : true,
					segmentStrokeWidth : 1,
					percentageInnerCutout : 65,
					legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%> <%}%></li><%}%></ul>"
				};
				
				var ctx3 = document.getElementById("payment_chart").getContext("2d");
				var moduleDoughnut = new Chart(ctx3).Doughnut(data,options);
				
				document.getElementById(\'js-legend\').innerHTML = moduleDoughnut.generateLegend();

				</script>';
		echo $script;
	}
	//echo json_encode($chart_data);
	//print_r($chart_data);
}

function activityLog(){
	
	$activity_log = new ActivityLog();

	$data = $activity_log->getLatest();
	
	if(count($data)>0){
		$out = '<table class="ui collapsing small ten column table order home">
				  <thead>
					<tr>
					<th class="center_aligned">Date</th>
					<th class=center_aligned"">Time</th>
					<th>User</th>
					<th class="center_aligned">Type</th>
					<th class="center_aligned">IP</th>
				  </tr></thead>
				  <tbody>';
				for($i=0; $i<5; $i++){ $activity_log->extractor($data,$i);
		$out .= 	'<tr>
					  <td width="20%">'.date("j M, Y",$activity_log->createdDate()).'</td>
					  <td width="20%">'.date("h:i a",$activity_log->createdDate()).'</td>
					  <td width="30%">'.$activity_log->user().'</td>
					  <td class="center_aligned">'.$activity_log->type().'</td>
					  <td class="center_aligned">'.$activity_log->ip().'</td>
					</tr>';
				}
		$out .=   '</tbody>
				</table>';
		echo $out;
	}else{
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}

}

function bestSellingProducts(){
	
	Default_ModManager::loadHelper('currency');
	Default_ModManager::loadHelper('orders');
	Default_ModManager::loadHelper('ratings');
	
	$currency = new Mod_Currency();
	$order	  = new Mod_Orders();
	$ratings  = new Mod_Ratings();
	
	$from_date 	= strtotime($_POST['from_date']);
	$to_date 	= strtotime($_POST['to_date']);
	
	$products_arr  = $order->bestSellingProducts($from_date,$to_date);

	$sort_by = $_POST['sort_by'];
	switch($sort_by){
		case 'quantity':
			//sort array by quantity
			foreach ($products_arr as $key => $row) {
				$sort[$key]  = $row['quantity']; 
			}
			array_multisort($sort, SORT_DESC, $products_arr);
			break;
			
		case 'price':
			//sort array by price
			foreach ($products_arr as $key => $row) {
				$sort[$key]  = $row['row_total']; 
			}
			array_multisort($sort, SORT_DESC, $products_arr);
			break;
		
		case 'rating':
			//sort array by rating
			foreach ($products_arr as $key => $row) {
				$sort[$key]  = $row['rating']; 
			}
			array_multisort($sort, SORT_DESC, $products_arr);
			break;
	}
	
	if(count($products_arr)){
		$out = '<table class="ui collapsing small ten column table order home">
				 <thead>
					<tr>
						<th>Name</th>
						<th>SKU</th>
						<th>Rating</th>
						<th class="center_aligned">Quantity</th>
						<th class="right_aligned">Total</th>
					</tr>
				  </thead>
				  <tbody>';
				  for($i=0;$i<5; $i++){ 
					if(!empty($products_arr[$i])){
						$out .= '<tr id="row_'.$products_arr[$i]['product_id'].'">
								<td style="width:40%"><a href="javascript:;" onClick="loadModuleViews(\'mod_products\',\'edit\','.$products_arr[$i]['product_id'].')">'.$products_arr[$i]['product_name'].'</a></td>
								<td style="width:20%">'.$products_arr[$i]['sku'].'</td>
								<td class="center_aligned">'.$products_arr[$i]['rating'].'</td>
								<td class="center_aligned">'.$products_arr[$i]['quantity'].'</td>
								<td style="width:30%" class="right_aligned">'.$currency->displayCurrency($products_arr[$i]['row_total']).'</td>
							</tr>';
						}
				  }
				   $out .= '</tbody>
				</table>';
		echo $out;
	}else{
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}
}

function bestCustomers(){

	Default_ModManager::loadHelper('customers');
	Default_ModManager::loadHelper('currency');
	Default_ModManager::loadHelper('orders');
	
	$customers 	= new Mod_Customers();
	$currency   = new Mod_Currency();
	$order	    = new Mod_Orders();

	$from_date 	= strtotime($_POST['from_date']);
	$to_date 	= strtotime($_POST['to_date']);
	
	$customer_arr = $order->bestCustomers($from_date,$to_date);
	
	foreach ($customer_arr as $key => $row) {
		$sort[$key]  = $row['grand_total']; 
	}
	array_multisort($sort, SORT_DESC, $customer_arr);
	
	if(count($customer_arr)>0){	
		$out = '<table class="ui collapsing small ten column table order home">
				 <br>
				 <thead>
					<tr>
						<th class="center_aligned">Name</th>
						<th class="right_aligned">Total Orders</th>
						<th class="right_aligned">Total Sales</th>
					</tr>
				  </thead>
				  <tbody>';
				  for($i=0;$i<5; $i++){ 
					if(!empty($customer_arr[$i])){
						$customers->extractor($customer_arr,$i);
						$customers->setId($customer_arr[$i]['customer_id']);
						$customer_data = $customers->getById();
						
						$order->setCustomerId($customer_arr[$i]['customer_id']);
						$total_orders  = count($order->getSalesFromCustomerId());
						$customers->extractor($customer_data);
						$out .= '<tr id="row_'.$customers->id().'">
								<td style="width:40%" class="center_aligned"><a href="javascript:;" onClick="loadModuleViews(\'mod_customers\',\'edit\','.$customers->id().')">'.$customers->firstName().' '.$customers->lastName().'</a></td>
								<td style="width:20%" class="right_aligned">'.$total_orders.'</td>
								<td style="width:30%" class="right_aligned">'.$currency->displayCurrency($customer_arr[$i]['grand_total']).'</td>
							</tr>';
						}
				  }
				   $out .= '</tbody>
				</table>';
		echo $out;
	
	}else{
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}

}

function latestCustomers(){
	
	Default_ModManager::loadHelper('customers');
	
	$customers 	= new Mod_Customers();
	$data		= $customers->getLatestCustomers();
	
	$customer_title = Mod_Customers::getTitles();
	
	if(count($data)>0){	
		$out = '<table class="ui collapsing small three column table order home">
				 <br>
				 <thead>
					<tr>
						<th class="center_aligned">Name</th>
						<th class="center_aligned">Email</th>
						<th class="center_aligned">Mobile No</th>
					</tr>
				  </thead>
				  <tbody>';
				  for($i=0;$i<5; $i++){ 
					$customers->extractor($data,$i);
					$out .= '<tr id="row_'.$customers->id().'">
							<td style="width:40%" class="center_aligned"><a href="javascript:;" onClick="loadModuleViews(\'mod_customers\',\'edit\','.$customers->id().')">'.$customers->firstName().' '.$customers->lastName().'</td>
							<td style="width:30%" class="center_aligned">'.$customers->email().'</td>
							<td class="center_aligned">'.$customers->mobileNumber().'</td>
						</tr>';
					}
				   $out .= '</tbody>
				</table>';
		echo $out;
		
	}else{
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}

}

function lowStock(){
	
	Default_ModManager::loadHelper('products');
	
	$products = new Mod_Products();
	$data 	  = $products->loadReports("quantity ASC","quantity <= outof_stock_on");
	
	if(count($data)>0){
		$out = '<table class="ui collapsing small ten column table order home">
			 <br>
			 <thead>
				<tr>
					<th>Name</th>
					<th>SKU</th>
					<th class="center_aligned">Quantity</th>
				</tr>
			  </thead>
			  <tbody>';
			  for($i=0;$i<5; $i++){ 
			    $products->extractor($data,$i);
				$out .= '<tr id="row_'.$products->id().'">
						<td style="width:40%"><a href="javascript:;" onClick="loadModuleViews(\'mod_products\',\'edit\','.$products->id().')">'.$products->name().'</a></td>
						<td style="width:30%">'.$products->sku().'</td>
						<td class="center_aligned">'.$products->quantity().'</td>
					</tr>';
				}
			   $out .= '</tbody>
			</table>';
		echo $out;
	}else{
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}
}

function latestOrders(){
	
	Default_ModManager::loadHelper('orders');
	
	$orders	 = new Mod_Orders();
	
	$data    = $orders->getLatestOrders();
	$order_status 	= $orders->getOrderStatus();
	$payment_status = $orders->getPaymentStatus();

	if(count($data)>0){
		$out = '<table class="ui collapsing small ten column table order home">
			  <br>
			  <thead>
				<tr>
					<th>Order #</th>
					<th>Customer Name</th>
					<th>Order Date</th>
					<th class="center_aligned">Subtotal</th>
					<th>Order Status</th>
				</tr>
			  </thead>
			  <tbody>';
		   for($i=0;$i<count($data); $i++){ 
				$orders->extractor($data,$i);
				$items 			= unserialize($orders->items());
				$shipping 		= unserialize($orders->shipping());
				$billing_info 	= unserialize($orders->billingInfo());
				$shipping_info  = unserialize($orders->shippingInfo());
		
			  if($orders->orderType() == 0){
			  
			  $out .= '<tr id="row_'.$orders->id().'">
						  <td class="right_aligned"><span><a href="javascript:;" onClick="loadModuleViews(\'mod_orders\',\'viewOrder\','.$orders->id().')">'.$orders->id().'</a></span></td>
						  <td class="center_aligned" width="50%"><span><a href="javascript:;" onClick="loadModuleViews(\'mod_customers\',\'edit\','.$orders->customerId().')">'.$shipping_info['first_name'].' '.$shipping_info['last_name'].'</a></span></td>
						  <td class="center_aligned"><span>'.date("d-m-Y",$orders->orderDate()).'</span></td>
						  <td class="right_aligned"><span>'.$orders->displayCurrency($orders->subTotal(),$orders->currency()).'</span></td>
						  <td class="center_aligned"><span>'.$order_status[$orders->orderStatus()].'</span></td>
					  </tr>';
			  }
		   }
		$out .= '</tbody>
			</table>';
		echo $out;
	}else{
        echo '<div class="ui equal width grid form center aligned grey small message segment"><i class="large warning sign icon red"></i> <b>No Data Found Yet</b></div>';
	}

}

function getTimeIntervals($from_date,$to_date){
	
	$date1 = date_create(date("Y-m-d",$from_date));
	$date2 = date_create(date("Y-m-d",$to_date));
	$diff  = date_diff($date1,$date2);
	$days_diff = $diff->format("%a");
	
	$date_month_before 		 = date_create(date("Y-m-d",strtotime('-1 month',$to_date)));
	$date_three_month_before = date_create(date("Y-m-d",strtotime('-3 month',$to_date)));
	$month_diff 		  	 = date_diff($date_month_before,$date2);
	$three_month_diff	  	 = date_diff($date_three_month_before,$date2);
	
	$month					 = $month_diff->format("%a");
	$three_month			 = $three_month_diff->format("%a");
	
	$names[] 	  = date("Y-m-d",$from_date);
	$timestamps[] = $from_date;
	
	$current_date = $from_date;
	
	if($days_diff <= $month){ // by two days
		while($current_date < $to_date){  
			
			// Add a day to the current date  
		  	$current_date = strtotime(date("Y-m-d", $current_date)."+2 day"); 
		
		  	// Add this new day to the names array 
			$names[] 	  = date("Y-m-d", $current_date);  
			$timestamps[] = $current_date;
		}
		
	}else if($days_diff > $month && $days_diff <= $three_month){ // by week
		while($current_date < $to_date){  
			
			// Add a day to the current date  
		  	$current_date = strtotime(date("Y-m-d", $current_date)."+7 day"); 
		
		  	// Add this new day to the names array 
			$names[] 	  = date("Y-m-d", $current_date);  
			$timestamps[] = $current_date;
	}
		
	}else{ // by month
		unset($names);
		$names[] 	  = date("M", $current_date);
		while($current_date < $to_date){  
			
			// Add a day to the current date  
		  	$current_date = strtotime(date("Y-m-d", $current_date)."+1 month"); 
		
		  	// Add this new day to the names array  
			$names[] 	  = date("M", $current_date);  
			$timestamps[] = $current_date;
		}
		
	}
	
	return array($names,$timestamps);
	//return array($date1,$date2);

}

?>
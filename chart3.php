 <?php
$conn = oci_connect("system","123","//localhost/xe");
session_start();
//$adminId = $_GET['adminId'];
//$ADMINID = $get2['adminId'];
include 'session.php';
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
  if (!$conn){
        $m = oci_error();
        trigger_error(htmlentities($m['message']), E_USER_ERROR);
      } 
$curs = oci_new_cursor($conn);
$sth = oci_parse($conn,"begin getDailySales(:dailySales); end;");
oci_bind_by_name($sth, ":dailySales", $curs, -1, OCI_B_CURSOR);
oci_execute($sth);
oci_execute($curs); 

$rows = array();
$flag = true;
$table = array();
$table['cols'] = array(

    array('label' => 'order_date', 'type' => 'string'),
    array('label' => 'total sales', 'type' => 'number')

);

$rows = array();
while (($r = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['TRUNC(ORDER_DATE)']); 

    // Values of each slice
    $temp[] = array('v' => (int) $r['SUM(TOTAL_COST)']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
//echo $jsonTable;
?>

<html>
  <head>
    <!--Load the Ajax API-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Daily sales ',
          is3D: 'true',
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
      var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
      chart.draw(data, options);
      var chart = new google.visualization.ComboChart(document.getElementById('comboc'));
      chart.draw(data, options);

    }
    </script>
	<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-1.11.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
  <body>
<header>
	<nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			 <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
				 <a class="navbar-brand" href=""><?php echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity"></span></a></li>
					<li ><a href="readStudent.php">Customers <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="reportDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM report WHERE REPROT_DATE >= sysdate - (180/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Messages <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
					<li ><a href="orderDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM order_pro WHERE order_date >= sysdate - (15/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Orders <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
	                    <li ><a href="orderDetails.php">Order Details<span style="font-size:16px;" class="hidden-xs showopacity"></span></a></li>
		<li><a href="chart1.php">Total sales for each product</a></li>
          <li><a href="chart2.php">Top customers ordering</a></li>
          <li><a href="chart3.php">Daily sales</a></li> 
    </ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
				
			</div>
		</div>
	</nav>
	</header>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>     <div id="barchart"></div>
<div id="comboc"></div>
  </body>
</html>
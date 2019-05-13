<?php
// connect to database
$conn = oci_connect("system", "123", "//localhost/xe");
 
// page headers
$page_title="Cart";
include 'layout_head.php';
 include 'session.php';
// parameters
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

// display a message
if($action=='confirmed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> order was cofirmed!";
    echo "</div>";
}

else if($action=='failed'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> order failed!";
    echo "</div>";
}
// select products in the cart
$query="SELECT p.id, p.name, p.price, ci.quantity, ci.quantity * p.price AS subtotal  
            FROM cart_item ci  
                LEFT JOIN product p 
                    ON ci.product_id = p.id where  CREATED >= sysdate - (1/1440) and USERID = '$username'"; 
 
 $result = oci_parse($conn,$query);

oci_execute ($result,OCI_DEFAULT);
 
if($result){
	
     echo "<div class='container'>";
    echo "<center><h1>Order Summarry</h1></center>";
    echo "<hr>";
    //start table
     echo "<table class='table table-hover table-responsive table-bordered'>";
     
    // our table heading
    echo "<tr>";
        echo "<th class='col-sm-1'>Product Name</th>";
        echo "<th class='col-sm-1'>Price (USD)</th>";
            echo "<th class='col-sm-1''>Quantity</th>";
            echo "<th class='col-sm-1'>Sub Total</th>";
    echo "</tr>";
         
    $total=0;
     
     while($row = oci_fetch_array($result,OCI_BOTH)){
             
            //creating new table row per record
            echo "<tr>";
                echo "<td>";
                    echo "<div class='product-id' style='display:none;'>{$row["0"]}</div>";
                    echo "<div class='product-name'>{$row["NAME"]}</div>";
                echo "</td>";
                echo "<td>{$row["PRICE"]}</td>";
                  echo "<td>{$row["QUANTITY"]}</td>";
                  echo "<td>{$row["SUBTOTAL"]}</td>";				  
                    echo "</tr>";
		
             
        $total += $row["SUBTOTAL"];
    }
     
    echo "<tr>";
    echo "<td><b>Total</b></td>";
    echo "<td> $total</td>";
    echo "<td>";
	 echo "<a href='cart.php' class='btn btn-success'>";
            echo "<span class=' glyphicon glyphicon-circle-arrow-left'></span> Back";
            echo "</a>";         
    echo "</td>";
	echo "<td>";
	echo "<button class='btn btn-primary confirm-order'>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span>Confirm";
                        echo "</button>";
    echo "</td>";
    echo "</tr>";   
    echo "</table>";
}else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
	echo "</div>";
}
 
 
include 'layout_foot.php';
?>
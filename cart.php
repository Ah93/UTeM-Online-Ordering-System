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
 $username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
// display a message
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}
 
else if($action=='failed'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity failed to updated!";
    echo "</div>";
}
 
else if($action=='invalid_value'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity is invalid!";
    echo "</div>";
}
 
// select products in the cart
$curs = oci_new_cursor($conn);
$sth = oci_parse($conn,"begin DisplayCartItem(:p_id,:cartDisplay); end;");
oci_bind_by_name($sth, ":p_id", $username);
oci_bind_by_name($sth, ":cartDisplay", $curs, -1, OCI_B_CURSOR);
oci_execute($sth);
oci_execute($curs);
 
if($curs){
	
     echo "<div class='container'>";
    echo "<center><h1>Cart</h1></center>";
    echo "<hr>";
    //start table
     echo "<table class='table table-hover table-responsive table-bordered'>";
     
    // our table heading
    echo "<tr>";
        echo "<th class='textAlignLeft'>Product Name</th>";
        echo "<th>Price (RM)</th>";
            echo "<th style='width:15em;'>Quantity</th>";
            echo "<th>Sub Total</th>";
            echo "<th>Action</th>";
    echo "</tr>";
         
    $total=0;
    $total_qty = 0;
     while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
             
            //creating new table row per record
            echo "<tr>";
                echo "<td>";
                    echo "<div class='product-id' style='display:none;'>{$row["ID"]}</div>";
                    echo "<div class='product-name'>{$row["NAME"]}</div>";
                echo "</td>";
                echo "<td>{$row["PRICE"]}</td>";				
            echo "<td>";
                        echo "<div class='input-group'>";
                            echo "<input type='number' name='quantity' value='{$row["QUANTITY"]}' class='form-control'>";
                             
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default update-quantity' type='button'>Update</button>";
                            echo "</span>";
                             
                        echo "</div>";
                echo "</td>";
                echo "<td>{$row["SUBTOTAL"]}</td>";
                echo "<td>";
            echo "<a href='remove_from_cart.php?id={$row["CARTID"]}&name={$row["NAME"]}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
            echo "</a>";
            echo "</td>";
        echo "</tr>";
		
             
        $total += $row["SUBTOTAL"];
		$total_qty += $row["QUANTITY"];
    }
     
    echo "<tr>";
    echo "<td><b>Total</b></td>";
    echo "<td>$total_qty</td>";
    echo "<td></td>";
    echo "<td> $total</td>";
    echo "<td>";
            echo "<a href='order.php' class='btn btn-success'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
            echo "</a>";
    echo "</td>";
    echo "</tr>";   
    echo "</table>";
}
else
{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
	echo "</div>";
}
 
 
include 'layout_foot.php';
?>
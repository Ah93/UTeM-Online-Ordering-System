<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<title>Home Page</title>
</head>

<body>
<div align="center"id="mainWrapper">
<div id="pageHeader">
<table width="770" border="1">
  <tr>
    <td width="760"><img src="pic/onutem.PNG" width="755" height="153" alt="logo" />   </td>
    </tr>
  <tr>
    <td height="30"> Home<a href="a"> Link 1 </a> <a href="a">Link 2</a> <a href="a">Link 3        </a></td>
    </tr>
</table>

</div>
<div id="navigation">
<ul>
<a href="layout.html">Home</a>
<a href="layout.html">About</a>
<a href="layout.html">Our Products</a>
<a href="layout.html">Contact us</a>
</ul>
</div>

<div id="pageContent">
<ul class="products">
    <li><a href="#"><img src="pic/Roti-Canai.jpg" width="217" height="108" /></a>
        <a href="#">
        <h4>Logo Shirt (Gray)</h4>
            <p>$20.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="pic/Laksa 1.jpg" width="219" height="115">
            <h4>Mike the Frog Shirt (Orange)</h4>
            <p>$25.00</p>
        </a>
    </li><!-- more list items -->
     <li>
        <a href="#">
            <img src="pic/3.jpg" width="225" height="108">
            <h4>Mike the Frog Shirt (Orange)</h4>
            <p>$25.00</p>
        </a>
    </li>
     <li>
        <a href="#">
            <img src="pic/download.jpe" width="220" height="117">
            <h4>Mike the Frog Shirt (Orange)</h4>
            <p>$25.00</p>
        </a>
    </li>
</ul>
</div>
<div id="pageFooter">copyright</div>

</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
}
body,td,th {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-color: #B6DB90;
}
</style>
</head>

<body>
<div align="center"id="mainWrapper">
<div id="pageHeader">
<table width="587" border="1">
  <tr>
    <td width="300" height="142"><img src="pic/utemlogo.jpg" width="300" height="134" alt="g" /></td>
    <td width="271"><img src="pic/logo.png" width="274" height="84" alt="d" /></td>
    <table width="200" border="1">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

  </tr>
  <tr>
    <td height="20" colspan="2"><a href="a">Home</a> .  <a href="a">Add New Item</a> . <a href="a">Edit</a> . <a href="a">Delete</a> . <a href="a">Help .  </a> <a href="a">Log out</a></td>
    </tr>
  
</table>
</div>
<div id="pageContent">
<h3>
    &darr; Add New Inventory Item Form &darr;
    </h3>
    <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          $
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
          <option value="Clothing">Clothing</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Subcategory</td>
        <td><select name="subcategory" id="subcategory">
        <option value=""></option>
          <option value="Hats">Hats</option>
          <option value="Pants">Pants</option>
          <option value="Shirts">Shirts</option>
          </select></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Add This Item Now" />
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
</div>
<div id="pageFooter">copyright : Admin</div>

</div>
:
</body>
</html>
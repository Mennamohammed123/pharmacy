<?php 
include('server.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset ="utf"-8> <!..يدعم الصفحه للغة العربية والانجليزية..>
  <meta name ="descrption" content="Pharmacy Managemant System"> <!..وصف للصفحه للبحث بجوجل..>
  <title> Life Pharmacy </title>
  <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" type="text/css" href="css/font.css">
  <script> "Welcome To Online Pharmacy Managemant System";</script>
     <!--===============================================================================================-->	
</head>

<body>
	

 <div id="logo" class="container">
      <h1><a href="home.php">Life<span>Pharmacy</span></a></h1><!.. لوجو وغي نفس الوقت لينك للموقع عند الضغط علي اللوجو..><p>system for pharmacy management</a></p>

			</div>

<div  id="menu" class="container">
	<ul>
		 <li class="current_page_item"><a href="admin_home.php" accesskey="1" title="">Homepage</a></li>
		 <li><a href="viewpharmacist.php" accesskey="1" title="">Pharmcists</a></li>
	 	<li><a href="viewmedicines.php" accesskey="2" title="">Medicines</a></li>
   <li><a href="create_user.php" accesskey="3" title="">Create new admin/pharmacist</a></li>
	 	<li><a href="admin_home.php?logout='1'" accesskey="3" title="">Logout</a></li>
 </ul> 
</div>  

 <div id="banner" class="container"> <img src="images/im.jpg" width="1200" height="500" alt=""></div>


<div id="two-column" class="container">
	<div id="tbox1">
		<h2>Pharmcists</h2>
   <div id="banner" class="container"> <img src="images/pharmacist.png" width="200" height="200" alt=""></div>
		<a href="viewpharmacist.php" class="button"> More details</a> </div>
	
	<div id="tbox2">
		<h2>Medicines</h2>
 <div id="banner" class="container"> <img src="images/medicine.png" width="200" height="200" alt=""></div>
		<a href="viewmedicines.php" class="button"> More details</a> </div>
</div>
</body>
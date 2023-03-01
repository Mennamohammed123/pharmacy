<?php 
include('server.php');


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}



?>
<!DOCTYPE html>                            
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta charset ="utf"-8> <!..يدعم الصفحه للغة العربية والانجليزية..>
  <meta name ="descrption" content="Pharmacy Managemant System"> <!..وصف للصفحه للبحث بجوجل..>
  <title> Life Pharmacy </title>
  <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/pharmacy.png">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" type="text/css" href="css/font.css">
 <style>
	
table{
     font-family:  Times, serif;
		width: 60%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
 border: 7px solid #1B1B1B;}


th, td {
  text-align: center;
  padding: 8px;
 font-family: Arial, Helvetica, sans-serif;
 font-size: 20px;
  color: white;}
td{
	padding: 8px;
	text-align: center;
	background-color: white;
color: black;}
th {
	text-align: center;
	background-color: #1B1B1B;
font-size: 25px;
}

.edit_btn {
    text-decoration: none;
    padding: 7px 20px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
 font-size: 20px;}

.del_btn {
	 font-size: 20px;
    text-decoration: none;
    padding: 7px 9px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: white; 
    background: black; 
    border: 1px solid #bc1414;
    width: 50%;
    text-align: center;
}
 </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
	
      <div id="logo" class="container">
	         	
      <h1><a href="home.php">Life<span>Pharmacy</span></a></h1><!.. لوجو وغي نفس الوقت لينك للموقع عند الضغط علي اللوجو..><p>system for pharmacy management</a></p>

			</div>
	
<div  id="menu" class="container">
	 <ul>
		  <li><a href="admin_home.php" accesskey="1" title="">Homepage</a></li>
		  <li class="current_page_item"><a href="viewpharmacist.php" accesskey="1" title=""> view pharmcists</a></li>
		  <li><a href="addpharmacist.php" accesskey="2" title=""> add pharmcists </a></li>
	     <li><a href="admin_home.php?logout='1'"accesskey="3" title="">Logout</a></li>         
	 </ul>
</div>
 <!--===============================================================================================-->	

  <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
  <div class="container-login100-form-btn">
       <form action="">
      <input type="text" placeholder="Search.." name="search"id="myInput">              
  </div>
	
	<?php $results = mysqli_query($db, "SELECT * FROM pharmacist"); ?>

<table id="myTable">
	<thead>
		<tr>
			<th>Pharmacist_name</th>
			<th>Pharmacist_email</th>
			<th>Pharmacist_mobile</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['pharmacist_name']; ?></td>                 
			<td><?php echo $row['pharmacist_email']; ?></td>
			<td><?php echo $row['pharmacist_mobile']; ?></td>
			<td>
				<a href="addpharmacist.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
    $("#myTable tr:first").show();
  });
});
</script>
</body>
</html>   

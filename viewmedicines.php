<?php 
include('server.php');

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
		<li class="current_page_item"><a href="viewmedicines.php" accesskey="2" title=""> view medicine </a></li>
        <li><a href="addmedcine.php" accesskey="1" title=""> add medicine </a></li>
		<li><a href="admin_home.php?logout='1'" accesskey="3" title="">Logout</a></li>
        
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
			

	<?php $results = mysqli_query($db, "SELECT * FROM medicine"); ?>

<table id="myTable">
	<thead>
		<tr>
      <th>medicine_pic</th>
			<th>medicine_name</th>
			<th>quantity_medicine</th>
			<th colspan="2">medicine_alternatives</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>	

	 
 	<?php while ($row = mysqli_fetch_array($results)) { ?>
 
		<tr>
      <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="300" height="300" />';  ?>  </td>  
			<td><?php echo $row['medicine_name']; ?></td>                 
			<td><?php echo $row['quantity_medicine']; ?></td>
			<td><?php echo $row['medicine_alternatives']; ?></td>
   <td><?php echo $row['medicine_alternatives2']; ?></td>
			<td>
				<a href="addmedcine.php?m_edit=<?php echo $row['m_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?m_del=<?php echo $row['m_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
 

</table>
<form>
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

<?php 
include('server.php');


	if (isset($_GET['m_edit'])) {
		$m_id = $_GET['m_edit'];
		$m_update = true;
		$record = mysqli_query($db, "SELECT * FROM medicine WHERE m_id=$m_id");
		if (count($record) == 1 ) {
			$m = mysqli_fetch_array($record);
			$medicine_name = $m['medicine_name'];
		 $quantity_medicine = $m['quantity_medicine'];
   $medicine_alternatives = $m['medicine_alternatives'];
		$image=$m['image'];}
	}
?>
<!< DOCTYPE html>                               <!--===========  /* 8888888888888888index 3 add pharmacist8888888888888888888888*/  ================-->
<html>
<head>
    
  <meta charset ="utf"-8> <!..يدعم الصفحه للغة العربية والانجليزية..>
  <meta name ="descrption" content="Pharmacy Managemant System"> <!..وصف للصفحه للبحث بجوجل..>
  <title> Life Pharmacy </title>
  <!--===============================================================================================-->	
	
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" type="text/css" href="css/font.css">
 
 <style>
	input, select, textarea {
  width:100%;
  padding: 20px 50px ;
  border: 2px solid #ccc;
  border-radius: 100px;
  
}
input[type=submit] {
  background-color: BLACK;
  color: white;
  padding: 25px 250px;
  border: none;
  border-radius: 8px;
margin:  10px 0px ;
}

.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: white; 
    background: black; 
    border: 1px solid #bc1414;;
    width: 50%;
    text-align: center;
}
 </style>
</head>
<body>
	
<div id="logo" class="container">
<h1><a href="file:///C:/Users/%D9%85%D9%86%D8%A9%20%D8%A7%D9%84%D9%84%D9%87%20%D8%B4%D8%B1%D9%81/Desktop/project%20menna/index2.html">Life<span>Pharmacy</span></a></h1><!.. لوجو وغي نفس الوقت لينك للموقع عند الضغط علي اللوجو..><p>system for <a  rel="nofollow">pharmacy management</a></p>
</div>

<div  id="menu" class="container">
	<ul>
		<li><a href="admin_home.php" accesskey="1" title="">Homepage</a></li>
		<li><a href="viewmedicines.php" accesskey="2" title=""> view medicine </a></li>
        <li class="current_page_item"><a href="addmedcine.php" accesskey="1" title=""> add medicine </a></li>
		<li><a href="admin_home.php?logout='1'" accesskey="3" title="">Logout</a></li>
        
	</ul>
</div>


	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<div class="inputState" >
  <form method="post"  action="server.php"enctype="multipart/form-data"> 
		<div class="row_add">
			<div class="col-75">
         <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
          </div>
  </div>
			 
  </div>

  <div class="row_add">
      <div class="col-75">
        <input type="text" name="medicine_name"placeholder="Medicine Name" value="<?php echo $medicine_name; ?>">
      </div>
  </div>
  <div class="row_add">
      <div class="col-75">
        <input type="text" name="quantity_medicine" placeholder="	Quantity Of Medicine" value="<?php echo $quantity_medicine; ?>">
      </div>
     </div>
  <div class="row_add">
      <div class="col-75">
        <input type="text" name="medicine_alternatives" placeholder="	Alternatives Medicine" value="<?php echo $medicine_alternatives; ?>">
      </div> 
     </div>
  <div class="row_add">
      <div class="col-75">
        <input type="text" name="medicine_alternatives2" placeholder="	Alternatives Medicine" value="<?php echo $medicine_alternatives2; ?>">
      </div> 
     </div>
   <div class="row_add">      
    <input type="file" name="image" class="button">
                </div>

				
		

<div class="input-group">
			<?php if ($m_update == true): ?>
				<div class="row_add">
	<input type="submit" name="m_edit"  value="Edit"style="background: green;" >
</div>
<?php else: ?>
	<div class="row_add">
             <input type="submit" value="Add" name="m_save">
  </div>
<?php endif ?>
		</div>
 
                

             
 </form>
</div>
</body>
</html>

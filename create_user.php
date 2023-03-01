
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset ="utf"-8> <!..يدعم الصفحه للغة العربية والانجليزية..>
<meta name ="descrption" content="Pharmacy Managemant System"> <!..وصف للصفحه للبحث بجوجل..>
<title>Life Pharmacy </title>
<link rel="stylessheet" herf="css/default.css"/> <!.. css لربطه بملف ..>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/login.png">
	<link rel="stylesheet" type="text/css" href="css/css/font.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	
<!--===============================================================================================-->
<style>
 
form, .content {
    
  border: 8px solid #bc1414 ;
margin: 10px 650px 0px 0px;
}

.input-group {
	margin: 30px 10px 30px 10px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}

   
</style></head>
<body >
 <div id="logo" class="container">
      <h1><a href="home.php">Life<span>Pharmacy</span></a></h1><!.. لوجو وغي نفس الوقت لينك للموقع عند الضغط علي اللوجو..><p>system for pharmacy management</a></p>

			</div>

<div  id="menu" class="container">
	<ul>
		 <li ><a href="admin_home.php" accesskey="1" title="">Homepage</a></li>
		 <li><a href="viewpharmacist.php" accesskey="1" title="">Pharmcists</a></li>
	 	<li><a href="viewmedicines.php" accesskey="2" title="">Medicines</a></li>
   <li class="current_page_item"><a href="create_user.php" accesskey="3" title="">Create new admin/pharmacist</a></li>
	 	<li><a href="admin_home.php?logout='1'" accesskey="3" title="">Logout</a></li>
 </ul> 
</div>  
<div class="wrap-login100">
			
			
        <form method="post" action="register.php"class="login100-form validate-form" style="background-color:black;text-align: center;"> 
	         <?php echo display_error(); ?>
             <span class="login100-form-title"> Create admin / user</span>
             <div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email"value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	

		<input class="butto" type="submit"name="register_btn" value="+Create"style="background-color: #bc1414 ;"> 
         
	   </form>
   
            
</body>
</html>

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
	


<body style="background-color: #666666;">
		<div class="wrap-login100">
			
			
        <form method="post" action="register.php"class="login100-form validate-form" style="background-color:black;"> 
	         <?php echo display_error(); ?>
             <span class="login100-form-title"> sign up</span>
             <div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email"value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	

		<input class="butto" type="submit"name="register_btn" value="SIGN UP"style="background-color: #bc1414 ;"> 
         <p> Already have an account? <a href="login.php">Login now</a>.</p>
	   </form>
   
             <div  class="login100-more"> <img src="images/images.jpg" width="1330" height="950" alt=""></div>    
</body>
</html>

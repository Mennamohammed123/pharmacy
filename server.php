
<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// variable declaration
$username = "";
$email    = "";
$errors   = array();

$pharmacist_name = "";
$pharmacist_email = "";
$pharmacist_mobile = "";
$id = 0;
$update = false;


$medicine_pic = "";
$medicine_name = "";
$quantity_medicine = "";
$medicine_alternatives = "";
$medicine_alternatives2 = "";
$m_id = 0;
$m_update = false;


		
// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: admin_home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: viewmedicines.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;
	$username = e($_POST['username']);
	$password = e($_POST['password']);
	if (empty($username)) {
		array_push($errors, "Error!Username is required please Enter username ");
	}
	if (empty($password)) {
		array_push($errors, "Error!Password is required please Enter username ");}
	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin_home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: viewmedicines.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


if (isset($_POST['save'])) {
        $pharmacist_name = $_POST['pharmacist_name'];
		$pharmacist_email = $_POST['pharmacist_email'];
        $pharmacist_mobile = $_POST['pharmacist_mobile'];
		mysqli_query($db, "INSERT INTO  pharmacist (pharmacist_name, pharmacist_email,pharmacist_mobile) VALUES ('$pharmacist_name ', '$pharmacist_email',' $pharmacist_mobile')"); 
		$_SESSION['message'] = "Done saved"; 
		header('location: addpharmacist.php');
	}
if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$pharmacist_name = $_POST['pharmacist_name'];
		$pharmacist_email = $_POST['pharmacist_email'];
        $pharmacist_mobile = $_POST['pharmacist_mobile'];

	mysqli_query($db, "UPDATE pharmacist SET pharmacist_name='$pharmacist_name',pharmacist_mobile=' $pharmacist_mobile', pharmacist_email='$pharmacist_email' WHERE id=$id");
	$_SESSION['message'] = "Done updated!"; 
	header('location: addpharmacist.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM pharmacist WHERE id=$id");
	$_SESSION['message'] = " deleted!"; 
	header('location: viewpharmacist.php');
}

 
if (isset($_POST['m_save'])) {
  $medicine_name= $_POST['medicine_name'];
		$quantity_medicine = $_POST['quantity_medicine'];
  $medicine_alternatives = $_POST['medicine_alternatives'];
		$medicine_alternatives2 = $_POST['medicine_alternatives2'];
	 $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		mysqli_query($db, "INSERT INTO  medicine (medicine_name,quantity_medicine,medicine_alternatives,medicine_alternatives2,image) VALUES ('$medicine_name ', '$quantity_medicine'
															,'$medicine_alternatives',' $medicine_alternatives2','$image')"); 
		$_SESSION['message'] = "Done saved"; 
		header('location: addmedcine.php');
	}
if (isset($_POST['m_edit'])) {
	$m_id = $_POST['m_id'];
	$medicine_name= $_POST['medicine_name'];
	$quantity_medicine = $_POST['quantity_medicine'];
 $medicine_alternatives = $_POST['medicine_alternatives'];
 $medicine_alternatives2 = $_POST['medicine_alternatives2'];
 $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	
	mysqli_query($db, "UPDATE medicine SET medicine_name='$medicine_name',quantity_medicine=' $quantity_medicine'
														, medicine_alternatives='$medicine_alternatives',medicine_alternatives2='$medicine_alternatives2',image='$image' WHERE m_id=$m_id");
	$_SESSION['message'] = "Done updated!"; 
	header('location: addmedcine.php');
}
if (isset($_GET['m_del'])) {
	
	$m_id = $_GET['m_del'];
	mysqli_query($db, "DELETE FROM medicine WHERE m_id=$m_id");
	$_SESSION['message'] = " deleted!"; 
	header('location: viewmedicines.php');
}

?>



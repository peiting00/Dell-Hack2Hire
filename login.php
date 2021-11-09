<?php
session_start();
ob_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<title>User Login Form</title>
<body>
<style>
	html, body {
        background-image: url("chocolate_background.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
   
	.container{
		height: 100px;
		display: block;
		margin: auto;
		width: 20%;
		//border:solid;
	}
	
	.divProfilePic{
		margin-left: 85px;
		margin-top:30px;
		position: absolute; 
		z-index:1;
		width: 130px;
		height: 130px;
		background-color:white;
		//border: solid;
		border-radius: 100%;
	}
	
	.profilePic{
		width: 130px;
		height:130px;
		border-radius: 100%;
		object-fit: cover;
	}
	
	.divLogin{
		border-radius: 25px;
		width: 35%;
		background-color: rgba(255, 255, 255, 0.8);
		margin-left: auto;
		margin-right: auto;
		border:solid;
		border-color: rgba(255, 255, 255, 0.0);
	}
	
	.divLoginHeader{
		border-radius: 25px 25px 0px 0px;
		width: 25%;
		margin-left: auto;
		margin-right: auto;
	}
	
	.loginHeader{
		font-family: "Quicksand";
		font-size: 35px;
		font-weight: 50;
		text-align: center;
		padding-top: 30px;
	}
	
	.divLoginContent{
		//border:solid;
		margin-left:auto;
		margin-right:auto;
		width: 90%;
		padding: 0px 7px 0px 7px;
		font-family: Arial;
		font-size:15px;
		font-weight: 50;
	}
	
	.divlbl{
		//border:solid;
		padding-bottom: 3px;
		margin-left: 20px;
		font-size: 17px;
	}
	
	.divInputContainer{
		width: 90%;
		margin:auto;
		padding-bottom: 18px;
		//border:solid;
	}

	#errorMsg{
		color: rgba(255, 8, 12, 1.0);
	}

	#divErrorMsg{
		display:none;
		width: 87%;
		padding: 8px;
		border-radius: 5px;
		border:solid;
		border-width: 2px; 
		border-color: rgba(255, 57, 43, 1.0);
		background-color: rgba(255, 224, 224, 1.0);
	}
	
	.inputField{
		width:100%;
		height: 55px;
		font-size: 15px;
		border-radius: 5px;
		outline:none;
		margin-left:auto;
		margin-right:auto;
		border: none;
		background-color: rgba(255, 255, 255, 1.0);
	}
	
	.divInputContainer:hover{
		width:100%;
		transition-duration: 0.4s;
	}
	
	.divInputContainer:not(:hover){
		width: 90%;
		transition-duration: 0.4s;
	}
	
	.divLoginBtn{
		width: 90%;
		margin: auto;
		padding: 8px 7px 10px 8px;
		display: flex;
		justify-content: center;
		align-items: center;
		//border: solid;
	}
	
	.btnLogin{
		border-radius: 5px;
		border: none;
		background-color: rgba(146, 57, 0, 1.0);
		box-shadow: 5px 5px 5px grey;
		width: 65%;
		height: 50px;
		color: white;
		font-size: 20px;
		outline:none;
		transition-duration: 0.3s;
	}
	
	.btnLogin:hover{
		background-color: rgba(201, 111, 52, 1.0);
		cursor: pointer;
		transition-duration: 0.3s;
	}
	
	.divRemember{
		width: 90%;
		//border:solid;
		padding: 5px 7px 10px 8px;
		font-family: Arial;
		font-size:17px;
		font-weight: 50;
		margin: auto;
	}
	
	#remember{
		width: 17px;
		height: 17px;
		border-radius: 3px;
	}
	
	.divLink{
		width: 90%;
		padding: 5px 0px 5px 8px;
		//border:solid;
		margin:auto;
		font-family: Arial;
		font-size:17px;
		text-align: center;
	}
	
	.container-form i{
		margin-left: -30px;
		cursor: pointer;
	}
	
</style>
<?php
    //include "createTable.php";
	include "dbConnection.php";
?>

<div class = "divLogin">
<div class = "divLoginHeader"><h1 class = "loginHeader">Login</h1></div>
	<form method = "post">
		<div class = "divLoginContent"> 
			<div class = "divlbl"><label>Username / Email</label></div>
			
			<div class = "divInputContainer">
				<input class = "inputField" type="text" placeholder=" Username / Email" name="username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" required> <br/>
			</div>
			
			<div class = "divlbl">
				<label>Password</label> &nbsp &nbsp 
				
			</div> 
			<div class="container-form">
				<div class = "divInputContainer">
					<input class = "inputField" id = "password" type="password" placeholder=" Password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" required><i class="far fa-eye fa-eye-slash" id="togglePassword"></i>
					 <br/>
				</div>
			</div>
		</div>
		
		<div class = "divRemember">
			<div class = "divlbl" id = "divErrorMsg">
				<label id = "errorMsg">Invalid username or password </label>
			</div>
			
		</div>

		<div class = "divLoginBtn">
			<button class = "btnLogin" type="submit" name = "login">Login</button>  <br/><br/>
		</div>
	</form>
</div>
<script>

function displayError(){
	var errorMessage = document.getElementById("divErrorMsg");
	errorMessage.style.display = "block";
}
</script>

<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

<?php
	function random_strings($length_of_string) 
	{ 
	    // String of all numeric character 
	    $str_result = '123456789';
	  
	    // Shufle the $str_result and returns substring 
	    // of specified length 
	    return substr(str_shuffle($str_result), 0, $length_of_string); 
	} 
?>
<?php

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$queryCheck = mysqli_query($conn, "SELECT password FROM user WHERE userName = '$username'");
		
		$returnUserPass = mysqli_fetch_row($queryCheck);
		echo $returnUserPass;
		if($returnUserPass != null &&  $password == $returnUserPass[0]){
			$_SESSION['valid'] = true;
			$_SESSION['timestart'] = time();
			$_SESSION['username'] = $username; 
			
			header("location: composition.html");
		}
		else 
			echo 
			"<script type='text/javascript'>
				displayError();
			</script>
			";
	}
ob_end_flush();
	
?>
	

</body>
</html>
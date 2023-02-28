<?php

session_start();

    if(isset($_POST["submit"])){
        $captcha=$_POST["g-recaptcha-response"];
        $secretkey="6Lex9GQbAAAAAA5KoHhCR3srLPiN0VzkRJ-v-Xap";
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".urlencode($secretkey)."&response=".urlencode($captcha)." ";
        $response=file_get_contents($url);
        $responsekey=  json_decode($response,TRUE);
        if($responsekey["success"]){
			require 'config.php';
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password_repeat = $_POST['password_repeat'];
			
			$s = "select * from login where username = '$username'";
			
			$result = mysqli_query($conn, $s);
			
			$num = mysqli_num_rows($result);
			
			if($num == 1){
				echo "Username already taken";
				}else {
					$reg = "Insert into login(username,email,password,password_repeat) value ('$username' , '$email' , '$password' , '$password_repeat')";
					
					mysqli_query($conn, $reg);
					header('location:LoginSignUp.php');
					}
		}
		else
					{
						echo "Please verify that you are not a robot.";
						echo '<a href="LoginSignUp.php" target="_blank">Back</a>'; 
						}
						}
	
?>
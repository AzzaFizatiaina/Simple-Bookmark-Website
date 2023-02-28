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
			$password = $_POST['password'];
			
			$query = "SELECT username, password FROM login WHERE username=? AND password=? LIMIT 1";

           $stmt = $conn->prepare($query);
           $stmt -> bind_param("ss", $username, $password);
           $stmt -> execute();
           $stmt -> bind_result($username, $password);
           $stmt -> store_result();
			
			if($stmt->fetch())
			{
				header('location:index.php');
				}else{
					echo "User Not Found";
					}
					mysqli_close($conn);
					
					}
					else
					{
						echo "Please verify that you are not a robot.";
						echo '<a href="LoginSignUp.php" target="_blank">Back</a>'; 
						
						}
						}

	?>
	
	
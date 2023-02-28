<?php

 $book_web = $_POST['bweb'];
 $book_url = $_POST['burl'];
 $book_user= $_POST['userid'];

$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

$sql = "INSERT INTO bookmark(bweb,burl,userid) VALUES ('{$book_web}','{$book_url}','{$book_user}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location:index.php");

mysqli_close($conn);

?>

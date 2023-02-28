<?php

$book_id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM bookmark WHERE bid = {$book_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location:index.php");

mysqli_close($conn);

?>

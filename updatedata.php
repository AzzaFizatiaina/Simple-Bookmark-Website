<?php
$book_id = $_POST['bid'];
$book_web = $_POST['bweb'];
$book_url = $_POST['burl'];
include 'config.php';

$sql = "UPDATE bookmark SET bweb = '{$book_web}', burl = '{$book_url}' WHERE bid = {$book_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location:index.php");

mysqli_close($conn);

?>

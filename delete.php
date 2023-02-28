<?php include 'header.php';

if(isset($_POST['deletebtn'])){

include "config.php";
$book_id = $_POST['bid'];

$sql = "DELETE FROM bookmark WHERE bid = {$book_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: index.php");

mysqli_close($conn);

}
?>
<div id="main-content">
    <h2>Delete Bookmark</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>User Id</label>
            <input type="text" name="bid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>

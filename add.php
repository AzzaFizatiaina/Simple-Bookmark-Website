<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Bookmark</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="bweb" required>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="url" name="burl" required>
        </div>
		<div class="form-group">
            <label>User</label>
            <select name="userid" required>
                <option value="" selected disabled>Select User</option>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM login";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['userid']; ?>"><?php echo $row['username']; ?> ></option>

              <?php } ?>
            </select>
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>

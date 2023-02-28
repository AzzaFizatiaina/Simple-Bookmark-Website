<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Bookmark</h2>
    <?php
    include 'config.php';

    $book_id = $_GET['id'];

    $sql = "SELECT * FROM bookmark WHERE bid = {$book_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Title</label>
          <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>"/>
          <input type="text" name="bweb" value="<?php echo $row['bweb']; ?>"/>
      </div>
      <div class="form-group">
          <label>URL</label>
          <input type="url" name="burl" value="<?php echo $row['burl']; ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php
      }
    }
    ?>
</div>
</div>
</body>
</html>

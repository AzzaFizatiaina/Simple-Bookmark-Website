<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Bookmarks</h2>
    <?php
      include 'config.php';

      $sql = "SELECT * FROM bookmark JOIN login WHERE bookmark.userid = login.userid";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>User Id</th>
        <th>Title</th>
        <th>URL</th>
        <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
            <tr>
                <td><?php echo $row['bid']; ?></td>
                <td><?php echo $row['bweb'] ;?></td>
                <td><?php echo $row['burl']; ?></td>
				<td>
                    <a href='edit.php?id=<?php echo $row['bid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['bid']; ?>'>Delete</a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php }else{
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>

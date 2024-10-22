<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
  </head>
  <body>
    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <td>Pet id</td>
        <td>Pet Name</td>
        <td>Category</td>
        <td>Breed</td>
        <td>Description</td>
        <td>Image</td>
      </tr>
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id ASC");
      ?>

      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["category"]; ?></td>
        <td><?php echo $row["breed"]; ?></td>
        <td><?php echo $row["description"]; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width="200" title="<?php echo $row['image']; ?>"> </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="./">Upload Image File</a>
  </body>
</html>

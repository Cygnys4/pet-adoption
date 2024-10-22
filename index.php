<?php
require 'connection.php';

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $category = $_POST["category"];
  $breed = $_POST["breed"];
  $description = $_POST["description"];

  // Check if a file was uploaded and there are no errors.
  if($_FILES["image"]["error"] == 0){
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION); // Get file extension.
    $imageExtension = strtolower($imageExtension);

    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid() . '.' . $imageExtension;
      $uploadPath = 'img/' . $newImageName;

      if (move_uploaded_file($tmpName, $uploadPath)) {
        $query = "INSERT INTO tb_upload (name, category, breed, description, image) VALUES ('$name','$category','$breed','$description', '$newImageName')";
        mysqli_query($conn, $query);
        echo
        "
        <script>
          alert('Successfully Added');
          document.location.href = 'data.php';
        </script>
        ";
      } else {
        echo
        "
        <script>
          alert('Failed to upload image');
        </script>
        ";
      }
    }
  }
  else {
    echo
    "
    <script>
      alert('Image Upload Error');
    </script>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kartik">
    <title>Help a Pet</title>
    <link rel="stylesheet" href="./style3main.css">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Poppins:400,500i,900i|VT323&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
<header>
    <nav class="navbar" id="nav">
        <a class="item siteName" href="../index.html">CuddleCritter</a>
        <a class="item" href="../about.html">About</a>
        <a class="item" href="../animalList.html">Find a Dog</a>
        <a class="item" href="../Policy.html">Policy</a>
        <a class="item" href="../Success.html">Stories</a>
        <a class="item" href="../Resources.html">Resources</a>
        <a class="item icon" href="javascript:void(0);" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>

<div class="container">
  <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <label for="name">Name : </label>
    <input type="text" name="name" id="name" required> <br>
    <label for="description">Description : </label>
    <input type="text" name="description" id="description" required> <br>
    <label for="category">Category : </label>
    <input type="text" name="category" id="category" required> <br>
    <label for="breed">Breed : </label>
    <input type="text" name="breed" id="breed" required style="padding-bottom: 20px;"> <br>
    <label for="image">Image : </label>
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"> <br> <br>
    <button class="button" type="submit" name="submit">Submit</button>
    <a href="./data.php">Data</a>
  </form>

  <section class="dog-gif">
    <img id="dinner" src="./assets/dinner_time_dog.gif" alt="Dog GIF">
    <h1>Save an animal</h1>
  </section>
</div>

<footer>
  <h2>Adopting a pet means saving a life, gaining a loyal friend, and filling your home with unconditional love.</h2>
</footer>
<script>
  
</script>

</body>
</html>

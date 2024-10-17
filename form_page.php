<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pet Adoption Form</title>
</head>
<body>
    <h1>Pet Adoption Form</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $petType = $_POST["pet_type"];
        $comments = $_POST["comments"];

        // You can process the form data here (e.g., save to a database).

        // For this example, we'll just display the submitted data:
        echo "<h2>Thank you for your adoption request!</h2>";
        echo "<p>Name: " . $name . "</p>";
        echo "<p>Email: " . $email . "</p>";
        echo "<p>Pet Type: " . $petType . "</p>";
        echo "<p>Comments: " . $comments . "</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="pet_type">Type of Pet:</label>
        <select name="pet_type">
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="comments">Comments:</label>
        <textarea name="comments" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

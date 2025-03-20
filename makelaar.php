<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Details</title>
</head>
<body>
<?php

$id = $_GET['id'];

$db = new PDO("mysql:host=localhost;dbname=makelaar", "root", "");

$query = $db->prepare("SELECT * FROM houses WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$house = $query->fetch();

if ($house) {
    echo "<div>";
    echo "<h1>Details for House " . $house["id"] . "</h1>";
    echo "<p>Type: " . $house["house_type"] . "</p>";
    echo "<p>Street: " . $house["street"] . " " . $house["house_number"] . "</p>";
    echo "<p>Price: " . $house["price"] . "</p>";
    echo "</div>";
} else {
    echo "<p>House not found.</p>";
}
?>

<form action="" method="post">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

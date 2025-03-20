<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses List</title>
</head>
<body>
<?php
$db = new PDO("mysql:host=localhost;dbname=makelaar", "root", "");

$query = $db->prepare("SELECT * FROM houses");

$query->execute();

$houses = $query->fetchAll();

echo "<div>";

foreach ($houses as $house) {
    echo "<div>";
    echo $house["house_type"] . "<br>" . $house["street"] . "<br>" . $house["house_number"] . "<br>" . $house["price"] . "<br>";
    echo "<a href='makelaar.php?id=" . $house["id"] .  "'>More details</a>";
    echo "</div>";
}

echo "</div>";

?>
</body>
</html>

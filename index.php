<!DOCTYPE html>
<html>
<body>
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Pokestop Name</th><th>Lat</th><th>Lon</th><th>Image URL</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "rdmuser";
$password = "YourStrongPassword";
$dbname = "rdmdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT `name`, `lat`, `lon`, `url` FROM pokestop WHERE `quest_pokemon_id` = '349' AND `quest_rewards` LIKE '%true%' ORDER BY `name` ASC;");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<input type="button" value="Reload Page" onClick="window.location.reload()">

</body>
</html>

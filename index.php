<!--
    I've attempted to explain each part as best as I could if you need assistance feel free to tweet me @xRockes and I'll try my best to assist you.
    Cheers
-->
<title>Title goes here</title>

<?php
$name = "Put your MySQL Server here";
$username = "username";
$password = "password";
$dbname = "name for database";

// Create connection
$conn = new mysqli($name, $username, $password, $dbname); // lets connect to your mySQL Database
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // if connection fails lets kill it
} 

$sql = "SELECT  *  FROM ontime_players ORDER BY playtime DESC LIMIT 10"; // Change 10 to however many results you want
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output the data to tables from each row
    echo "<body><center><table cellspacing='0'><thead><tr><th>Player Name</th><th>Total Time</th></tr></thead><tbody><tr>";
    while($row = $result->fetch_assoc()) {
       echo "<td><img src='https://minotar.net/bust/".$row["playerName"]."/30.png' /> ".$row["playerName"]."</td><td>".gmdate("j \d\a\y\s H:i:s", $row["playtime"] / 1000 )."</td></tr></body>";

    }
} else {
    echo "0 results";
}
       echo "</tbody></table>";
$conn->close();  // Close the connection 
?>

<!-- Please do not remove this footer -->

<footer>
<p style="float:right;">Created by <a href="http://twitter.com/">Rockes</a> for OnTime</p>
</footer>

<?php
$servername = "mysqlhost";
$username = "root";
$password = "1234";
$dbname = "userdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname,lastname,age FROM user where age=20";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
?>
    <table border='2' style='text-align:center; margin-left:100px'>
        <tr>
            <th>ID</th>
            <th>firstname</th>
            <th>Lastname</th>
            <th>Age</th>
        </tr>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["firstname"] ?></td>
            <td><?php echo $row["lastname"] ?></td>
            <td><?php echo $row["age"] ?></td>
        </tr>
    </table>
<?php

  }
} else {
  echo "0 results";
}
$conn->close();
?>

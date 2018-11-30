<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$s = $_POST['start_date'];
$e = $_POST['end_date'];

$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "criminal_records";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, null, '/cloudsql/criminal-facebook:us-central1:criminal-database');

// Check connection
if ($conn->connect_error) {
    echo 'Failed to connect';
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$query = "select * from crime where date_committed > '".$s."' and date_committed < '".$e."'";
$result = mysqli_query($conn,$query);

echo "<table border='1'>
<tr>
<th>Type</th>
<th>Criminal ID</th>
<th>Date Committed</th>
<th>Crime ID</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['criminalID'] . "</td>";
    echo "<td>" . $row['date_committed'] . "</td>";
    echo "<td>" . $row['crimeID'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>
</body>
</html>

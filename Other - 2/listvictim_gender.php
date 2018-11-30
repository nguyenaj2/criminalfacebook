<!DOCTYPE html>
<html>
<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
}
</script>
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

$query = "select * from person natural join victim where sex = '".$_POST['sex']."'";
$result = mysqli_query($conn,$query);


echo "<table border='1'>
<tr>
<th>SSN</th>
<th>Name</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ssn'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>

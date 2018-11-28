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
$q = $_POST["criminalID"];

$sql = new mysqli('127.0.0.1',
    'user',
    'password',
    'criminal_records',
    null,
    '/cloudsql/criminal-facebook:us-central1:criminal-database'
);

$query = "Select type, date_committed, crimeID from crime natural join criminal where criminalID = '".$q."'";
$result = mysqli_query($sql, $query);
 

echo "<table>
<tr>
<th>Crime</th>
<th>Date Committed</th>
<th>Crime ID</th>
</tr>";

while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo "<tr>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['date_committed'] . "</td>";
    echo "<td>" . $row['crimeID'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$sql->close();
?>
</body>
</html>

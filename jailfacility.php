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
$q = $_POST["facilityID"];

$sql = new mysqli('127.0.0.1',
    'user',
    'password',
    'criminal_records',
    null,
    '/cloudsql/criminal-facebook:us-central1:criminal-database'
);

$query = "Select ssn, name, criminalID from criminal natural join jail_facility where facilityID = '".$q."'";
$result = mysqli_query($sql, $query);
 

echo "<table>
<tr>
<th>SSN</th>
<th>Name</th>
<th>Criminal ID</th>
</tr>";

while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo "<tr>";
    echo "<td>" . $row['ssn'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['criminalID'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$sql->close();
?>
</body>
</html>
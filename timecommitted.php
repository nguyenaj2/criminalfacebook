<head>
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

$query = "select datediff(now(), (select max(date_committed) from crime where criminalID = '".$q."')) as difference";
$result = mysqli_query($sql, $query);
$data = mysqli_fetch_assoc($result);
$value = $data['difference'];
echo $value;

/*echo "<script type = 'text/javascript'>alert(<?php echo $result; ??>);</script>";*/

$sql->close();
?>
</body>
</html>

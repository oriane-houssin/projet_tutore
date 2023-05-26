<?php

$dbhost='localhost';
$dbuser='root';
$dbpass='';
$conn=mysqli_connect($dbhost,$dbuser ,$dbpass);

if(!$conn){
    die('Could not connect : ' . mysqli_error($conn));
}
//echo 'Connected successfully<br/>';
$retval= mysqli_select_db($conn, 'projet_tutore');
if(!$retval){
    die('Could not select database :' . mysqli_error($conn));
}
//echo "Database gestion_cours selected successfully\n";
// $mysqli->close();

$bdd = new PDO(
    'mysql:host=localhost;dbname=projet_tutore;charset=utf8',
    'root',
    ''
);

?>
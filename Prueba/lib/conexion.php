<?php
$host='localhost';
$user = 'root';
$password='';
$puerto =3306;
$dbname = 'medicos';

$con = new mysqli($host,$user,$password,$dbname,$puerto)
    or die ('Could not connet to the database server').mysqli_connect_error();

?>
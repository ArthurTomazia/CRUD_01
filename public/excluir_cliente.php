<?php

include '../infra/connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM cliente WHERE id='$id'";
$query = mysqli_query($conn, $sql);

header ('location:cliente.php');
?>
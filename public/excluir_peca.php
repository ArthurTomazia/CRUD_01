<?php

include '../infra/connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM peca WHERE id = '$id'";
$query = mysqli_query($conn, $sql);


header('Location:peca.php');
?>
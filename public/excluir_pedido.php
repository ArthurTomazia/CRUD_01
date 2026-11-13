<?php 

include '../infra/connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM pedido WHERE id='$id'";
$query = mysqli_query($conn, $sql);

header('Location:home.php');

?>
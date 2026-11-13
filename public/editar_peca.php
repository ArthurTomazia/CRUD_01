<?php

include '../infra/connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM peca WHERE id ='$id'";
$resultado = mysqli_query($conn, $sql);
$peca = $resultado -> fetch_assoc();

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];

    $sql1 = "UPDATE peca SET nome = '$nome' WHERE id = '$id'";
    $query = mysqli_query($conn, $sql1);
    
    header('Location:peca.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar peça</title>
</head>
<body>
    
    <form method="POST">

        <label for="nome">Nome:</label>
        <br>
        <input type="text" name="nome" placeholder="<?php echo $peca['nome']; ?>">
        <br>
        <button type="submit">Editar</button>
    </form>

</body>
</html>
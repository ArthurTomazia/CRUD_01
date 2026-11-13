<?php
include '../infra/connect.php';

    $id = $_GET['id'];
    $sql1 = "SELECT * FROM cliente WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql1);
    $cliente = $resultado -> fetch_assoc();

if($_SERVER['REQUEST_METHOD']==="POST"){
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE cliente  SET nome='$nome', senha='$senhaHash' WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    header('Location:cliente.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar cliente</title>
</head>
<body>
    
    <form method="POST">

        <label for="nome">Nome:</label>
        <br>
        <input type="text" name="nome" placeholder="<?php echo $cliente['nome'] ?>">
            <br>
        <label for="senha">Senha:</label>
        <br>
        <input type="text" name="senha">
            <br>
        <button type="submit">Editar</button>
    </form>


</body>
</html>
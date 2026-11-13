<?php

include '../infra/connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO cliente (nome, senha) VALUES ('$nome', '$senhaHash')";

mysqli_query($conn, $sql);

header('Location:cliente.php');
exit();

}

$sql = "SELECT * FROM cliente";
$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    
    <form method="POST">

        <label for="nome">Nome:</label>
        <br>
        <input type="text" name="nome">
            <br>
        <label for="senha">Senha:</label>
        <br>
        <input type="text" name="senha">
        <br><br>
        <button type="submit">Cadastrar</button>
        <br>
    </form>

    <br><br>

    <table border=1>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Senha</td>
                <td>Ações</td>
            </tr>
        </thead>

        <tbody>
            <?php while($cliente = $resultado -> fetch_assoc()){ ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['senha']; ?></td>
                <td>
                    <button><a href="editar_cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a></button>
                    <button><a href="excluir_cliente.php?id=<?php echo $cliente['id']; ?>">Excluir</a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <button><a href="home.php">Sair</a></button>

</body>
</html>
<?php

include '../infra/connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];

$sql = "INSERT INTO peca (nome) VALUES ('$nome')";

mysqli_query($conn, $sql);

header('Location:peca.php');
exit();
}

$sql = "SELECT * FROM peca";
$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peças</title>
</head>
<body>
    
    <form method="POST">

        <label for="nome">Nome:</label>
        <br>
        <input type="text" name="nome">
         <br><br>
        <button type="submit">Cadastrar</button>
        
    </form>

    <br><br>
    
    <table border=1>

        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Ações</td>
            </tr>
        </thead>

        <tbody>
            <?php while($peca = $resultado ->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $peca['id']; ?></td>
                <td><?php echo $peca['nome']; ?></td>
                <td>
                    <button><a href="editar_peca.php?id= <?php echo $peca['id']; ?>">Editar</a></button>
                    <button><a href="excluir_peca.php?id= <?php echo $peca['id']; ?>">Excluir</a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

    <br><br>
    <button><a href="home.php">Voltar</a></button>

</body>
</html>
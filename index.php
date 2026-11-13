<?php

include 'infra/connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];


    $sql = "SELECT * FROM cliente WHERE nome = '$nome'";
    $resultado = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    $verificar = password_verify($senha, $usuario['senha']);
        if($verificar){
            header('Location:public/home.php');
        }else{
            echo "senha ou usuário incorreto";
        }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    
    <form method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome">
            <br>
        <label for="senha">Senha</label>
        <input type="text" name="senha">
            <br>
        <button type="submit">Logar</button>

    </form>

</body>
</html>
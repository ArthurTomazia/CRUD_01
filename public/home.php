<?php

include '../infra/connect.php';

$sql = "SELECT * FROM pedido";
$resultado = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pedidos</title>
</head>
<body>
    
    <table border=1>
        <thead>
            <tr>
                <td>ID</td>
                <td>Data</td>
                <td>Cliente</td>
                <td>Peça</td>
                <td>Ações</td>
            </tr>
        </tread>

        <tbody>
            <?php while($pedido = $resultado ->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $pedido['id']; ?></td>
                <td><?php echo $pedido['data_pedido']; ?></td>

                <td><?php 
                
                    $id_cliente = $pedido['id_cliente'];

                    $sql1 = "SELECT * FROM cliente WHERE id = '$id_cliente'";
                    $resultado1 = mysqli_query($conn, $sql1);
                    $cliente = $resultado1 -> fetch_assoc();

                    echo $pedido['id_cliente'] . ' - ' . $cliente['nome']; 

                ?></td>

                <td><?php
                    
                    $id_peca = $pedido['id_peca'];

                    $sql2 = "SELECT * FROM peca WHERE id = '$id_peca'";
                    $resultado2 = mysqli_query($conn, $sql2);
                    $peca = $resultado2 -> fetch_assoc();
                    
                    echo $pedido['id_peca'] . ' - ' . $peca['nome'];

                ?></td>
                <td>
                    <button><a href="editar_pedido.php? id= <?php echo $pedido['id']; ?>">Editar</a></button>
                    <button><a href="excluir_pedido.php? id= <?php echo $pedido['id'];   ?>">Excluir</a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>
        <button><a href="pedido.php">Criar Pedido</a></button>
    <br><br>
        <button><a href="cliente.php">Adicionar Cliente</a></button>
        <button><a href="peca.php">Adicionar Peça</a></button>
    <br><br>
        <button><a href="../index.php">Sair</a></button>

</body>
</html>
<?php 

include '../infra/connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $peca = $_POST['peca'];

    $sql = "INSERT INTO pedido (data_pedido, id_cliente, id_peca) VALUES ('$data', '$cliente', '$peca')";
    $query = mysqli_query($conn, $sql);

    header('Location:home.php');
}

$sql1 = "SELECT * FROM cliente";
$resultado_cliente = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM peca";
$resultado_peca = mysqli_query($conn, $sql2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar pedido</title>
</head>
<body>
    
    <form method="POST">

            <br>
        <label for="data">Data:</label>
            <br>
        <input type="date" name="data">
            <br>
        <label for="cliente">Cliente:</label>
            <br>
        <select name="cliente" name="cliente">
            <option value="">...</option>
            <?php while($cliente = $resultado_cliente -> fetch_assoc()){ ?>
            <option value="<?php echo $cliente['id']; ?>"> <?php echo $cliente['nome']; ?> </option>
            <?php } ?>
        </select>
            <br>
        <label for="peca">Peça</label>
            <br>
        <select name="peca" name="peca">
            <br>
            <option value="">...</option>
            <?php while($peca = $resultado_peca -> fetch_assoc()){ ?>
            <option value=" <?php echo $peca['id'] ?> "> <?php echo $peca['nome'] ?> </option>
            <?php } ?>
        </select>
            <br><br>
        <button type="submit">Criar</button>
    </form>

</body>
</html>


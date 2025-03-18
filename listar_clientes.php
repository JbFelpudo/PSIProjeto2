<?php
include 'config.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$sql = "SELECT * FROM clientes ORDER BY nome";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Clientes Cadastrados</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
            </tr>
            <?php while ($cliente = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['email'] ?></td>
                <td><?= $cliente['telefone'] ?></td>
                <td><?= $cliente['endereco'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
<?php include 'includes/footer.php'; ?>
<?php
include 'config.php';
include 'includes/header.php';
include 'includes/sidebar.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = $conn->prepare("SELECT * FROM equipamentos WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $resultado = $sql->get_result();
    
    if ($resultado->num_rows > 0) {
        $equipamento = $resultado->fetch_assoc();
    } else {
        die("Equipamento não encontrado!");
    }
    $sql->close();
}

// Se o formulário for enviado, atualiza os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];

    $sql = $conn->prepare("UPDATE equipamentos SET nome=?, marca=?, modelo=?, numero_serie=? WHERE id=?");
    $sql->bind_param("ssssi", $nome, $marca, $modelo, $numero_serie, $id);

    if ($sql->execute()) {
        echo "<script>alert('Equipamento atualizado com sucesso!'); window.location='listar_equipamentos.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
    $sql->close();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamento</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Editar Equipamento</h2>
        <form method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($equipamento['nome']) ?>" required>

            <label>Marca:</label>
            <input type="text" name="marca" value="<?= htmlspecialchars($equipamento['marca']) ?>" required>

            <label>Modelo:</label>
            <input type="text" name="modelo" value="<?= htmlspecialchars($equipamento['modelo']) ?>" required>

            <label>Número de Série:</label>
            <input type="text" name="numero_serie" value="<?= htmlspecialchars($equipamento['numero_serie']) ?>" required>

            <button type="submit">Atualizar</button>
        </form>
    </div>

</body>
</html>
<?php include 'includes/footer.php'; ?>

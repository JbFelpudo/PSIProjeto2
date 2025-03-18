<?php
include 'config.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST["nome"]);
    $marca = $conn->real_escape_string($_POST["marca"]);
    $modelo = $conn->real_escape_string($_POST["modelo"]);
    $numero_serie = $conn->real_escape_string($_POST["numero_serie"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);

    // Insere o novo equipamento na base de dados
    $sql = "INSERT INTO equipamentos (nome, marca, modelo, numero_serie, descricao) 
            VALUES ('$nome', '$marca', '$modelo', '$numero_serie', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Equipamento registrado com sucesso!'); window.location='listar_equipamentos.php';</script>";
    } else {
        echo "Erro ao registrar equipamento: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Equipamento</title>
    <link rel="stylesheet" href="styles.css"> <!-- Certifica-te de que o ficheiro CSS está ligado -->
</head>
<body>

    <div class="content">
        <h2>Registrar Novo Equipamento</h2>

        <form method="POST" class="form-box">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Marca:</label>
            <input type="text" name="marca" required>

            <label>Modelo:</label>
            <input type="text" name="modelo" required>

            <label>Número de Série:</label>
            <input type="text" name="numero_serie" required>

            <label>Descrição:</label>
            <textarea name="descricao" rows="5" required></textarea>

            <button type="submit">Registrar Equipamento</button>
        </form>
    </div>

</body>
</html>
<?php include 'includes/footer.php'; ?>
<?php
include 'config.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST["nome"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $telefone = $conn->real_escape_string($_POST["telefone"]);
    $endereco = $conn->real_escape_string($_POST["endereco"]);

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $telefone, $endereco);

    if ($stmt->execute()) {
        echo "<script>alert('Cliente cadastrado com sucesso!'); window.location='cadastrar_cliente.php';</script>";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Cadastrar Cliente</h2>
        <form method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Telefone:</label>
            <input type="text" name="telefone">

            <label>Endereço:</label>
            <textarea name="endereco"></textarea>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>
<?php include 'includes/footer.php'; ?>
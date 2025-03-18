<?php
include 'config.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Se o formulário for enviado, armazena os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST["nome"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $comentario = $conn->real_escape_string($_POST["comentario"]);

    $sql = "INSERT INTO feedback (nome, email, comentario) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $comentario);

    if ($stmt->execute()) {
        echo "<script>alert('Obrigado pelo seu feedback!'); window.location='feedback.php';</script>";
    } else {
        echo "Erro ao enviar feedback: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Deixe seu Feedback</h2>
        <form method="POST" class="form-box">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Comentário:</label>
            <textarea name="comentario" rows="5" required></textarea>

            <button type="submit">Enviar Feedback</button>
        </form>
    </div>

</body>
</html>
<?php include 'includes/footer.php'; ?>
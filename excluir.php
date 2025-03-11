<?php
include 'config.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    die("ID da manutenção não especificado.");
}

$id = $_GET['id'];

$sql = "DELETE FROM manutencoes WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Manutenção excluída com sucesso!'); window.location.href='listar.php';</script>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}

$conn->close();
?>

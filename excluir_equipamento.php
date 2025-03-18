<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Usando consulta preparada para evitar SQL Injection
    $sql = $conn->prepare("DELETE FROM equipamentos WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        echo "<script>alert('Equipamento excluído com sucesso!'); window.location='listar_equipamentos.php';</script>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }

    $sql->close();
} else {
    echo "ID não fornecido.";
}

$conn->close();
?>

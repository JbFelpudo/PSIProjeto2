<?php
include 'includes/header.php';
include 'config.php';
include 'includes/sidebar.php';

if (!isset($_GET['id'])) {
    die("ID da manutenção não especificado.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM manutencoes WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Manutenção não encontrada.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Manutenção</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc; background-color: #f9f9f9; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px; width: 100%; background: green; color: white; border: none; cursor: pointer; }
        button:hover { background: darkgreen; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Editar Manutenção</h2>

    <form action="processa_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <label>Equipamento:</label>
        <input type="text" name="equipamento" value="<?= $row['equipamento'] ?>" required>

        <label>Descrição do Problema:</label>
        <textarea name="problema" required><?= $row['problema'] ?></textarea>

        <label>Técnico Responsável:</label>
        <input type="text" name="tecnico" value="<?= $row['tecnico_responsavel'] ?>">

        <label>Data de Início:</label>
        <input type="date" name="data_inicio" value="<?= $row['data_inicio'] ?>" required>

        <label>Status:</label>
        <select name="status">
            <option value="Pendente" <?= ($row['status'] == 'Pendente') ? 'selected' : '' ?>>Pendente</option>
            <option value="Em Andamento" <?= ($row['status'] == 'Em Andamento') ? 'selected' : '' ?>>Em Andamento</option>
            <option value="Concluído" <?= ($row['status'] == 'Concluído') ? 'selected' : '' ?>>Concluído</option>
        </select>

        <button type="submit">Salvar Alterações</button>
    </form>

</body>
</html>

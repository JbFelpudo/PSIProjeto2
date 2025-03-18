<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Manutenções</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'includes/header.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <div class="content">
        <h2>Lista de Manutenções</h2>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Equipamento</th>
                <th>Problema</th>
                <th>Técnico</th>
                <th>Data Início</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>

            <?php
            $sql = "SELECT * FROM manutencoes ORDER BY data_inicio DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['equipamento']}</td>
                            <td>{$row['problema']}</td>
                            <td>{$row['tecnico_responsavel']}</td>
                            <td>{$row['data_inicio']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='editar.php?id={$row['id']}' class='btn btn-editar'>Editar</a>
                                <a href='excluir.php?id={$row['id']}' class='btn btn-excluir' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhuma manutenção encontrada.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>

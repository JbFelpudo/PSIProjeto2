<?php
include 'config.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Manutenções</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
        }
        .btn-editar {
            background-color: blue;
        }
        .btn-excluir {
            background-color: red;
        }
    </style>
</head>
<body>

    <h2>Lista de Manutenções</h2>

    <table>
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

</body>
</html>

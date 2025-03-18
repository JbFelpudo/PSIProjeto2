<?php
// Conexão com a base de dados
include 'config.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Consulta para buscar os equipamentos
$sql = "SELECT id, nome, marca, modelo, numero_serie, descricao FROM equipamentos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipamentos</title>
    <link rel="stylesheet" href="styles.css"> <!-- Certifica-te de que o ficheiro CSS está ligado -->
</head>
<body>

<div class="content">
    <h2>Lista de Equipamentos</h2>

    <a href="adicionar_equipamento.php" class="btn-adicionar">Adicionar Equipamento</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Número de Série</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['marca']}</td>
                            <td>{$row['modelo']}</td>
                            <td>{$row['numero_serie']}</td>
                            <td>{$row['descricao']}</td>
                            <td>
                                <a href='editar_equipamento.php?id={$row['id']}' class='editar'>Editar</a>
                                <a href='excluir_equipamento.php?id={$row['id']}' class='excluir' onclick='return confirm(\"Tem certeza que deseja excluir este equipamento?\")'>Excluir</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhum equipamento encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


</body>
</html>
<?php include 'includes/footer.php'; ?>
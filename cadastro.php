<?php 
include 'includes/header.php';
include 'config.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Manutenção</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        form {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: darkblue;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Cadastro de Manutenção</h2>
    
    <form action="processa_cadastro.php" method="POST">
        <label for="equipamento">Equipamento:</label>
        <input type="text" name="equipamento" required>

        <label for="problema">Descrição do Problema:</label>
        <textarea name="problema" required></textarea>

        <label for="tecnico">Técnico Responsável:</label>
        <input type="text" name="tecnico">

        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" required>

        <label for="status">Status:</label>
        <select name="status">
            <option value="Pendente">Pendente</option>
            <option value="Em Andamento">Em Andamento</option>
            <option value="Concluído">Concluído</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>

<?php include 'includes/footer.php'; ?>
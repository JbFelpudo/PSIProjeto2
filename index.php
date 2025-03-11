<?php
include 'config.php';
include 'includes/header.php';

// Contar o número total de manutenções
$sqlTotal = "SELECT COUNT(*) as total FROM manutencoes";
$resultTotal = $conn->query($sqlTotal);
$totalManutencoes = ($resultTotal->num_rows > 0) ? $resultTotal->fetch_assoc()['total'] : 0;

// Contar manutenções pendentes
$sqlPendentes = "SELECT COUNT(*) as pendentes FROM manutencoes WHERE status='Pendente'";
$resultPendentes = $conn->query($sqlPendentes);
$totalPendentes = ($resultPendentes->num_rows > 0) ? $resultPendentes->fetch_assoc()['pendentes'] : 0;

// Contar manutenções concluídas
$sqlConcluidas = "SELECT COUNT(*) as concluidas FROM manutencoes WHERE status='Concluído'";
$resultConcluidas = $conn->query($sqlConcluidas);
$totalConcluidas = ($resultConcluidas->num_rows > 0) ? $resultConcluidas->fetch_assoc()['concluidas'] : 0;

$conn->close();
?>

<div class="container">
    <h1>Bem-vindo ao Sistema de Gestão de Manutenção</h1>

    <div class="box total">
        <h2>Total de Manutenções</h2>
        <p><?= $totalManutencoes ?></p>
    </div>

    <div class="box pendentes">
        <h2>Manutenções Pendentes</h2>
        <p><?= $totalPendentes ?></p>
    </div>

    <div class="box concluidas">
        <h2>Manutenções Concluídas</h2>
        <p><?= $totalConcluidas ?></p>
    </div>

    <a href="listar.php" class="link">Ver Lista de Manutenções</a>
    <a href="cadastro.php" class="link">Cadastrar Nova Manutenção</a>
</div>

<?php include 'includes/footer.php'; ?>

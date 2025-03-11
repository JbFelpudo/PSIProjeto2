<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipamento = $_POST['equipamento'];
    $problema = $_POST['problema'];
    $tecnico = $_POST['tecnico'];
    $data_inicio = $_POST['data_inicio'];
    $status = $_POST['status'];

    $sql = "INSERT INTO manutencoes (equipamento, problema, tecnico_responsavel, data_inicio, status) 
            VALUES ('$equipamento', '$problema', '$tecnico', '$data_inicio', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Manutenção cadastrada com sucesso!'); window.location.href='cadastro.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
    
    $conn->close();
} else {
    header("Location: cadastro.php");
}
?>

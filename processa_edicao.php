<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $equipamento = $_POST['equipamento'];
    $problema = $_POST['problema'];
    $tecnico = $_POST['tecnico'];
    $data_inicio = $_POST['data_inicio'];
    $status = $_POST['status'];

    $sql = "UPDATE manutencoes SET 
                equipamento='$equipamento', 
                problema='$problema', 
                tecnico_responsavel='$tecnico', 
                data_inicio='$data_inicio', 
                status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Manutenção atualizada com sucesso!'); window.location.href='listar.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: listar.php");
}
?>

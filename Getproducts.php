<?php
include 'cnn.php'; // Inclui a conexão com o banco de dados

try {
    // Consulta SQL para buscar os registros
    $sql = "SELECT * FROM coffee;";
    $registos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os dados como JSON
    header('Content-Type: application/json');
    echo json_encode($registos, JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    // Retorna um erro em formato JSON, se houver
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}
?>
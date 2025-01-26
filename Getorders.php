<?php
include 'cnn.php';
$sql = "select * from orders;";
$registos = $pdo->query($sql)->fetchAll();
echo json_encode($registos);
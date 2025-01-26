<?php
include 'cnn.php';

$sql = 'select * from client;';

try {

    $registos = $pdo->query($sql)->fetchAll();

} catch (PDOException $ERRO) {

    $registos = ['msg' => $erro->getMessage()];
}

echo json_encode($registos);




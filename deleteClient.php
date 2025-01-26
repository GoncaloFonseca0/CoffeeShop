<?php
include 'cnn.php';


$reposta = ['msg' => false];

try {

    $sql = "delete from client where id_client = ?;";
    if (isset($_REQUEST['id_client'])) {
        $id_client = intval($_REQUEST['id_client']);
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_client]);
        $total = $stmt->rowCount();
        if ($total > 0) {
            $resposta['msg'] = true;

        } else {
            $resposta['msg'] = "Integridade referencial violada";
        }

    }

} catch (Exception $erro) {

    $resposta['msg'] = $erro->getMessage();


} finally {

    echo json_encode($resposta);
    //header('location:test.html');
}
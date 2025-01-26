<?php

include 'cnn.php';
$resposta = ['msg' => false];
try {

    if (isset($_REQUEST['Name']) && $_REQUEST['Email'] && $_REQUEST['TELEPHONE'] && $_REQUEST['ADDRESS'] && $_REQUEST['Password'])
        $Name = strval($_REQUEST['Name']);
    $Email = strval($_REQUEST['Email']);
    $TELEPHONE = ($_REQUEST['TELEPHONE']);
    $ADDRESS = strval($_REQUEST['ADDRESS']);
    $Password = strval($_REQUEST['Password']);
    $sql = "insert into client(Name, Email, TELEPHONE, ADDRESS, Password)
values (:Name, :Email, :TELEPHONE,:ADDRESS,:Password);";

    $stmt = $pdo->prepare($sql);
    $ok = $stmt->execute([':Name' => $Name, ':Email' => $Email, ':TELEPHONE' => $TELEPHONE, ':ADDRESS' => $ADDRESS, ':Password' => $Password]);
    $resposta['msg'] = $ok;
} catch (Exception $erro) {
    $resposta['msg'] = $erro->getMessage();

} finally {
    echo json_encode($resposta);

}
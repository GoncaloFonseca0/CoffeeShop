<?php
include 'cnn.php';

$response = [];
$execArray = [];


if (isset($_REQUEST['id_client'])) {
    $id_client = $_REQUEST['id_client'];
    $execArray[':id_client'] = $id_client;
} else {
    $response['msg'] = "ID do cliente não fornecido.";
    echo json_encode($response);
    die();
}

if (isset($_REQUEST['Name'])) {
    $execArray[':Name'] = $_REQUEST['Name'];
} else {
    $execArray[':Name'] = null;
}

if (isset($_REQUEST['Email'])) {
    $execArray[':Email'] = $_REQUEST['Email'];
} else {
    $execArray[':Email'] = null;
}

if (isset($_REQUEST['TELEPHONE'])) {
    $execArray[':TELEPHONE'] = $_REQUEST['TELEPHONE'];
} else {
    $execArray[':TELEPHONE'] = null;
}

if (isset($_REQUEST['ADDRESS'])) {
    $execArray[':ADDRESS'] = $_REQUEST['ADDRESS'];
} else {
    $execArray[':ADDRESS'] = null;
}

if (isset($_REQUEST['Password']) && !empty($_REQUEST['Password'])) {
    $execArray[':Password'] = password_hash($_REQUEST['Password'], PASSWORD_DEFAULT);
} else {
    $execArray[':Password'] = null;
}

try {
    $sql = 'UPDATE client SET
                Name = :Name,
                Email = :Email,
                TELEPHONE = :TELEPHONE,
                ADDRESS = :ADDRESS,
                Password = :Password 
                where id_client = :id_client';

    $stmt = $pdo->prepare($sql);
    $stmt->execute($execArray);

    if ($stmt->rowCount() > 0) {
        $response['msg'] = "ok";
    } else {
        $response['msg'] = "Nenhuma alteração realizada.";
    }
} catch (PDOException $e) {
    $response['msg'] = $e->getMessage();
}

//echo json_encode($execArray);
//echo json_encode($sql);
echo json_encode($response);

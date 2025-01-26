<?php
include 'cnn.php';

$response = [];
$execArray = [];

if (isset($_POST['id_client'])) {
    $id_client = $_POST['id_client'];
    $execArray[':id_client'] = $id_client;
} else {
    $response['msg'] = "ID do cliente não fornecido.";
    echo json_encode($response);
    die();
}

if (isset($_POST['Name'])) {
    $execArray[':Name'] = $_POST['Name'];
} else {
    $execArray[':Name'] = null;
}

if (isset($_POST['Email'])) {
    $execArray[':Email'] = $_POST['Email'];
} else {
    $execArray[':Email'] = null;
}

if (isset($_POST['TELEPHONE'])) {
    $execArray[':TELEPHONE'] = $_POST['TELEPHONE'];
} else {
    $execArray[':TELEPHONE'] = null;
}

if (isset($_POST['ADDRESS'])) {
    $execArray[':ADDRESS'] = $_POST['ADDRESS'];
} else {
    $execArray[':ADDRESS'] = null;
}

if (isset($_POST['Password']) && !empty($_POST['Password'])) {
    $execArray[':Password'] = password_hash($_POST['Password'], PASSWORD_DEFAULT);
} else {
    $execArray[':Password'] = null;
}

try {
    $sql = 'UPDATE client SET 
                Name = :Name,
                Email = :Email,
                TELEPHONE = :TELEPHONE,
                ADDRESS = :ADDRESS';

    if ($execArray[':Password']) {
        $sql .= ', Password = :Password';
    }

    $sql .= ' WHERE id_client = :id_client';

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

echo json_encode($response);

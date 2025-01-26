<?php
include 'cnn.php';
//$boss = null;
$temimagem = false;
$execArray = [];
$resposta = [];

if (isset($_REQUEST['ProductID'])) {
    $idcli = $_REQUEST['ProductID'];
    $execArray[':ProductID'] = $ProductID;
} else {
    $resposta['msg'] = "nao existe";
    die();
}

if (isset($_REQUEST['ProductName'])) {
    $nome = $_REQUEST['ProductName'];
    $execArray[':ProductName'] = $ProductName;
} else
    $execArray[':ProductName'] = null;

if (isset($_REQUEST['Description'])) {
    $boss = $_REQUEST['Description'];
    $execArray[':Description'] = $Description;
} else
    $execArray[':Description'] = null;

if (isset($_REQUEST['Price'])) {
    $categoria = $_REQUEST['Price'];
    $execArray[':Price'] = $Price;
} else
    $execArray[':Price'] = null;

if (isset($_REQUEST['Stock'])) {
    $datanasc = $_REQUEST['Stock'];
    $execArray[':Stock'] = $Stock;
} else
    $execArray[':Stock'] = null;

if (isset($_REQUEST['Strength'])) {
    $email = $_REQUEST['Strength'];
    $execArray[':Strength'] = $Strength;
} else
    $execArray[':Strength'] = null;
if (isset($_REQUEST['password'])) {
    $password = password_hash(htmlspecialchars($_REQUEST['password']), PASSWORD_DEFAULT);
    $execArray[':password'] = $password;
} else
    $execArray[':password'] = null;

if (isset($_FILES['fich']['type'])) {
    $tipo = $_FILES['fich']['type'];
    $resposta['tipo'] = $tipo;
    preg_match("/image/", $tipo, $matches);
    $temimagem = count($matches) > 0;
    if ($temimagem)
        $resposta['temimagem'] = "sim";
    else
        $resposta['temimagem'] = "nao";

}

if (isset($_FILES['fich']['name']) && $temimagem) {
    $foto = $_FILES['fich']['name'];
    $resposta['foto'] = $foto;

}


if (isset($_FILES['fich']['size']) && $temimagem) {
    $tam = $_FILES['fich']['size'];
    $resposta['tipo'] = $tipo;
}

foreach ($_REQUEST as $z => $x) {
    $resposta[$z] = $x;
}

try {

    if ($temimagem) {
        $sql = 'update coffee set 
                            ProductName=:ProductName,
                            password=:password,
                            Description=:Description,
                            Price=:Price,
                            Stock=:Stock,
                            foto=:foto,
                            
                            Strength = :Strength';

        ;
        $destino = dirname(__FILE__) . '\\fotosClientes\\';
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        $foto = $idcli . '.' . $ext;
        $execArray[':foto'] = $foto;
        move_uploaded_file($_FILES['fich']['tmp_name'], $destino . $foto);
    } else {
        $sql = 'update coffee set 
                            ProductName=:ProductName,
                            password=:password,
                            Description=:Description,
                            Price=:Price,
                            Stock=:Stock,
                            foto=:foto,
                            
                            Strength = :Strength';
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($execArray);
    $ok = $stmt->rowCount();
    if ($ok == 1)
        $resposta['msg'] = "ok";
    else
        $resposta['msg'] = "erro";
} catch (\PDOException $erro) {
    $resposta['msg'] = $erro->getMessage();
}

echo json_encode($resposta);
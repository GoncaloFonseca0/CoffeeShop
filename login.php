<?php
include 'cnn.php';
try {
    $token = ["ok" => false, "user" => ""];
    if (isset($_REQUEST['txtusername']) && isset($_REQUEST['txtpassworduser'])) {
        $user = htmlentities(addslashes($_REQUEST['txtusername']));
        $password = htmlentities(addslashes($_REQUEST["txtpassworduser"]));


        $sql = "SELECT Email, Password FROM client WHERE Email = :email;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $user]);
        $clients = $stmt->fetchAll();


        foreach ($clients as $client) {
            if (password_verify($password, $client['Password'])) {
                session_start();
                $_SESSION["user"] = $client['Email'];
                $token = ["ok" => true, "user" => $client['Email']];
                break;
            }
        }
    }

    echo json_encode($token);

} catch (PDOException $e) {
    echo json_encode(["ok" => false, "error" => "Database error"]);
}
?>
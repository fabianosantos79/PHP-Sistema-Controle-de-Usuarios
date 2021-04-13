<?php
    $dbname = "mysql:dbname=blog;host=localhost";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO($dbname, $user, $password);
    } catch (PDOException $erro) {
        echo "Erro: ".$mensagem = $erro->getMessage();
    }
?>
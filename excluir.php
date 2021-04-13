<?php
    require_once 'config.php';

    $id = filter_input(INPUT_GET, 'id');
    
    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('Location:sistema.php');
    exit();
?>
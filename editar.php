<?php
    require_once 'config.php';

    //EXIBIR OS DADOS DO USUÁRIO SELECIONADO
    $id = filter_input(INPUT_GET, 'id');
    
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0)
    {
        $res = $sql->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
        header('Location:sistema.php');
        exit();
    }

    //ALTERAR OS DADOS DO USUÁRIO NO BANCO DE DADOS
    if(isset($_POST['btn-editar']))
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');

        $sql = $pdo->prepare("UPDATE usuarios SET nome = :n, email = :e WHERE id = :id");
        $sql->bindValue(':n', $nome);
        $sql->bindValue(':e', $email);
        $sql->bindValue(':id', $id);
        $sql->execute();

        header('Location:sistema.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="container">
        <h2>Editar Usuário</h2>
        <form class="col s12" method="POST">
            <div class="row">
                <div class="input-field col s7">
                    <input type="text" name="nome" id="nome" value="<?= $res['nome']; ?>">
                    <label for="nome"></label>
                </div>
                <div class="input-field col s7">
                    <input type="email" name="email" id="email" value="<?= $res['email']; ?>">
                    <label for="email"></label>
                </div>
                <div class="input-field col s12">
                    <input type="submit" name="btn-editar" class="btn btn-large" value="Atualizar">
                </div>
            </div>
        </form>
    </div>

     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

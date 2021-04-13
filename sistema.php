<?php
    session_start();
    require_once 'config.php';

    if(isset($_SESSION['nome']))
    {
    $lista = [];

    $sql = $pdo->prepare("SELECT * FROM usuarios");
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        echo "Nenhum registro encontrado";
        }
    }
    else
    {
        header('Location:index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS do Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Controle de Usuários</title>
</head>
<body>
    <blockquote>
        Área exclusiva de, <strong><?=$_SESSION['nome'];?></strong>
        <br><a href="logout.php" class="red-text">Sair</a>
    </blockquote class="red">
    <div class="container">
    <h2>Controle de Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $item): ?>
                <tr>
                    <td><?=$item['nome']?></td>
                    <td><?=$item['email']?></td>
                    <td>
                        <a class="btn green" href="editar.php?id=<?=$item['id']?>">Editar</a>
                        <a class="btn deep-orange accent-4" href="excluir.php?id=<?=$item['id']?>" onClick="return confirm('Tem certeza que deseja excluir o usuário: <?=$item['nome']?>?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table><br>
        <a class="btn light-blue darken-4" href="cadastrar.php">Cadastrar Novo Usuário</a><br><br>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
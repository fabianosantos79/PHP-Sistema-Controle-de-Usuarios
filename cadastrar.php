<?php
    session_start();
    require_once 'config.php';

        if(isset($_POST['btn-cadastrar'])){
            $nome = filter_input(INPUT_POST, 'nome');
            $email = filter_input(INPUT_POST, 'email');
            $senha = filter_input(INPUT_POST, 'senha');
            $senha = md5($senha);

            if(!empty($nome) && !empty($email) && !empty($senha))
            {
                $sql = $pdo->prepare("SELECT email FROM usuarios WHERE email = :e");
                $sql->bindValue(':e', $email);
                $sql->execute();

                if($sql->rowCount() > 0)
                {
                    echo "Email já está cadastrado";                
                }
                else
                {
                    $sql= $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES(:n, :e, :s)");
                    $sql->bindValue(':n', $nome);
                    $sql->bindValue(':e', $email);
                    $sql->bindValue(':s', $senha);
                    $sql->execute();
                
                    header('Location:sistema.php');
                    exit();
                }
            }
            else
            {
                echo "Preencha todos os campos!";
            }
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
    <title>Cadastrar Usuário</title>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Usuários</h2>
        <form class="col s12" method="POST">
            <div class="row">
                <div class="input-field col s7">
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s7">
                    <input type="email" name="email" id="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s7">
                    <input type="password" name="senha" id="senha">
                    <label for="senha">Senha</label>
                </div>
                <div class="input-field col s12">
                    <input type="submit" name="btn-cadastrar" class="btn btn-large" value="Cadastrar">
                </div>
            </div>
        </form>
    </div>

     <!-- JavaScript do Materialize -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
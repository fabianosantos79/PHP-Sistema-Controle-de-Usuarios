<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['btn-entrar']))
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $senha = filter_input(INPUT_POST, 'senha');
        $senha = md5($senha);

        if(!empty($nome) && !empty($senha))
        {
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome = :n AND senha = :s");
            $sql->bindValue(':n', $nome);
            $sql->bindValue(':s', $senha);
            $sql->execute();

            if($sql->rowCount() > 0)
            {
                $reg = $sql->fetch(PDO::FETCH_ASSOC);

                $_SESSION['nome'] = $reg['nome'];

                header('Location:sistema.php');
                exit();
            }
            else
            {
                echo "Usuário não encontrado.";
            }
        }
    else
    {
        echo "Preencha todos os campos.";
    }

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
    <title>Área de Login</title>
</head>
<body>
    
    <div class="container">
        <h2>Faça seu Login</h2>
        <form class="col s12" method="POST">
            <div class="row">
                <div class="input-field col s7">
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s7">
                    <input type="password" name="senha" id="senha">
                    <label for="senha">Senha</label>
                </div>
                <div class="input-field col s12">
                    <input type="submit" name="btn-entrar" class="btn btn-large" value="Entrar">
                </div>
            </div>
        </form>
        <p>Ainda não é usuário? <a href="cadastrar.php">Faça aqui o seu cadastro.</a></p>
    </div>

    <!-- JavaScript do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
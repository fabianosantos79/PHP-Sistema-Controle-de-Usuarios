<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS do Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form method="POST" action="recebedor2.php" enctype="multipart/form-data">
        <div class="file-field input-field">
            <div class="btn">
                <span>Escolher arquivos</span>
                <input type="file" multiple name="arquivos[]">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
            <div class="input-field col s12">
                    <input type="submit" name="btn-arquivar" class="btn btn-large blue" value="Enviar">
            </div>
        </div>
    </form>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
<?php
    $arquivo = $_FILES['arquivo'];
    
    if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name']))
        {
            $nomeArquivo = md5(time()).'.png';
            move_uploaded_file($arquivo['tmp_name'], 'arquivos/'.$nomeArquivo);
            
            echo "Arquivo recebido com sucesso.";
        }
?>
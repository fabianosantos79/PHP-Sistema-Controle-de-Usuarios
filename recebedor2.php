<?php
    $arquivos = $_FILES['arquivos'];
    
    if(isset($_FILES['arquivos']['tmp_name']))
    {
        if(count($_FILES['arquivos']['tmp_name']) > 0){
            
            for($i=0; $i<count($_FILES['arquivos']['tmp_name']); $i++)
            {
                $nomeArquivo = md5(time().rand(0,99)).'.jpg';
                move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], 'arquivos/'.$nomeArquivo);
            }
        }
    }
?>
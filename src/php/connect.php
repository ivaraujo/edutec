<?php 
    $host  = "localhost";
    $bancodados = "teste_edutec";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($host,$usuario,$senha,$bancodados);
    if($mysqli->connect_errno){
        echo ("Falha ao conectar:(".$mysqli->connect_errno.")".$mysqli->connect_error);
    }    
?>
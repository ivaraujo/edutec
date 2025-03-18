<?php
session_start();
include("connect.php");

if(isset($_POST['alterar_evento'])){

    $ideventos = $_POST['id_event'];
    $nome_eventos = $_POST['name_event'];
    $data_eventos = $_POST['date_event'];
    $localizacao_eventos = $_POST['hosts_event'];
    $senha_eventos = $_POST['code_event'];

    $mysqli->query("UPDATE eventos SET nome_eventos='$nome_eventos',data_eventos='$data_eventos',localizacao_eventos='$localizacao_eventos',senha_eventos='$senha_eventos' WHERE ideventos = $ideventos");
    if($mysqli->error){
        echo("Erro ao Atualizar");
    }
    else{
        header("Location: painel.php");
    }
}

if(isset($_POST['alterar_presente'])){

    $idpresentes = $_POST['id_gift'];
    $nome_presentes = $_POST['name_gift'];
    $preco_presentes = $_POST['price_gift'];
    $limite_presentes = $_POST['range_gift'];
    $categorias_presentes = $_POST['category_gift'];
    $imagem_presentes = $_POST['image_gift'];
    

    $mysqli->query("UPDATE presentes SET nome_presentes='$nome_presentes',preco_presentes='$preco_presentes',limite_presentes='$limite_presentes',categorias_idcategorias='$categorias_presentes',imagem_presentes='$imagem_presentes' WHERE idpresentes = $idpresentes");
    if($mysqli->error){
        echo("Erro ao Atualizar");
    }
    else{
        header("Location: painel.php");
    }
}

?>
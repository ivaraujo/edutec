<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id_adm'])){
    die("Você não pode acessar está página sem está logado!");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de presentes</title>
    <link rel="stylesheet" href="../css/reset.css">
</head>
<body>
    <?php
        include ("connect.php");
        /* OBS: Falta fazer o upload da imagem */
        /*OBS: Falta fazer a session */

        if(isset($_POST['name_gift'])){
            $nome_presentes = $_POST['name_gift'];
            $preco_presentes = $_POST['price_gift'];
            $limite_presentes = $_POST['range_gift'];
            $categorias_idcategorias = $_POST['category_gift'];
            $imagem_presentes = $_POST['image_gift'];
            $pagamentos_idpagamentos = $_POST['pay_gift'];

            $mysqli->query("INSERT INTO presentes (nome_presentes,preco_presentes,limite_presentes,categorias_idcategorias,pagamentos_idpagamentos) 
VALUES ('$nome_presentes','$preco_presentes','$limite_presentes','$categorias_idcategorias','$pagamentos_idpagamentos')");
            if($mysqli->error){
                echo("Erro: $mysqli->error");
            }
        }        
    ?>
    <form encytype="multipart/form-data" action="register_presents.php" method="post">
        <label>Nome</label>
        <input type="text" name="name_gift" id="name_gift">
        <label>Preço</label>
        <input type="text" name="price_gift" id="price_gift">
        <label>Limite máximo</label>
        <input type="number" name="range_gift" id="range_gift">
        <label>Categoria</label>        
        <select name="category_gift" id="category_gift">
            <option>Escolha...</option>
            <?php
                $busca_categoria = $mysqli->query("SELECT * FROM categorias");
                while($categorias = mysqli_fetch_array($busca_categoria,MYSQLI_ASSOC)){
            ?>            
            <option value="<?php echo $categorias['idcategorias']; ?>"><?php echo $categorias['nome_categorias']; ?></option>
            <?php } ?>            
        </select>
        <label>Imagem do presente</label>
        <input type="file" name="image_gift" id="image_gift">
        <label>Tipo de pagamento</label>
        <select name="pay_gift" id="pay_gift">
            <option>Escolha...</option>
            <?php
                $busca_pagamento = $mysqli->query("SELECT * FROM pagamentos");
                while($pagamentos = mysqli_fetch_array($busca_pagamento,MYSQLI_ASSOC)){
            ?>            
            <option value="<?php echo $pagamentos['idpagamentos']; ?>"><?php echo $pagamentos['nome_pagamentos']; ?></option>
            <?php } ?>            
        </select>        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
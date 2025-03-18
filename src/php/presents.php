<?php
    include("protect_adm.php");
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar de presente</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/presents.css">
</head>
<body>
    <section>
        <h1>Editar Presente</h1>
        <a href="painel.php">Voltar</a>
        <?php
            if(isset($_GET['id_presentes'])){
                $id_presentes = $_GET['id_presentes'];

                $busca_id = $mysqli->query("SELECT * FROM presentes WHERE idpresentes = '$id_presentes'");
                $qtd_resultado = $busca_id->num_rows;
                if($qtd_resultado > 0){
                    $dados_presentes = mysqli_fetch_array($busca_id,MYSQLI_ASSOC);                    
                } 
        ?>
        <form action="updates.php" method="post">
            <input type="hidden" name="id_gift" value="<?php echo $dados_presentes['idpresentes']; ?>">
            <label>Nome</label>
            <input type="text" name="name_gift" id="name_gift" value="<?php echo $dados_presentes['nome_presentes']; ?>">
            <label>Preço</label>
            <input type="text" name="price_gift" id="price_gift" value="<?php echo $dados_presentes['preco_presentes']; ?>">
            <label>Limite máximo</label>
            <input type="number" name="range_gift" id="range_gift" value="<?php echo $dados_presentes['limite_presentes']; ?>">
            <label>Categoria</label>
            <select name="category_gift" id="category_gift" value="<?php echo $dados_presentes['categoria_presentes']; ?>">
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
            <button type="submit" name="alterar_presente">Editar</button>
        </form>
        <?php }
            else{
                echo("Ao trazer o dado!");
            }
        ?>
    </section>
</body>
</html>
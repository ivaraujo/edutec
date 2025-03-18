<?php
    include("protect_user.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/store.css">
</head>
<body>
    <section>
        <h1>STORE</h1> 
        <div id="container">
            <?php /*OBS: Falta fazer a session */
                    include('connect.php');

                    $busca_categoria = $mysqli->query("SELECT * FROM presentes");
                    while($presentes = mysqli_fetch_array($busca_categoria,MYSQLI_ASSOC)){
                        $valida_qtd = $presentes['limite_presentes'];
                        if($valida_qtd > 0){
            ?>          
            <div class="container-grid">
                <div id="caixa">
                    <img src="../files/celular_com_fundo.png" alt="">
                    <p><?php echo $presentes['nome_presentes']; ?></p>
                    <p><?php echo $presentes['preco_presentes']; ?></p>
                    <p>Qtd.: <?php echo $presentes['limite_presentes']; ?></p>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="nome_presentes" value="<?php echo $presentes['nome_presentes']; ?>">
                        <input type="hidden" name="qtd_presentes" value="<?php echo $presentes['limite_presentes']; ?>">
                        <button type="submit">Presente</button>
                    </form>                
                </div>
            </div>
            <?php }} ?>
        </div>
        <a href="logout_user.php">Sair</a>        
    </section>
</body>
</html>
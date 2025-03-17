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
        <?php /*OBS: Falta fazer a session */
                include('connect.php');

                $busca_categoria = $mysqli->query("SELECT * FROM presentes");
                while($presentes = mysqli_fetch_array($busca_categoria,MYSQLI_ASSOC)){
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
        <?php } ?>
    </section>
</body>
</html>
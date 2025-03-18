<?php
    include("protect_user.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/checkout.css">
</head>
<body>
    <section>
        <?php
            include("connect.php");
            if(isset($_POST['nome_presentes'])){
                $nome_presentes = $_POST['nome_presentes'];
                //$qtd_recebido = $_POST['qtd_presentes'];

                echo("Presente: ".$nome_presentes."<br>");                
                $busca_limite = $mysqli->query("SELECT * FROM presentes WHERE nome_presentes LIKE '$nome_presentes'");
                $nome = mysqli_fetch_array($busca_limite,MYSQLI_ASSOC);
                $qtd_recebido = $nome['limite_presentes'];
                echo("Quantidade: ".$qtd_recebido);                
                
            }                        
            
            if(isset($_POST['nome_pagamentos'])){                

                $nome_pagamentos = $_POST['nome_pagamentos'];
                $qtd = $_POST['qtd'];
                $qtd_anterior = ['qtd_anterior'];
                //$qtd_presentes = $qtd_anterior - $qtd;
                //$convidados_idconvidados =
                $mensagem_checkout = $_POST['mensagem_checkout'];
                
                echo("Quantidade atual: ".$qtd."<br>");
                echo("Quantidade anterior: ".$qtd_anterior."<br>");
            }            
            
        ?>
        <h1>CHECKOUT</h1>
        <form action="checkout.php" method="post">
            <select name="nome_pagamentos" id="nome_pagamentos">
                <option>Escolha...</option>
                <?php
                    $busca_pagamento = $mysqli->query("SELECT * FROM pagamentos");
                    while($pagamentos = mysqli_fetch_array($busca_pagamento,MYSQLI_ASSOC)){
                ?>            
                <option value="<?php echo $pagamentos['idpagamentos']; ?>"><?php echo $pagamentos['nome_pagamentos']; ?></option>
                <?php } ?>            
            </select>
            <label>Quantidade:</label>
            <input type="number" name="qtd" id="qtd">
            <label>Seu nome: Ivan</label>
            <label>Deixe sua mensagem:</label>
            <textarea name="mensagem_checkout" id="mensagem_checout"></textarea>
            <input type="hidden" name="qtd_anterior" value="<?php $qtd_recebido; ?>">
            <button type="submit">Confirmar</button> 
        </form>
    </section>
</body>
</html>
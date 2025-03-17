<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <?php
        $nome_presentes = $_POST['nome_presentes'];
        $qtd_presentes = $_POST['qtd_presentes'];

        echo("Presente: ".$nome_presentes."<br>");
        echo("Quantidade: ".$qtd_presentes);
    ?>
</body>
</html>
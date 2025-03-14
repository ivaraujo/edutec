<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar de presente</title>
    <link rel="stylesheet" href="../css/reset.css">
</head>
<body>
    <form action="" method="post">
        <label>Nome</label>
        <input type="text" name="name_gift" id="name_gift">
        <label>Preço</label>
        <input type="text" name="price_gift" id="price_gift">
        <label>Limite máximo</label>
        <input type="number" name="range_gift" id="range_gift">
        <label>Categoria</label>
        <select name="category_gift" id="category_gift">
            <option value="moveis">Móveis</option>
            <option value="eletronicos">Eletrônicos</option>
            <option value="eletrodomesticos">Eletrodomésticos</option>
            <option value="utensilios">Utensílios</option>
            <option value="decoracao">Decoração</option>
        </select>
        <label>Imagem do presente</label>
        <input type="file" name="image_gift" id="image_gift">
        <legends>Tipo de pagamento</legends>
        <label for="link_gift">Dinheiro</label>
        <input type="checkbox" name="link_gift" id="link_gift" value="Link">
        <label for="pix_gift">PIX</label>
        <input type="checkbox" name="pix_gift" id="pix_gift" value="PIX">
        <label for="entrega_gift">Entrega</label>
        <input type="checkbox" name="entrega_gift" id="entrega_gift" value="Entrega">
        <label for="cartao_gift">Cartão de crédito</label>
        <input type="checkbox" name="cartao_gift" id="cartao_gift" value="Cartão de crédito">
        <button id="update">Atualizar</button>
        <button id="delete">Apagar</button>
    </form>
</body>
</html>
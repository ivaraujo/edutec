<?php
    include("protect_adm.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/painel.css">
</head>
<body>
    <section>
        <h1>Bem vindo, <?php echo ($_SESSION['nome']); ?></h1>
        <div id="container">
            <div id="lista_presentes">
                <table>
                    <td id="titulos">
                        <tr>Convidado</tr>
                        <tr>Presente</tr>
                        <tr>Pagamento</tr>
                    </td>                    
                    <?php
                        include("connect.php");
                        $busca_presentes = $mysqli->query("SELECT * FROM presentes");
                        while($presentes = mysqli_fetch_array($busca_presentes,MYSQLI_ASSOC)){
                    ?>
                    <td>
                        <tr><?php echo $presentes['nome_presentes']; ?></tr>
                        <tr>b</tr>
                        <tr>c</tr>
                        <tr><a href="">Alterar</a></tr>
                        <tr><a href="">Apagar</a></tr>
                    </td>
                    <?php } ?> 
                </table>               
            </div>
            <div id="caixa_botoes">
                <a href="register_events.php">Novo Evento</a>
                <a href="register_presents.php">Novo presente</a>
                <a href="presents.php">Editar Presentes</a>
            </div>
        </div>
        <a href="logout_adm.php">Sair</a>
    </section>
</body>
</html>
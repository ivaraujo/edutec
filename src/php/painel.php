<?php
    include("protect_adm.php");
    include("connect.php");
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
        <h1>Bem vindo, <?php //echo ($_SESSION['nome']); ?></h1>
        <div id="caixa_botoes">
                <a href="register_events.php">Novo Evento</a>
                <a href="register_presents.php">Novo presente</a>
                <a href="logout_adm.php">Sair</a>
            </div>        
        <div id="container">
            <div id="lista_presentes">
                <h2>PRESENTES</h2>
                <table>
                    <td id="titulos">
                        <tr>Convidado</tr>
                        <tr>Presente</tr>
                        <tr>Pagamento</tr>
                    </td>                    
                    <?php                        
                        $busca_presentes = $mysqli->query("SELECT * FROM presentes");
                        while($presentes = mysqli_fetch_array($busca_presentes,MYSQLI_ASSOC)){
                    ?>
                    <td>
                        <tr><?php echo $presentes['nome_presentes']; ?></tr>
                        <tr>Quantidade</tr>
                        <tr>c</tr>
                        <tr><a href="presents.php?id_presentes=<?php echo $presentes['idpresentes']; ?>">Alterar</a></tr>
                        <tr><a href="">Apagar</a></tr>
                    </td>
                    <?php } ?> 
                </table>               
            </div>
            <div id="lista_eventos">
                <h2>EVENTOS</h2>
                <table>
                    <td id="titulos">
                        <tr>Convidado</tr>
                        <tr>Presente</tr>
                        <tr>Pagamento</tr>
                    </td><br>                    
                    <?php                        
                        $busca_eventos = $mysqli->query("SELECT * FROM eventos");
                        while($eventos = mysqli_fetch_array($busca_eventos,MYSQLI_ASSOC)){
                    ?>
                    <td>
                        <tr><?php echo $eventos['nome_eventos']; ?></tr>
                        <tr>Data</tr>
                        <tr>Local</tr>
                        <tr><a href="events.php?id_eventos=<?php echo $eventos['ideventos']; ?>">Alterar</a></tr>
                        <tr><a href="">Apagar</a></tr>
                    </td>
                    <?php } ?> 
                </table> 
            </div>
        </div>        
    </section>
</body>
</html>
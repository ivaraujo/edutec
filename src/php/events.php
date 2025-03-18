<?php
    include("protect_adm.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/register_events.css">
</head>
<body>
    <section>
        <h1>Editar Evento</h1>
        <a href="painel.php">Voltar</a>
        <?php 
            include ("connect.php");            

            if(isset($_GET['id_eventos'])){
                echo("ENTREI");
                $id_eventos = $_GET['id_eventos'];

                $busca_id = $mysqli->query("SELECT * FROM eventos WHERE ideventos = '$id_eventos'");
                $qtd_resultado = $busca_id->num_rows;
                if($qtd_resultado > 0){
                    $dados_eventos = mysqli_fetch_array($busca_id,MYSQLI_ASSOC);
                    
                }        
        ?>        
        <form action="updates.php" method="post">
            <input type="hidden" name="id_event" value="<?php echo $dados_eventos['ideventos']; ?>">
            <label>Nome</label>
            <input type="text" name="name_event" id="name_event" value="<?php echo $dados_eventos['nome_eventos']; ?>">
            <label>Data do evento</label>
            <input type="date" name="date_event" id="date_event" value="<?php echo $dados_eventos['data_eventos']; ?>">
            <label>Localização do evento</label>
            <input type="text" name="hosts_event" id="hosts_event" value="<?php echo $dados_eventos['localizacao_eventos']; ?>">        
            <label>Código do evento</label>
            <input type="text" name="code_event" id="code_event" value="<?php echo $dados_eventos['senha_eventos']; ?>">
            <button type="submit" name="alterar_evento">Alterar</button>
        </form>
        <?php }
            else{
                echo("Ao trazer o dado!");
            }
        ?>
    </section>
</body>
</html>
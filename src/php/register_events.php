<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Evento</title>
    <link rel="stylesheet" href="../css/reset.css">
</head>
<body>
    <?php /*OBS: Falta fazer a session */
        include ("connect.php");

        $busca_anfitrioes = $mysqli->query("SELECT * FROM anfitrioes WHERE cpf_anfitrioes LIKE '111.111.111-11';");
        $resultado_busca = mysqli_fetch_array($busca_anfitrioes,MYSQLI_ASSOC);
        $anfitrioes_idanfitrioes = $resultado_busca['idanfitrioes'];

        if(isset($_POST['name_event'])){

            $nome_eventos = $_POST['name_event'];
            $data_eventos = $_POST['date_event'];
            $localizacao_eventos = $_POST['hosts_event'];
            $senha_eventos = $_POST['code_event'];

            $mysqli->query("INSERT INTO eventos (nome_eventos,data_eventos,localizacao_eventos,anfitrioes_idanfitrioes,senha_eventos) 
    VALUES ('$nome_eventos','$data_eventos','$localizacao_eventos','$anfitrioes_idanfitrioes','$senha_eventos')");
                if($mysqli->error){
                    echo("Erro: $mysqli->error");
                }
        }        
    ?>
    <form action="register_events.php" method="post">
        <label>Nome</label>
        <input type="text" name="name_event" id="name_event">
        <label>Data do evento</label>
        <input type="date" name="date_event" id="date_event">
        <label>Localização do evento</label>
        <input type="text" name="hosts_event" id="hosts_event">        
        <label>Código do evento</label>
        <input type="text" name="code_event" id="code_event">
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de convidado</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/register_guest.css">
</head>
<body>
    <section>
        <?php
            include ("connect.php"); 
            $cpf_anfitrioes = $_POST['cpf_anfitrioes'];
            $senha_eventos = $_POST['code'];
            $verifica_cpf = $mysqli->query("SELECT cpf_anfitrioes FROM anfitrioes WHERE cpf_anfitrioes LIKE '$cpf_anfitrioes'");
            $verifica_senha = $mysqli->query("SELECT senha_eventos FROM eventos WHERE senha_eventos LIKE '$senha_eventos'");
            
            $qtd_cpf = $verifica_cpf->num_rows;
            $qtd_senha = $verifica_senha->num_rows;

            if($qtd_cpf == 1 and $qtd_senha == 1){
                if(isset($_POST['nome_convidados'])){                           
                    
                    $cpf_convidados = $_POST['cpf_convidados'];
                    $nome_convidados = $_POST['nome_convidados'];
                    $telefone_convidados = $_POST['telefone_convidados'];
                    $email_convidados = $_POST['email_convidados'];
                    
                    $mysqli->query("INSERT INTO convidados (cpf_convidados,nome_convidados,telefone_convidados,email_convidados,senha_convidados) 
        VALUES ('$cpf_convidados','$nome_convidados','$telefone_convidados','$email_convidados','$senha_convidados');");
                    if(!$mysqli->error){                        
                        $busca = $mysqli->query("SELECT * FROM convidados WHERE cpf_convidados LIKE '$cpf_convidados'") or die("Falha na busca SQL ".$mysqli->error);
            
                        $qtd_resultados = $busca->num_rows;
                        
                        if($qtd_resultados == 1){
                            $dados_usuario = $busca->fetch_assoc();
                            if(!isset($_SESSION)){
                                session_start();
                            }
                            $_SESSION['id_user'] = $dados_usuario['idconvidados'];
                            $_SESSION['nome_user'] = $dados_usuario['nome_convidados'];
                            header("Location: store.php");
                        }
                        else{
                            echo("NÂO ENTREI");
                        } 
                    }
                    else{
                        echo("Erro: $mysqli->error");
                    }
                }
            }
            else{
                header("Location: ../../index.php");
            }        
        ?>
        <form action="register_guest.php" method="post">
            <label>CPF</label>
            <input type="text" name="cpf_convidados" id="cpf_convidados">        
            <label>Nome</label>
            <input type="text" name="nome_convidados" id="nome_convidados">
            <label>Telefone</label>
            <input type="tel" name="telefone_convidados" id="telefone_convidados">
            <label>E-mail</label>
            <input type="email" name="email_convidados" id="email_convidados">            
            <button type="submit">Cadastrar</button>
        </form>
        <a href="login.php">Já sou cadastrado</a>
    </section>
</body>
</html>
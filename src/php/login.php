<?php 
    include ("connect.php");    

    if(isset($_POST['btn'])){
        $usuario = $_POST['cpf'];

        if(empty($usuario)){
            echo("Senha não está preenchido");
        }
        else{            
            $busca = $mysqli->query("SELECT * FROM convidados WHERE cpf_convidados LIKE '$usuario'") or die("Falha na busca SQL ".$mysqli->error);
            
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
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>    
    <main>
        <section>
            <h1>Login</h1>            
            <form action="login.php" method="post">
                <label>CPF</label>
                <input type="text" name="cpf" id="cpf">
                <button type="submit" name="btn">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>
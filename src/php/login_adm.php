<?php 
    include ("connect.php");    

    if(isset($_POST['btn'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if(empty($usuario) or empty($senha)){
            echo("Login ou senha não está preenchido");
        }
        else{            
            $busca = $mysqli->query("SELECT * FROM anfitrioes WHERE cpf_anfitrioes LIKE '$usuario' AND senha_anfitrioes LIKE '$senha'") or die("Falha na busca SQL ".$mysqli->error);
            
            $qtd_resultados = $busca->num_rows;
            
            if($qtd_resultados == 1){
                $dados_usuario = $busca->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id_adm'] = $dados_usuario['idanfitrioes'];
                $_SESSION['nome_adm'] = $dados_usuario['nome_anfitrioes'];
                header("Location: painel.php");
            }            
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Adm</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login_adm.css">
</head>
<body>
    <header>
        <nav>
            <a href="../../index.php">Home</a>
        </nav>
    </header>
    <main>
        <section>
            <h1>Login</h1>            
            <form action="login_adm.php" method="post">
                <label>CPF</label>
                <input type="text" name="usuario" id="usuario">
                <label>Senha</label>
                <input type="password" name="senha" id="senha">
                <button type="submit" name="btn">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de eventos</title>
    <link rel="stylesheet" href="./src/css/reset.css">
    <link rel="stylesheet" href="./src/css/index.css">
</head>
<body>
    <header>
        <nav>
            <a href="./src/php/login_adm.php">Cadastrar evento</a>
        </nav>
    </header>
    <main>
        <section>
            <h1>Login</h1>            
            <form action="src/php/register_guest.php" method="post">
                <label>CPF</label>
                <input type="text" name="cpf_anfitrioes" id="cpf_anfitrioes">
                <label>Código do evento</label>
                <input type="text" name="code" id="code">
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>
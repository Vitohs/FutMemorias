<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | fut memória</title>
    <link rel="stylesheet" href="/style/menu.css">
    <link rel="stylesheet" href="/style/footer.css">
    <link rel="stylesheet" href="/style/cadastro.css">
</head>
<body>
    <?php
        require_once "views/header.html";
    ?>
    <div class="msg">
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
    </div>
    <div class="form">
        <form action="/login" method="POST">
            <legend>
                <h2>
                    Faça seu login 
                </h2>
            </legend>

            <label for="Nome">Nick</label>
            <input type="text" name="Nome" id="Nome" placeholder="Insira seu Nick" required>

            <label for="Senha">Senha</label>
            <input type="password" name="Senha" id="Senha" placeholder="Insira sua senha" required>
            <button class="insert" type="submit">Entrar</button>
        </form>
    </div>
    <?php
        require_once "views/footer.html";
    ?>
    <script src="/js/menuToogle.js"></script>
</body>
</html>
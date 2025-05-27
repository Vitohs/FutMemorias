<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game | Fut memoria</title>
    <link rel="stylesheet" href="/style/menu.css">
    <link rel="stylesheet" href="/style/confirma.css">
    <link rel="stylesheet" href="/style/footer.css">
</head>
<body>
    <?php
        require_once "views/header.html";
    ?>
    <div class="content">
        <img src="/assets/LULU.png" alt="" class="lulu">
        <div class="botao">
            <a class="link" href="/game">
                <button class="joga" type="submit">jogar</button>
            </a>
        </div>
    </div>
    <?php
        require_once "views/footer.html";
    ?>
    <script src="/js/menuToogle.js"></script>
</body>
</html>
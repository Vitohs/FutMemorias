<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | página não encontrada</title>
    <link rel="stylesheet" href="/style/menu.css">
    <link rel="stylesheet" href="/style/404.css">
    <link rel="stylesheet" href="/style/footer.css">
</head>
<body>
    <?php
        require_once "views/header.html";
    ?>
    <div class="container">
        <div>
            <h1>404</h1>
            <h2> Página não encontrada</h2>
        </div>
        <img class="notFound" src="\assets\Monster 404 Error-pana.png" alt="">
    </div>
    <!-- <br>
        <p>Desculpe, a página que você está procurando não existe.</p>
        <a href="/">Voltar para a página inicial</a> -->
    <?php
        require_once "views/footer.html";
    ?>
    <script src="/js/menuToogle.js"></script>
</body>
</html>
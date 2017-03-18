<?php

require_once("home.php");
require_once("login.php");
require_once("submit_form.php");
require_once("javascript.php");
extract(carregar_pagina());
?>
<?php if (!isset($_SESSION['logado'])) { ?>
    <form class="form-inline" method="post" action="login.php">
        <div class="form-group">
            <label for="inputLogin">Login</label>
            <input type="text" class="form-control input-sm" id="InputLogin" name="InputLogin" placeholder="Login">
        </div>
        <div class="form-group">
            <label for="inputPassword">Senha</label>
            <input type="password" class="form-control input-sm" id="InputPass" name="InputPass" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default">login</button>
    </form>
<?php } else { ?>

<?php } ?>
<form class="form-inline text-right" method="post" action="busca">
    <div class="form-group">
        <label class="sr-only" for="InputBusca">Buscar</label>
        <div class="input-group">
            <input type="text" class="form-control" id="inputBusca" name="inputBusca" placeholder="Buscar na página"
                   value="<?php echo (isset($_POST['inputBusca'])) ? $_POST['inputBusca'] : ''; ?>">
        </div>
        <button type="submit" class="btn btn-info">Buscar</button>
    </div>
</form>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php echo ucfirst(utf8_encode($titulo)); ?></title>
</head>

<body>

<ul class="nav nav-pills">
    <?= $links_menu ?>
</ul>
<hr>
</body>

<h2><?php echo utf8_encode($titulo); ?></h2>

<div class="container-fluid">
    <?php
    echo utf8_encode($conteudo);
    ?>
</div>

<hr>
<div style="text-align: center;">Todos os direitos reservados - <?= $anoAtual; ?>
    <?php if (isset($_SESSION['logado'])) { ?>
        <br>
        logado como <?= $_SESSION['user']['name'] ?> (<?= $_SESSION['user']['nick'] ?>)
        <form class="form-inline" method="post" action="logout.php">
            <button type="submit" class="btn btn-danger btn-xs">logout</button>
        </form>
    <?php } ?>
</div>
</html>


<script>
    CKEDITOR.replace( 'inputConteudo', {
        on: {
            instanceReady: function( ev ) {
                // Output paragraphs as <p>Text</p>.
                this.dataProcessor.writer.setRules( 'p', {
                    indent: false,
                    breakBeforeOpen: true,
                    breakAfterOpen: false,
                    breakBeforeClose: false,
                    breakAfterClose: true
                });
            }
        }
    });
</script>
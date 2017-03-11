<?php
function rotas_validas ()
{
    return $rota_validas = array(
        "contato" => "contato.php",
        "empresa" => "empresa.php",
        "produtos" => "produtos.php",
        "servicos" => "servicos.php",
        "home" => "home.php",
        "submit_form" => "submit_form.php",
        "404" => "404.php"
    );
}

function get_arquivo () {
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $rota['path'];
    if ($path == "/") {
        $path = "/home";
    }

    $path_completo = explode("/", $path);

    if (is_array ($path_completo)) {
        $arquivo = $path_completo[1];
    } else {
        $arquivo = str_replace("/", "", $path);
    }

    return $arquivo;
}

$arquivo = get_arquivo();
$rotas = rotas_validas();

if (isset($rotas[$arquivo]) ) {
    $pagina = $rotas[$arquivo];
} else {
    $pagina = $rotas[404];
    $arquivo = 404;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php
        if (isset($arquivo)) {
            echo ucfirst($arquivo);
        } else {
            echo "Home";
        }
        ?>
    </title>
</head>

<body>

<?php require_once ("menu.php");?>
</body>

<div class="container-fluid">
    <?php
    if ( file_exists($pagina) === true ) {
        require_once($pagina);
    } else {
        require_once("404.php");
    }
    ?>
</div>

<?php require_once ("rodape.php");?>
</html>

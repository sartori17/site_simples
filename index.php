<?php
require_once "conexaoDB.php";

function rotas_validas ()
{
    $conn = conexaoDB();

    $query = "select * from rotas r 
                left join conteudo c ON c.rota_id = r.id;";

    $stmt = $conn->query($query);
    //$stmt->bindParam(":id", $id);
    $stmt->execute();
    $rotas = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($rotas as $rota) {
        $rota_validas[$rota['origem']] = $rota;
    }

    return $rota_validas;
}

function get_path_pagina () {
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

$arquivo = get_path_pagina();
$rotas = rotas_validas();

if (isset($rotas[$arquivo]) ) {
    $pagina = $rotas[$arquivo];
    $titulo = $rotas[$arquivo]['titulo'];
    $descricao = $rotas[$arquivo]['descricao'];
} else {
    $arquivo = 404;
    $titulo = $rotas[$arquivo]['titulo'];
    $descricao = $rotas[$arquivo]['descricao'];
}

//Duvida
//O conteudo da pagina foi obtido do banco de dados.
//No objetivo do exercicio, ainda poderia usar o require assim?
require_once ("home.php");
?>

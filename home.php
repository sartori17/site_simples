<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 23:09
 */
require_once "conexaoDB.php";
require_once "menu.php";

function rotas_validas()
{
    $conn = conexaoDB();

    $query = "select * from rotas r 
                left join conteudo c ON c.rota_id = r.id;";

    $stmt = $conn->query($query);
    $stmt->execute();
    $rotas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rotas as $rota) {
        $rota_validas[$rota['origem']] = $rota;
    }

    return $rota_validas;
}

function get_path_pagina()
{
    $rota = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $path = $rota['path'];
    if ($path == "/") {
        $path = "/home";
    }

    $path_completo = explode("/", $path);

    if (is_array($path_completo)) {
        $arquivo = $path_completo[1];
    } else {
        $arquivo = str_replace("/", "", $path);
    }

    return $arquivo;
}

function carregar_pagina()
{
    $arquivo = get_path_pagina();
    $rotas = rotas_validas();
    $links_menu  = get_menu($arquivo);

    if (isset($rotas[$arquivo])) {
        $pagina = $rotas[$arquivo];
        $titulo = $rotas[$arquivo]['titulo'];
        if (file_exists($rotas[$arquivo]['destino'])) {
            $conteudo = include_once($rotas[$arquivo]['destino']);
        } else {
            $conteudo = $rotas[$arquivo]['conteudo'];
        }
    } else {
        $arquivo = 404;
        $titulo = $rotas[$arquivo]['titulo'];
        $conteudo = $rotas[$arquivo]['conteudo'];
    }

    $params['titulo'] = $titulo;
    $params['conteudo'] = $conteudo;
    $params['links_menu'] = $links_menu;
    $params['anoAtual'] = date("Y", time());
    return $params;

}
?>



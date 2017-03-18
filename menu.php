<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 21:12
 */
require_once "conexaoDB.php";

function get_menu($arquivo)
{
    $conn = conexaoDB();

    $query = "SELECT * FROM rotas r WHERE tipo = :tipo ORDER BY ordem;";

    $stmt = $conn->prepare($query);
    $tipo_menu = 1;
    $stmt->bindParam(":tipo", $tipo_menu, PDO::PARAM_INT);
    $stmt->execute();
    $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $links_menu = "";

    foreach ($menu as $link) {
        $class_active = ($arquivo == $link['origem']) ? "class=active" : "";
        $links_menu .= "<li role=\"presentation\" $class_active ><a href=\"/" . $link['origem'] . "\"> " . strtoupper($link['origem']) . " </a></li>";
    }

    return $links_menu;
}

?>

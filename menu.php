<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 21:12
 */
require_once "conexaoDB.php";
?>
<?php require_once ("javascript.php");?>

<form class="form-inline text-right" method="post" action="busca.php" >
    <div class="form-group">
        <label class="sr-only" for="InputBusca">Buscar</label>
        <div class="input-group">
            <input type="text" class="form-control" id="inputBusca" name="inputBusca" placeholder="Busca na página" value="<?=$_POST['inputBusca']?>">
        </div>
        <button type="submit" class="btn btn-info">Buscar</button>
    </div>
</form>
<?php

$conn = conexaoDB();

$query = "select * from rotas r where tipo = :tipo order by ordem;";

$stmt = $conn->prepare($query);
$tipo_menu = 1;
$stmt->bindParam(":tipo", $tipo_menu, PDO::PARAM_INT);
$stmt->execute();
$menu = $stmt -> fetchAll(PDO::FETCH_ASSOC);

foreach ($menu as $link) {
    $class_active = ($arquivo == $link['origem']) ? "class=active" : "";
    $links_menu .= "<li role=\"presentation\" $class_active ><a href=\"".$link['origem']."\"> ".strtoupper($link['origem'])." </a></li>";
}

?>
<ul class="nav nav-pills">
    <?=$links_menu?>
</ul>
<hr>
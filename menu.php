<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 21:12
 */

?>
<?php require_once ("javascript.php");?>

<ul class="nav nav-pills">
    <li role="presentation" <?php echo ($arquivo == "home") ? "class=active" : ""; ?>><a href="home">HOME </a></li>
    <li role="presentation" <?php echo ($arquivo == "empresa") ? "class=active" : ""; ?>><a href="empresa"> EMPRESA</a></li>
    <li role="presentation" <?php echo ($arquivo == "produtos") ? "class=active" : ""; ?>><a href="produtos"> PRODUTOS</a></li>
    <li role="presentation" <?php echo ($arquivo == "servicos") ? "class=active" : ""; ?>><a href="servicos"> SERVICOS</a></li>
    <li role="presentation" <?php echo ($arquivo == "contato" || $arquivo == "submit_form") ? "class=active" : ""; ?>><a href="contato"> CONTATO</a></li>
</ul>
<hr>
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
    <li role="presentation" <?php echo (!isset($_GET['p'])) ? "class=active" : ""; ?>><a href="index.php">HOME </a></li>
    <li role="presentation" <?php echo ($_GET['p'] == "empresa") ? "class=active" : ""; ?>><a href="index.php?p=empresa"> EMPRESA</a></li>
    <li role="presentation" <?php echo ($_GET['p'] == "produtos") ? "class=active" : ""; ?>><a href="index.php?p=produtos"> PRODUTOS</a></li>
    <li role="presentation" <?php echo ($_GET['p'] == "servicos") ? "class=active" : ""; ?>><a href="index.php?p=servicos"> SERVICOS</a></li>
    <li role="presentation" <?php echo ($_GET['p'] == "contato" || $_GET['p'] == "submit_form") ? "class=active" : ""; ?>><a href="index.php?p=contato"> CONTATO</a></li>
</ul>
<hr>
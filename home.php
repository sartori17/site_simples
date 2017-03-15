<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 23:09
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php echo ucfirst(utf8_encode($titulo)); ?></title>
</head>

<body>

<?php require_once ("menu.php");?>
</body>

<h2><?php echo utf8_encode($titulo);?></h2>

<div class="container-fluid">
    <?php
    echo utf8_encode($descricao);
    ?>
</div>

<?php require_once ("rodape.php");?>
</html>

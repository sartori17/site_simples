<?php
if (isset($_GET['p'])) {
    $pagina = $_GET['p'];
} else {
    $pagina = "home";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php
        if (isset($_GET['p'])) {
            ucfirst($_GET['p']);
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
    if (file_exists($pagina . ".php") === true) {
        require_once($pagina . ".php");
    } elseif (isset($_GET['p'])) {
        ?><h2>Http error 404 - File Not found</h2><?php
    }
    ?>
</div>

<?php require_once ("rodape.php");?>
</html>

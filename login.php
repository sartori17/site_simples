<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 15/03/2017
 * Time: 20:37
 */
session_start();
require_once "conexaoDB.php";

//$passwd = password_hash ($pass, PASSWORD_DEFAULT);

function dados_usuario ($login)
{
    $conn = conexaoDB();

    $query = "select * from users u where nick = :nick ";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":nick", $login, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function login ($login, $pass)
{
    $user = dados_usuario($login);
    $hashed_password = $user['pass'];

    if (password_verify($pass, $hashed_password)) {
        session_start();
        $_SESSION['logado'] = 1;
        $_SESSION['user'] = $user;
        header('Location: home');
    } else {
        header('Location: acesso');
    }

    return null;
}

if (isset($_POST['InputLogin'])) {
    login($_POST['InputLogin'], $_POST['InputPass']);
}
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 23:00
 */

if (isset($_POST)) {
    $conteudo .= "Dados enviados com sucesso, abaixo seguem os dados que você enviou.<br>";
    $conteudo .=  "Nome: ".$_POST['nome']."<br>";
    $conteudo .=  "Email: ".$_POST['email']."<br>";
    $conteudo .= "Assunto: ".$_POST['assunto']."<br>";
    $conteudo .= "Mensagem: ".$_POST['mensagem']."<br>";
    $titulo = utf8_decode("Formulário");
    $descricao = utf8_decode($conteudo);
    require_once ("home.php");
}
?>
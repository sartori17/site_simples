<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 23:00
 */

if (isset($_POST)) {
    echo "Dados enviados com sucesso, abaixo seguem os dados que você enviou.<br>";
    echo "Nome: ".$_POST['nome']."<br>";
    echo "Email: ".$_POST['email']."<br>";
    echo "Assunto: ".$_POST['assunto']."<br>";
    echo "Mensagem: ".$_POST['mensagem']."<br>";
}
?>
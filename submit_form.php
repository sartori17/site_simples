<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 23:00
 */

function submit_form() {
    $titulo = "Contato";
    $conteudo = "";

    if (isset($_POST)) {
        $conteudo .= "Dados enviados com sucesso, abaixo seguem os dados que você enviou.<br>";
        $conteudo .=  "Nome: ".$_POST['nome']."<br>";
        $conteudo .=  "Email: ".$_POST['email']."<br>";
        $conteudo .= "Assunto: ".$_POST['assunto']."<br>";
        $conteudo .= "Mensagem: ".$_POST['mensagem']."<br>";
        $titulo = "Formulário";
    }

    $params['titulo'] = utf8_decode($titulo);
    $params['conteudo'] = utf8_decode($conteudo);

    return $params;
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 09/03/2017
 * Time: 22:01
 */

$conteudo = "";
if (isset($_POST['formulario_enviado'])) {
    $return = submit_form();
    $titulo = $return['titulo'];
    $conteudo = "<br>".$return['conteudo'];
}

return '
<form method="post" action="contato">
    <input type="hidden" id="formulario_enviado" name="formulario_enviado" value=1>
    <div class="form-group">
        <label for="InputNome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
    </div>

    <div class="form-group">
        <label for="InputEmail">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="InputAssunto">Assunto</label>
        <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto" required>
    </div>

    <div class="form-group">
        <label for="InputMensagem">Mensagem</label>
        <textarea class="form-control" rows="3" id="mensagem" name="mensagem"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
</form>' . $conteudo;


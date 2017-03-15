<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 14/03/2017
 * Time: 20:04
 */
require_once "conexaoDB.php";

$inputBusca = $_POST['inputBusca'];

$conn = conexaoDB();

$query = "select * from rotas r 
                left join conteudo c ON c.rota_id = r.id
                where descricao like :busca;";

$stmt = $conn->prepare($query);
$tipo_menu = 1;
//$stmt->bindParam(":busca", $inputBusca);
$stmt->execute(array(':busca' => '%'.$inputBusca.'%'));
$busca = $stmt -> fetchAll(PDO::FETCH_ASSOC);

foreach ($busca as $dados) {
    $conteudo .= "<div>";
    $conteudo .= "Item: ".++$x;
    $conteudo .= "<br>Página: ".strtoupper($dados['origem']);
    $conteudo .= "<br>Acesso: <a href=\"" .$dados['origem']. "\"> clique aqui </a>";
    $conteudo .= "</div><br>";
}

if (sizeof($busca) == 0) {
    $conteudo = "Nenhuma página possui o conteudo <b>" . $inputBusca . "</b>.";
}

$titulo = utf8_decode("Busca");
$descricao = utf8_decode($conteudo);
require_once ("home.php");

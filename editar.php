<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 17/03/2017
 * Time: 21:43
 */
if (!isset($_SESSION['logado'])) {
    header('Location: acesso');
}
require_once "conexaoDB.php";

$rota = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$path_completo = $rota['path'];

$path = explode("/", $path_completo);

if (is_array($path)) {
    $id = $path [2];
}

if (isset($_POST['atualizar_conteudo'])) {
    $inputTitulo = utf8_decode($_POST['inputTitulo']);
    $inputConteudo = utf8_decode($_POST['inputConteudo']);
    $inputDestino = $_POST['inputDestino'];
    $inputOrigem = $_POST['inputOrigem'];

    $conn = conexaoDB();

    $query = "UPDATE rotas set origem = :origem, destino = :destino WHERE id = :id LIMIT 1;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":origem", $inputOrigem, PDO::PARAM_STR);
    $stmt->bindParam(":destino", $inputDestino, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $query = "UPDATE conteudo set titulo = :titulo, conteudo = :conteudo WHERE rota_id = :id LIMIT 1;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":titulo", $inputTitulo, PDO::PARAM_STR);
    $stmt->bindParam(":conteudo", $inputConteudo, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}

$conn = conexaoDB();

$query = "select * from rotas r 
                left join conteudo c ON c.rota_id = r.id
                where r.id = :id";

$stmt = $conn->prepare($query);
$stmt -> bindParam (":id", $id, PDO::PARAM_INT);
$stmt->execute();
$busca = $stmt -> fetch(PDO::FETCH_ASSOC);
$conteudo = "";
//print_r($stmt->errorInfo());
$conteudo .= "<br>";

$dados = $busca;

$conteudo .= "<div>";
$conteudo .= "<form method=\"post\" action=\"".$path_completo."\">";
$conteudo .= "<input type='hidden' id='atualizar_conteudo' name='atualizar_conteudo' value='1'>";
$conteudo .= "ID: ".$dados['id']."<br>";
$conteudo .= "Link: <input type='text' id='inputOrigem' name='inputOrigem' value='".$dados['origem']."'><br>";
$conteudo .= "Destino: <input type='text' id='inputDestino' name='inputDestino' value='".$dados['destino']."'><br>";
$conteudo .= "Titulo: <input type='text' id='inputTitulo' name='inputTitulo' value='".utf8_encode($dados['titulo'])."'><br>";
$conteudo .= "Conteudo:<br> <textarea id=\"inputConteudo\" name=\"inputConteudo\" class=\"form-control\" rows=\"10\">".utf8_encode($dados['conteudo'])."</textarea><br>";
$conteudo .= "<input type='submit' class='btn btn-primary' value='Salvar'>";
$conteudo .= "</form>";
$conteudo .= "</div>";


if (sizeof($busca) == 0) {
    $conteudo = "Nenhuma página possui o conteúdo <b>" . $inputBusca . "</b>.";
}

return $descricao = utf8_decode($conteudo);
?>



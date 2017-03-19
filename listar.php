
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

$conn = conexaoDB();

$query = "select * from rotas r where tipo = 1";

$stmt = $conn->prepare($query);
$stmt->execute();
$busca = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conteudo = "<h2>Lista de rotas cadastradas</h2>";
//print_r($stmt->errorInfo());
$conteudo .= "<br>";
$conteudo .= "<table class='table table-striped table-hover table-condensed'>";
$conteudo .= "<tr>
<td>#</td>
<td>Página</td>
<td>Link</td>
<td>Exibir menu</td>
<td>Editar</td>
</tr>";
foreach ($busca as $dados) {
    $tipoLink = ($dados['tipo'] == 1) ? 'sim' : 'não';
    $conteudo .= "<tr>";
    $conteudo .= "<td> " . $dados['id'] . "</td>";
    $conteudo .= "<td>" . strtoupper($dados['origem']) . "</td>";
    $conteudo .= "<td><a href=\"" . $dados['origem'] . "\"> clique aqui </a></td>";
    $conteudo .= "<td> " . $tipoLink . "</td>";
    $conteudo .= "<td> <a href='editar/" . $dados['id'] . "' class='btn btn-sm'>editar</a></td>";
    $conteudo .= "</tr>";
}
$conteudo .= "</table><br>";

if (sizeof($busca) == 0) {
    $conteudo = "Nenhuma página possui o conteúdo <b>" . $inputBusca . "</b>.";
}

return $descricao = utf8_decode($conteudo);
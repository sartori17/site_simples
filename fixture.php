<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 13/03/2017
 * Time: 21:05
 */

require_once "conexaoDB.php";

echo "### Iniciando Fixture ###<br>";

$conn = conexaoDB();

$query = "SET NAMES utf8;";
echo "<br>".$query."<br>";
$conn->query($query);

$query = "DROP TABLE IF EXISTS `users`;";

$conn->query($query);
echo "<br>".$query."<br>";
$query = "CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; ";

$conn->query($query);
echo "<br>".$query."<br>";
$query = "INSERT INTO `users` (`id`, `nick`, `pass`, `name`, `email`) VALUES
(1,	'admin',	'$2y$10$6XCIgPf4Xwd9bBMorCJ5huwj83Ul3VFFpx4KPyF1wWLC4kDB8rGxK',	'Administrador',	'admin@admin.com');";

$conn->query($query);
echo "<br>".$query."<br>";

$query = "DROP TABLE IF EXISTS `rotas`;";

$conn->query($query);
echo "<br>".$query."<br>";
$query = "CREATE TABLE `rotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origem` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";

$conn->query($query);
echo "<br>".$query."<br>";
$query = "INSERT INTO `rotas` (`id`, `origem`, `destino`, `tipo`, `ordem`) VALUES
(1,	'contato',	'contato.php',	1,	5),
(2,	'empresa',	'empresa.php',	1,	2),
(3,	'produtos',	'produtos.php',	1,	3),
(4,	'servicos',	'servicos.php',	1,	4),
(5,	'home',	'homepage.php',	1,	1),
(6,	'submit_form',	'submit_form.php',	0,	0),
(7,	'404',	'404.php',	0,	0),
(8,	'acesso',	'acesso.php',	0,	0),
(9,	'busca',	'busca.php',	0,	0),
(10,	'editar',	'editar.php',	0,	0),
(11,	'listar',	'listar.php',	1,	6);
SET NAMES utf8mb4;";

$conn->query($query);
echo "<br>".$query."<br>";

$query = "DROP TABLE IF EXISTS `conteudo`; ";
$conn->query($query);
echo "<br>".$query."<br>";
$query = "CREATE TABLE `conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rota_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rota_id` (`rota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";

$conn->query($query);
echo "<br>".$query."<br>";
$query = "INSERT INTO `conteudo` (`id`, `rota_id`, `titulo`, `conteudo`) VALUES
(1,	1,	'Contato',	''),
(2,	2,	'Empresa',	'<p>&quot;Lorem ipsum ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua . Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat . Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur . Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum . &quot;</p>\r\n'),
(3,	3,	'Produtos',	'\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master - builder of human happiness . No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful . Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure . To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it ? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure ? \"'),
(4,	4,	'Serviços',	'<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the c<span style=\"font - family:Arial,Helvetica,sans - serif\">harms of pleasure of the momen</span>t, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain . These cases are perfectly simple and easy to distinguish . In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided .<strong> But in certain circumstances </strong>and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted . The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains . &quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>456</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n'),
(5,	5,	'Home',	'<li>O que é Lorem Ipsum?</li>\r\n    <li>\r\n    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.\r\n    </li>\r\n    <li>\r\n    Porque nós o usamos?\r\n    </li>\r\n    <li>\r\n    É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de \"Conteúdo aqui, conteúdo aqui\", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por \'lorem ipsum\' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).\r\n    </li>'),
(6,	6,	'',	''),
(7,	7,	'Http error 404 - File Not found',	''),
(8,	8,	'Acesso',	''),
(9,	9,	'Busca',	''),
(10,	10,	'Administração',	'');";

$conn->query($query);
echo "<br>".$query."<br>";
echo "<br>### Finalizando Fixture ###";


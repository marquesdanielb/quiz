<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'admin');
define('SENHA', 'sistema');
define('DB', 'quiz');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Algo de errado não está certo!');
?>

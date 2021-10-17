<?php 
include 'db.php';
$query = "SELECT * FROM questoes";
$total_questoes = mysqli_num_rows(mysqli_query($conexao, $query));


?>
<html>
<head>
	<title>Perguntas e Respostas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
		<div class="container">
			<a href="index.php"><h1>Perguntas e Respostas</h1></a>
		</div>
	</header>

	<main>
			<div class="container">
				<h2>Vamos testar seu conhecimento :D</h2>
				<p>
					Esse é um quizz para testar seus conhecimentos gerais. Respire fundo e vamos lá!
				</p>
				<ul>
					<li><strong>Número de questões:</strong><?php echo $total_questoes; ?> </li>
					<li><strong>Tipo de questões:</strong> Multipla escolha</li>
					<li><strong>Estimativa de tempo:</strong> <?php echo $total_questoes*1.5; ?></li>

				</ul>

				<a href="question.php?n=1" class="start">Começar o quizz</a>

			</div>

	</main>


	<footer>
			<div class="container">
				Copyright @_marquesdanielb; DANIEL MARQUES BARBOSA
			</div>


	</footer>

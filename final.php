<?php

session_start();

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
				<h2>Seu resultado</h2>
				<p>Parabéns! Você completou o teste corretamente.</p>
				<p>Sua <strong>pontuação</strong> é <?php echo $_SESSION['pontos']; ?>  </p>
				<?php unset($_SESSION['pontos']); ?>

			</div>

	</main>


	<footer>
			<div class="container">
				Copyright @_marquesdanielb; DANIEL MARQUES BARBOSA
			</div>


	</footer>

</body>
</html>
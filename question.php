<?php
	include 'db.php';
	session_start();
	//Setando número da questão
	$num = $_GET['n'];

	//Query para a table 'questoes'
	$query = "SELECT * FROM questoes WHERE questao_num = $num";
	
	//Pegando a questão na tabela
	$result = mysqli_query($conexao, $query);
	$questao = mysqli_fetch_assoc($result);
	
	//Pegando as escolhas
	$query = "SELECT * FROM opcoes WHERE questao_num = $num";
	$escolhas = mysqli_query($conexao, $query);
	
	// Pegando o total de questões
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
				<div class="current">Pergunta <?php echo $num; ?> de 10</div>
				<p class="questao"><?php echo $questao['questao_txt']; ?> </p>
				<form method="POST" action="process.php">
					<ul class="escolhass">
						<?php while($linha=mysqli_fetch_assoc($escolhas)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $linha['id']; ?>"><?php echo $linha['opcao']; ?></li>
						<?php } ?>
					</ul>
					<input type="hidden" name="numero" value="<?php echo $num; ?>">
					<input type="submit" name="Responder" value="Responder">
				</form>
			</div>
	</main>

	<footer>
			<div class="container">
				Copyright @_marquesdanielb; DANIEL MARQUES BARBOSA
			</div>
	</footer>
</body>
</html>
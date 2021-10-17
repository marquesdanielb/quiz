<?php  include 'db.php';
if(isset($_POST['Cadastrar'])){
	$questao_num = $_POST['questao_num'];
	$questao_txt =$_POST['questao_txt'];
	$opcao_correta = $_POST['opcao_correta'];

	// Array de escolhas
		$escolha = array();
		$escolha[1] = $_POST['escolha1'];
		$escolha[2] = $_POST['escolha2'];
		$escolha[3] = $_POST['escolha3'];
		$escolha[4] = $_POST['escolha4'];
		$escolha[5] = $_POST['escolha5'];

	 // Primeiro Query para a tabela `questoes`
		$query = "
				INSERT INTO questoes
					(questao_num, questao_txt)
				VALUES
					('{$questao_num}','{$questao_txt}')
				";

		$result = mysqli_query($conexao, $query);

	//Validando o primeiro query
		if($result){
			foreach($escolha as $opcao => $value){
				if($value != ""){
					if($opcao_correta == $opcao){
						$is_correct = 1;
					}else{
						$is_correct = 0;
					}
			unset($opcao);


	// Segundo Query para a tabela `opcoes`
		$query = "
				INSERT INTO opcoes
					(questao_num, is_correct, opcao)
				VALUES
					('{$questao_num}','{$is_correct}','{$value}')
				";
		$cadastra_linha = mysqli_query($conexao, $query);

	// Validando a inserção de perguntas
	if($cadastra_linha){
		continue;
	}else{
		die("Revise sua pergunta por favor" . $query);
				}

			}
		}
		$msg = "Sua pergunta foi cadastrada com sucesso";
	}

}

		$query = "SELECT * FROM questoes";
		$questoes = mysqli_query($conexao, $query);
		$total = mysqli_num_rows($questoes);
		$proxima = $total+1;

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

				<h2>Adicione uma pergunta</h2>
				<?php if(isset($msg)){
					echo "<h4>" . $msg . "</h4>";
				} ?>

				<form method="POST" action="add.php">
						<p>
							<label>Pergunta número:</label>
							<input type="number" name="questao_num" value="<?php echo $proxima;  ?>">
						</p>
						<p>
							<label>enunciado:</label>
							<input type="text" name="questao_txt">
						</p>
						<p>
							<label>escolha 1:</label>
							<input type="text" name="escolha1">
						</p>
						<p>
							<label>escolha 2:</label>
							<input type="text" name="escolha2">
						</p>
						<p>
							<label>escolha 3:</label>
							<input type="text" name="escolha3">
						</p>
						<p>
							<label>escolha 4:</label>
							<input type="text" name="escolha4">
						</p>
						<p>
							<label>escolha 5:</label>
							<input type="text" name="escolha5">
						</p>
						<p>
							<label>Opção correta número</label>
							<input type="number" name="opcao_correta">
						</p>
						<input type="submit" name="Cadastrar" value ="Cadastrar">
						<a href="index.php" class="button">Sair</a>


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
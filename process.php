<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php
	//Zerando os pontos.
	if(isset($_SESSION['pontos'])){
		$_SESSION['pontos'] = 0;
	}
 if($_POST){
	//Pegando o total de questões 
 	$query = "SELECT * FROM questoes";
	$total_questoes = mysqli_num_rows(mysqli_query($conexao, $query));

 	$num = $_POST['numero'];

	//Gravando a escolha do usuário
 	$escolha_selecionada = $_POST['escolha'];

	//Próxima questão
 	$proxima = $num+1;

	//Determinando a questão correta
 	$query = "SELECT * FROM opcoes WHERE questao_num = $num AND is_correct = 1";
 	 $result = mysqli_query($conexao, $query);
 	 $linha = mysqli_fetch_assoc($result);

 	 $opcao_correta = $linha['id'];

	//Pontuando o Usuário se a opção estiver correta
 	 if($escolha_selecionada == $opcao_correta){
 	 	$msg = 'Você acertou essa questão';
 	 	$_SESSION['pontos']++;
 	 }else{
 	 	$msg = 'Você não acertou essa pergunta. A alternativa correta era:';
 	 }
		//Redirecionando para a próxima questão.
 	 if($num == $total_questoes){
 	 	header("LOCATION: final.php");
 	 }else{
 	 	header("LOCATION: question.php?n=". $proxima);
 	}

 }
?>
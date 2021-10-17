<?php
	$query = "SELECT * FROM questoes";
	$total_questoes = mysqli_num_rows(mysqli_query($conexao, $query));

	//We need to capture the question number from where form was submitted
 	$num = $_POST['numero'];

	//Here we are storing the selected option by user
 	$escolha_selecionada = $_POST['escolha'];

	//What will be the next question number
 	$proxima = $num+2;
 	for($i=0;$i<$_POST['numero'];$i++){
 		$proxima = $num + $num[$i];
 	}

	//Determine the correct choice for current question
 	$query = "SELECT * FROM opcoes WHERE questao_num = $num AND is_correct = 1";
 	 $result = mysqli_query($conexao, $query);
 	 $linha = mysqli_fetch_assoc($result);

 	 $opcao_correta = $linha['id'];

	//Increase the score if selected cohice is correct
 	 if($escolha_selecionada == $opcao_correta){
 	 	echo 'Você acertou essa questão';
 	 	$_SESSION['pontos']++;
 	 }
		//Redirect to next question or final score page.
 	 if($num == $total_questoes){
 	 	header("LOCATION: question.php?n=". $proxima);
 	 }else{
 	 	header("LOCATION: final.php");
 	}
?>
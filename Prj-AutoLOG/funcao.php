<?php

	if(isset($_POST['entrar']) && $_POST['entrar'] == "login"){
		//echo "cliquei";

		$email = $_POST['email'];
		$senha = $_POST['senha'];	

		$conecta = mysqli_connect("localhost","root","","marte");

		if(!$conecta){
			echo "Erro ao conectar-se com o banco!";
		}else{

			if(empty($email) || empty($senha)){
				echo "Preencha todos os campos!";
			}else{

				$query 	= " SELECT epa.account_id
								  ,epa.login login
								  ,(select tp_account
								      from exp_account_all b
								     where b.account_id = epa.account_id) tp_account
							  from exp_profiles_all epa
							 where epa.login = '$email' 
							   and epa.password = '$senha'";

				$result = mysqli_query($conecta,$query);

				if(mysqli_num_rows($result) > 0){

					while($linha = mysqli_fetch_assoc($result)){
							session_start();
							$_SESSION['account_id'] = $linha['account_id'];
							$_SESSION['email_usu'] = $linha['login'];
							$_SESSION['tp_account'] = $linha['tp_account'];
							
							if($linha['tp_account'] == 2){
							  header("location:index.php");
							}else{
							  header("location:cli/index_cli.php");
							}
						}

				}else{
					echo "Usuário ou senha incorreta.";
					mysqli_close($conecta);
					header("location:login.php");
				}
				
				mysqli_close($conecta);

			}
		}

	}
?>
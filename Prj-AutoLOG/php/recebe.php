<html>

<head>

	<title>Email conexao</title>

</head>

<body>

<?php

	include_once("../php/get_info.php");
    session_start();

	$data_envio = date('d/m/Y');
	$hora_envio= date('H:i:s',time()-18000);

	$msg   = "Prezado(a), </br>
			 Vi seu anuncio através do TruckExpress e me interessei pelos seus serviços. Gostaria de conversar com você sobre um possível contrato.</br>
			 Caso haja interesse, favor entrar em contato pelo telefone: +".$linha['COUNTRY_CODE']." (".$linha['AREA_CODE'].") ".$linha['PHONE']."</BR></br>
			 Desde já, obrigado.</br>
			 Atenciosamente,</br>".$_SESSION['NOME'];

	$email = $_SESSION['email_usu'];
	$to    = trim($_POST['to']);
?>
	
<?php
	
	//enviar email
	$headers = "from: ".$email;

	$corpoemail = 'fale conosco
				   email: '.$email.'
				   Mensagem: '.$msg.'
				   data: '.$data_envio.'
				   hora: '.$hora_envio.'	
						';

	if(mail($to, "Proposta de contrato - TruckExpress", $corpoemail, $headers)){
		echo "<script>alert('Email enviado com sucesso!!');</script>";
	}

	else{
		echo "<script>alert('Erro ao Enviar o email, Por Favor contate-nos diretamente através do email: truckexpress@gmail.com');</script>";
	}
?>

</body>
</html>

<?php

	//remover Dados da Sessão
	@session_start();
	session_destroy();
	unset($_SESSION);
	header("location:login.php");
	exit;

 ?>
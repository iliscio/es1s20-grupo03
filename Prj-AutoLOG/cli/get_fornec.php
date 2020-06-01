<?php

    include_once("../funcao.php");
    session_start();

    $account_id = $_SESSION['account_id'] ;

    echo "Id: ".$account_id;

	$conecta = mysqli_connect("localhost","root","","marte");

		if(!$conecta){
			echo "Erro ao conectar-se com o banco!";
		}else{

			$query 	= " SELECT EAA.NOME NOME
							  ,EAA.TP_ACCOUNT TP_ACCOUNT
							  ,EAA.DOCUMENT DOCUMENT
							  ,ECA.EMAIL_ADDRESS EMAIL_ADDRESS
							  ,ELA.POSTAL_CODE POSTAL_CODE
							  ,ELA.STREET STREET
							  ,ELA.NUM NUM
							  ,ELA.CITY CITY
							  ,ELA.ADDRESS ADDRESS
							  ,ELA.ADDRESS2 ADDRESS2
							  ,ELA.COUNTRY COUNTRY
							  ,ELA.STATE STATE
					     FROM EXP_ACCOUNT_ALL   EAA
					  		 ,EXP_CONTACT_ALL   ECA
					  		 ,EXP_LOCATIONS_ALL ELA
					    WHERE EAA.ACCOUNT_ID = ECA.ACCOUNT_ID
					      AND EAA.ACCOUNT_ID = ELA.ACCOUNT_ID 
					      AND EAA.tp_account = 2";

			$result = mysqli_query($conecta,$query);

			if(mysqli_num_rows($result) > 0){

				while($linha = mysqli_fetch_assoc($result)){
						//session_start();
						$linha['NOME'];
						$linha['TP_ACCOUNT'];
						$linha['DOCUMENT'];
					    $linha['EMAIL_ADDRESS'];
						$linha['POSTAL_CODE'];
						$linha['STREET'];
						$linha['NUM'];
						$linha['CITY'];
						$linha['ADDRESS'];
						$linha['ADDRESS2'];
						$linha['COUNTRY'];
						$linha['STATE'];
					}

			}
			mysqli_close($conecta);
		}
?>
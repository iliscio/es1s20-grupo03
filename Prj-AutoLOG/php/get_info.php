<?php

	function nvl($var, $default = "")
	{
	    return isset($var) ? $var
	                       : $default;
	}

    include_once("../funcao.php");
    session_start();

    $account_id = $_SESSION['account_id'] ;

    //echo "Id: ".$account_id;

	$conecta = mysqli_connect("localhost","root","","marte");

		if(!$conecta){
			echo "Erro ao conectar-se com o banco!";
		}else{

			$query 	= " SELECT EAA.NOME NOME
							  ,EAA.TP_ACCOUNT TP_ACCOUNT
							  ,EAA.DOCUMENT_TYPE DOCUMENT_TYPE
							  ,EAA.DOCUMENT DOCUMENT
							  ,ECA.PHONE PHONE
							  ,ECA.AREA_CODE AREA_CODE
							  ,ECA.COUNTRY_CODE COUNTRY_CODE
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
					      AND EAA.ACCOUNT_ID = $account_id";

			$result = mysqli_query($conecta,$query);

			if(mysqli_num_rows($result) > 0){

				while($linha = mysqli_fetch_assoc($result)){
						//session_start();
						$_SESSION['NOME'] = nvl($linha['NOME'],' ');
						$_SESSION['DOCUMENT_TYPE'] = nvl($linha['DOCUMENT_TYPE'],' ');
						$_SESSION['TP_ACCOUNT'] = nvl($linha['TP_ACCOUNT'],' ');
						$_SESSION['DOCUMENT'] = nvl($linha['DOCUMENT'],' ');
						$_SESSION['EMAIL_ADDRESS'] = nvl($linha['EMAIL_ADDRESS'],' ');
						$_SESSION['POSTAL_CODE'] = nvl($linha['POSTAL_CODE'],' ');
						$_SESSION['STREET'] = nvl($linha['STREET'],' ');
						$_SESSION['NUM'] = nvl($linha['NUM'],' ');
						$_SESSION['CITY'] = nvl($linha['CITY'],' ');
						$_SESSION['ADDRESS'] = nvl($linha['ADDRESS'],' ');
						$_SESSION['ADDRESS2'] = nvl($linha['ADDRESS2'],' ');
						$_SESSION['COUNTRY'] = nvl($linha['COUNTRY'],' ');
						$_SESSION['STATE'] = nvl($linha['STATE'],' ');
						$_SESSION['PHONE'] = nvl($linha['PHONE'],' ');
						$_SESSION['AREA_CODE'] = nvl($linha['AREA_CODE'],' ');
						$_SESSION['COUNTRY_CODE'] = nvl($linha['COUNTRY_CODE'],' ');
						
						//echo "DOCUMENT: ".$_SESSION['DOCUMENT'];
						//echo 'Estado: '.$_SESSION['STATE'];
						//header("location:index.php");
					}

			}
			mysqli_close($conecta);
		}
?>
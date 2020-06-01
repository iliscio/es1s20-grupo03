<?php
	function nvl($var, $default = "")
	{
	    return isset($var) ? $var
	                       : $default;
	}


   	$conecta = mysqli_connect("localhost","root","","marte");

		if(!$conecta){
			echo "Erro ao conectar-se com o banco!";
		}else{

			$query 	= " SELECT UPPER(EAA.NOME) NOME
							  ,EAA.TP_ACCOUNT TP_ACCOUNT
							  ,(SELECT ETA.NAME 
							      FROM exp_transport_all ETA
							     WHERE ETA.ACCOUNT_ID = EAA.ACCOUNT_ID) TRANSPORTE
							  ,ECA.PHONE PHONE
							  ,ECA.AREA_CODE AREA_CODE
							  ,ECA.COUNTRY_CODE COUNTRY_CODE
							  ,EAA.DOCUMENT_TYPE DOCUMENT_TYPE
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
					      AND EAA.TP_ACCOUNT = 2";

			$result = mysqli_query($conecta,$query);

			if(mysqli_num_rows($result) > 0){

				while($linha = mysqli_fetch_assoc($result)){

					   echo '<div class="card mb-4 shadow-sm">
					          <div class="card-header">
					            <h4 class="my-0 font-weight-normal">'.$linha['NOME'].'</h4>
					          </div>
					          <div class="card-body">
					            <h1 class="card-title pricing-card-title"><small class="text-muted">'.nvl($linha['TRANSPORTE'],"N/A").'</small></h1>
					            <ul class="list-unstyled mt-3 mb-4">
					              <li><h5>Celular</h5></li>
					              <li>'.$linha['COUNTRY_CODE'].$linha['AREA_CODE'].$linha['PHONE'].'</li>
					              <li><h5>Email</h5></li>
					              <li>'.$linha['EMAIL_ADDRESS'].'</li>
					            </ul>
					            <button type="button" id="'.$linha['EMAIL_ADDRESS'].'" class="enviaEmail btn btn-lg btn-block btn-outline-primary">Contatar</button>
					          </div>
					        </div>';
					}

			}
			mysqli_close($conecta);
		}
?>
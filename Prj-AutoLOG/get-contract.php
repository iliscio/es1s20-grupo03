<?php
	
	if(isset($_GET['idQuery'])){

		$idQuery = $_GET['idQuery'];

		//echo "<script type=\"text/javascript\"> console.log(\"Query = ".$idQuery."\"); </script>'";

		$query = '';

		$where = '';
		
		 switch($idQuery){
			 case 4:
			 	 $select = "select eca.contract_id 	 id,	
								   eaa.nome  	     empresa, 
								   eaa.document 	 cnpj, 
								   eca.status 		 status,
								   eca.delivery_date data_entrega, 
								   eca.creation_date data_contrato 
						      from exp_contract_all eca
						  		  ,exp_account_all  eaa
						     WHERE eca.engaged = eaa.account_id ";
			 	break;
			 default:
			      $select = "select eca.contract_id 	 id,	
								    eaa.nome  	     empresa, 
								    eaa.document 		 cnpj, 
								    eca.delivery_date data_entrega, 
								    eca.creation_date data_contrato 
						       from exp_contract_all eca
						  		   ,exp_account_all  eaa
						      WHERE eca.engaged = eaa.account_id";
                    }
		$order_by = ' order by eca.delivery_date';	 

		if ($idQuery == 1){

			$where 	= " and upper(eca.status) = 'WORKING' ";

		}else if($idQuery == 2){

			$where 	= " and upper(eca.status) = 'OPEN' ";

		}else if($idQuery == 3){
			
			$where = " and upper(eca.status) = 'CLOSED'";

		}else{
			$where = " and 1=1";
		}

			$conecta = mysqli_connect("localhost","root","","marte");

			if(!$conecta){
				echo "Erro ao conectar-se com o banco!";
			}else{

					$query = $select.$where.$order_by;

					//echo "<script type=\"text/javascript\"> console.log(\"Query = ".$query."\"); </script>'";

					$result = mysqli_query($conecta,$query);
					$qtd = 1;
					if(mysqli_num_rows($result) > 0){
						$qtd = 0;
						while($linha = mysqli_fetch_assoc($result)){
							$qtd =+ $qtd;
							if ($idQuery == 4){
							echo "<tr>
								   <td>".$linha['id']."</td>
								   <td>".$linha['empresa']."</td>
								   <td>".$linha['cnpj']."</td>
								   <td>".$linha['status']."</td>
								   <td>".$linha['data_entrega']."</td>
								   <td>".$linha['data_contrato']."</td>
								 </tr>";
							}else{
							echo "<tr>
								   <td>".$linha['id']."</td>
								   <td>".$linha['empresa']."</td>
								   <td>".$linha['cnpj']."</td>
								   <td>".$linha['data_entrega']."</td>
								   <td>".$linha['data_contrato']."</td>
								 </tr>";
							}	 
						/*	echo $linha['id'];
							echo $linha['empresa'];
							echo $linha['cnpj'];
							echo $linha['data_entrega'];
							echo $linha['data_contrato'];*/
						}

						for($i = $qtd; $i <= 21; $i++){
							if ($idQuery == 4){
							echo "<tr>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								 </tr>";
							}else{
							echo "<tr>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								   <td>&nbsp;</td>
								 </tr>";
							}
							
						}

					}
					
					mysqli_close($conecta);

			}
	}

?>
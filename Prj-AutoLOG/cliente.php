<?php

	function insere($tipo,$account){

		$vsysdate = date('d/m/Y H:i:s');
		$return = false;
		if($tipo == 'location'){

			$number = $_POST['number'];
			$street = $_POST['street'];
			$postal_code = $_POST['postal_code'];
			$country = $_POST['country'];
			$state = str_replace("'", "\"", $_POST['state']);
			$city = str_replace("'", "\"", $_POST['city']);
			$address = str_replace("'", "\"", $_POST['address']);
			$address2 = str_replace("'", "\"", $_POST['address2']);

			$sql = "INSERT INTO exp_locations_all (account_id
												  ,num
												  ,street
												  ,postal_code
												  ,country
												  ,state
												  ,city
												  ,address
												  ,address2
												  ,status
												  ,created_by
												  ,creation_date
												  ,updated_by
												  ,update_date) 
										   VALUES($account
										   		 ,$number
										   		 ,'$street'
										   		 ,'$postal_code'
										   		 ,'$country'
										   		 ,'$state'
										   		 ,'$city'
										   		 ,'$address'
										   		 ,'$address2'
										   		 ,'A'
										   		 ,-1
										   		 ,'$vsysdate'
										   		 ,-1
										   		 ,'$vsysdate')";
		}else if($tipo == 'contact'){

			$email_address = $_POST['email_address'];
			$phone = $_POST['phone'];
			$area_code = $_POST['area_code'];
			$country_code = $_POST['country_code'];

				$sql = "INSERT INTO exp_contact_all (account_id
													 ,email_address
													 ,contact_type
													 ,area_code
													 ,country_code
													 ,phone
													 ,status
													 ,created_by
													 ,creation_date
													 ,updated_by
												  	 ,update_date) 
											   VALUES($account
											   		 ,'$email_address'
											   		 ,'EMAIL'
											   		 ,$area_code
											   		 ,$country_code
											   		 ,$phone
											   		 ,'A'
											   		 ,-1
											   		 ,'$vsysdate'
											   		 ,-1
											   		 ,'$vsysdate')";
		}else if($tipo == 'profiles'){

			$email_address = $_POST['email_address'];
			$password = $_POST['password'];

				$sql = "INSERT INTO exp_profiles_all (account_id
													 ,login
													 ,password
													 ,status
													 ,created_by
													 ,creation_date
													 ,updated_by
												  	 ,update_date) 
											   VALUES($account
											   		 ,'$email_address'
											   		 ,'$password'
											   		 ,'A'
											   		 ,-1
											   		 ,'$vsysdate'
											   		 ,-1
											   		 ,'$vsysdate')";
		}else if($tipo == 'account'){

				$account_type = $_POST['account_type'];
				$document_type = $_POST['document_type'];

				$document = $_POST['documento'];
				
				$name = $_POST['name'];

				$sql = "INSERT INTO exp_account_all (account_id
													 ,nome
													 ,status
													 ,tp_account
													 ,document
													 ,document_type
													 ,created_by
													 ,creation_date
													 ,updated_by
												  	 ,update_date) 
											   VALUES($account
											   		 ,'$name'
											   		 ,'A'
											   		 ,'$account_type'
											   		 ,'$document'
											   		 ,'$document_type'
											   		 ,-1
											   		 ,'$vsysdate'
											   		 ,-1
											   		 ,'$vsysdate')";
		}

		// Create connection
		$conn = mysqli_connect("localhost","root","","marte");
		// Check connection
		if (!$conn) {
		      die("Connection failed: " . mysqli_connect_error());
		}
		if (mysqli_query($conn, $sql)) {
		   // echo "Cadastro efetuado com Sucesso!";
		    $resp = 'true';
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);

		return $resp;

	}

	function select($campo,$query_out){
		$query = $query_out;
		$conecta = mysqli_connect("localhost","root","","marte");
		if(!$conecta){
			echo "Erro ao conectar-se com o banco!";
		}else{
			$result = mysqli_query($conecta,$query);		
			if(mysqli_num_rows($result) > 0){
				while($linha = mysqli_fetch_assoc($result)){
					$v_resp = $linha[''.$campo.''];
				}
			}
		}
		mysqli_close($conecta);
		return $v_resp;
	}

?>
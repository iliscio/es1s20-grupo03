<?php
 

	function altera($tipo){

		$vsysdate = date('d/m/Y H:i:s');
		$account_id = $_POST['account_id'];
		$resp = false;


		if($tipo == 'account')
		{

			

		$document_type = $_POST['document_type'];
		$nome = $_POST['name'];
		$document = $_POST['document'];

			$sql = "UPDATE exp_account_all
			           SET nome = '$nome'
			           	  ,document = '$document'
			           	  ,document_type = $document_type  
			           	  ,update_date = '$vsysdate'
			           	  ,updated_by = $account_id 
			         WHERE account_id = $account_id";

		}else if($tipo == 'contact'){

			$email_address = $_POST['email_address'];
			$area_code = $_POST['area_code'];
			$country_code = $_POST['country_code'];
			$phone = $_POST['phone']; 

			$sql = "UPDATE exp_contact_all
			           SET email_address = '$email_address'
			           	  ,area_code = $area_code
			           	  ,country_code = $country_code  
			           	  ,phone = '$phone'
			           	  ,updated_by = $account_id 
			           	  ,update_date = '$vsysdate'
			         WHERE account_id = $account_id";

		}else if($tipo == 'location'){

			$num = $_POST['num'];
			$street = $_POST['street'];
			$postal_code = $_POST['postal_code'];
			$country = $_POST['country']; 
			$state = $_POST['state'];
			$city = $_POST['city'];
			$address = $_POST['address'];
			$address2 = $_POST['address2'];


			$sql = "UPDATE exp_locations_all
			           SET num = $num
			           	  ,street = '$street'
			           	  ,postal_code = '$postal_code'
			           	  ,country = '$country'
			           	  ,state = '$state'
			           	  ,city = '$city'
			           	  ,address = '$address'
			           	  ,address2 = '$address2'
			           	  ,update_date = '$vsysdate'
			           	  ,updated_by = $account_id 
			         WHERE account_id = $account_id";

		}


		// Create connection
		$conn = mysqli_connect("localhost","root","","marte");
		// Check connection
		if (!$conn) {
		      die("Connection failed: " . mysqli_connect_error());
		}
		if (mysqli_query($conn, $sql)) {
		   // echo "Cadastro efetuado com Sucesso!";
		    $resp = true;
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);

		return $resp;

	}

?>
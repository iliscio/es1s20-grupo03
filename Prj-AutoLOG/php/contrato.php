<?php

function insereContrato(){
  $resp = false;

     $vsysdate = date('d/m/Y H:i:s');

     $arquivo = $_FILES["file"]["tmp_name"];
     $tamanho = $_FILES["file"]["size"];
     $tipo    = $_FILES["file"]["type"];
     $nome    = $_FILES["file"]["name"];

     $contractor    = $_POST["contractor"];
     $engaged       = $_POST["engaged"];
     $status        = $_POST["status"];
     $delivery_date = $_POST["delivery_date"];

      if ( $arquivo != "none" )
      {
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
      }

     $sql = "INSERT INTO exp_contract_all (
                            file
                            ,contractor
                            ,engaged
                            ,status
                            ,delivery_date
                            ,created_by
                            ,creation_date
                            ,updated_by
                            ,update_date) 
                         VALUES('$conteudo'
                             ,'$contractor'
                             ,'$engaged'
                             ,'$status'
                             ,'$delivery_date'
                             ,-1
                             ,'$vsysdate'
                             ,-1
                             ,'$vsysdate')";

     // Create connection
    $conn = mysqli_connect("localhost","root","","marte");
   //$conn->exec("set names utf8"); 
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
 ?>
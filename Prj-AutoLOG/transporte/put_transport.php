<?php

// Create connection

$conn = mysqli_connect("localhost","root","","marte");

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 $vsysdate = date('d/m/Y \à\s H:i:s');
 echo "Connected successfully";
 
$sql = "INSERT INTO Students (transport_id, name, account_id, license_plate, created_by, creation_date, last_updated_by, last_updated_date) VALUES (,'-1',$vsysdate,'-1',$vsysdate)";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
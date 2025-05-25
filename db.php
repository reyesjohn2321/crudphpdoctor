<?php
 $host = "localhost";
 $user = "root";
 $pass = "";
 $port = 3306;
 $dbname = "crud";



$conn = new mysqli($host,$user,$pass,$dbname);

if($conn -> connect_error){
    //check connection
    die( "connection error " . $conn->connect_error) ;



}
  echo "connected succesfully";
  /*Create table doctor

docID int primary key auto_increment,
docFName text,
docLName text,
docAddress text,
docSpecialty text;




*/

?>
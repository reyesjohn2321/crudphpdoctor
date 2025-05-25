<?php  include "db.php";

if (isset($_POST['update']))
{

    $docID= $_POST['docID'];
    $docFName = $_POST['docFName'];
     $docLName = $_POST['docLName'];
     $docAddress = $_POST['docAddress'];
     $docSpecialty = $_POST['docSpecialty'];

     $conn -> query("UPDATE doctor SET 

            docFName = '$docFName',
            docLName = '$docLName',
            docAddress = '$docAddress',
            docSpecialty = '$docSpecialty'
            WHERE docID = $docID 
     ");

    header("location:doctor.php");
}



?>
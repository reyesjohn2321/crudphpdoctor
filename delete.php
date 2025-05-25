<?php include "db.php" ;

$id = $_GET ['id'];
$conn -> query("DELETE FROM doctor where docID=$id");
header("location:doctor.php")




?>
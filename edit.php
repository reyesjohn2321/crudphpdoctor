<?php include "db.php" ;

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM doctor WHERE DOCid=$id");
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="POST">
    <label>DOC ID</label>
    <input type ="hidden" name = "docID" value="<?= $row['docID']?>"><br>
    <label>First name</label><br>
    <input type = "text" name = "docFName" value="<?= $row['docFName']?>"><br>
    <label>last name</label><br>
    <input type = "text" name = "docLName" value="<?= $row['docLName']?>"><br>
    <label>address</label><br>
    <input type = "text" name = "docAddress" value="<?= $row['docAddress']?>"><br>
    <label>Specialty</label><br>
    <input type = "text" name = "docSpecialty" value="<?= $row['docSpecialty']?>"><br>
    <button type= "submit" name = "update"> submit</button>
    </form>
</body>
</html>
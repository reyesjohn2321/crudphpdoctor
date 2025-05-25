<?php include "db.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST">
        <label>Name</label><br>
                <input type = "text" name ="docFName" required ><<br>

        <label>Last Name</label><br>
        <input type = "text" name ="docLName" required><br>

        <label>Address</label><br>
                <input type = "text" name ="docAddress" required><br>

        <label>Specialty</label><br>
                <input type = "text" name ="docSpecialty" required ><br>
        <button type = submit name = "add">Add Doctor</button>

    </form>

    <?php 
    
    if($_POST){
        $docFName = $_POST['docFName'];
        $docLName = $_POST['docLName'];
        $docAddress = $_POST['docAddress'];
        $docSpecialty = $_POST['docSpecialty'];
        $conn -> query ("INSERT INTO doctor (docFName,docLName,docAddress,docSpecialty)VALUES ('$docFName','$docLName','$docAddress','$docSpecialty')");
        header("location: doctor.php"
        );
        
    }
    ?>
    <table border= 1>
    <th>ID</th>
    <th>FIRST NAME </th>
    <th> LAST NAME </th>
    <th> ADDRESS   </th>
    <th> SPECIALTY  </th>
    <th> ACTIONS </th>

    <?php  
    $result = $conn->query ("SELECT * FROM doctor");
    while ($row = $result->fetch_assoc()) {
    ?>

    <tr>
        <td><?= $row['docID']?></td>
        <td><?= $row['docFName']?></td>
        <td><?= $row['docLName']?></td>
        <td><?= $row['docAddress']?></td>
        <td><?= $row['docSpecialty']?></td>
        <td> 
            <a href ="edit.php?id=<?= $row['docID'] ?>"> edit</a>
            <a href ="delete.php?id=<?= $row['docID'] ?>" onclick="return confirm('delete this user?')" >delete</a>
        </td>   
        
    </tr>
    <?php }     ?>
    </table>
</body>
</html>
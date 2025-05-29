<?php 
    
    include "db.php" ;
    $edit=false;
    $edited=null;

    
    // ADD DOCTOR 
    if(isset($_POST['add'])){
    $docFName = $_POST['docFName'];
    $docLName = $_POST['docLName'];
    $docAddress = $_POST['docAddress'];
    $docSpecialty = $_POST['docSpecialty'];
    $conn -> query("INSERT INTO doctor (docFName,docLName,docAddress,docSpecialty) VALUES ('$docFName','$docLName','$docAddress','$docSpecialty')");
    
    }
    
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $conn -> query("DELETE FROM doctor WHERE docID=$id");
        

    }
    
    if(isset($_GET['edit']))
    {   
        $edit=true;
        $id = $_GET['edit'];
         $result = $conn -> query("SELECT * FROM doctor WHERE docID=$id");
         $edited = $result -> fetch_assoc();
    }
    if(isset($_POST['update'])){
    $id = $_POST ['docID'];
    $name = $_POST['name'];
    $secname = $_POST['secname'];
    $address = $_POST['address'];
    $special = $_POST['special'];
    $conn -> query("UPDATE  doctor SET docFName='$name'
    ,docLName='$secname', docAddress='$address',docSpecialty='$special' WHERE docID=$id");
    header("location:doctor1.php");

    
    }
    ?>
    
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

     <?php 
    if($edit && $edited):?>
    <form method = "POST">
    <input type="hidden" name ="docID" value ="<?=$edited['docID']?>">
    FIRST NAME      : <input type ="text" name="name" value="<?=$edited['docFName']?>" required><br>
    LAST NAME       : <input type ="text" name="secname" value="<?=$edited['docLName']?>"required  ><br>
    ADDRESS NAME    : <input type ="text" name="address" value ="<?=$edited['docAddress']?>"required><br>
    SPECIALTY NAME  : <input type ="text" name ="special" value="<?=$edited['docSpecialty']?>" required><br>
    <a href="doctor1.php">Cancel Edit</a>
    <button type="submit" name="update">UPDATE DOCTOR </button>
    </form>
    <?php else :?>
    <br>
    <form method = "POST">
    FIRST NAME      : <input type ="text" name="docFName" required><br>
    LAST NAME       : <input type ="text" name="docLName"required ><br>
    ADDRESS NAME    : <input type ="text" name="docAddress" required><br>
    SPECIALTY NAME  : <input type ="text" name="docSpecialty" required><br>
    <button type="submit" name="add">ADD DOCTOR </button> 
    </form>
    
   <?php endif;?>
   <form method = "GET">
   <input type ="text" name ="find" required >
   <button type ="submit">SEARCH</button> <a href="doctor1.php">Back</a>
    </form>
    <table border=1>
    <tr>
        <th>ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>ADDRESS</th>
        <th>SPECIALTY</th>
        <th>ACTIONS</th>
    </tr>
    <?php 
    if(isset($_GET['find']))
    {
        $find =$_GET['find'];
       $result = $conn -> query("SELECT * FROM doctor WHERE docFName LIKE '%$find%' 
                                   OR docLName LIKE '%$find%' 
                                   OR docSpecialty LIKE '%$find%'
                                   OR docID='$find'");
    
    }
    else
    {

        $result = $conn -> query ("SELECT * FROM doctor");   
    }



    while($row = $result -> fetch_assoc())
    echo "

    <tr>
        <td>{$row['docID']}</td>
        <td>{$row['docFName']}</td>
        <td>{$row['docLName']}</td>
        <td>{$row['docAddress']}</td>
        <td>{$row['docSpecialty']}</td>
        <td>
        <a href='?edit={$row['docID']}'>Edit</a>
        <a href='?delete={$row['docID']}' onclick ='return confirm(\"are you sure you want to delete?\")'>Delete</a>
        </td>
    </tr>
    "
    ?>
    </table>
</body>
</html>
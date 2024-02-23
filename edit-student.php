<?php
    session_start();

    if (!isset($_SESSION['login'])){
        header('location:login.php');
        exit();
    }

    include "dbcon.php";

    if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    
    $select = "SELECT * FROM student WHERE idnumber = '$id'";
    $result = $conn->query($select);

    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $idno = $row['idnumber'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $mi = $row['mi'];
            $birth = $row['birthdate'];
            $yearsec = $row['year_section'];
        }
    }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <?php
        if (isset($_GET['notif'])){
            $message = $_GET['notif'];
            echo '<h2 style="color:blue;">' .$message .'</h2>';
        }
    ?>
    <form action="save-student.php" method="post">
        <table>
            <tr>
                <td>ID Number:</td>
                <td>
                    <input type="hidden" name="hiddenId" value="<?php echo $id; ?> "
                    <?php echo $idno ?>
                </td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" name="last" value ="<?php echo $lastname;?>"></td>
            </tr>
            <tr>
                <td>Firstname:</td>
                <td><input type="text" name="first" value ="<?php echo $firstname;?>"></td>
            </tr>
            <tr>
                <td>MI:</td>
                <td><input type="text" name="mi" value ="<?php echo $mi;?>"></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="text" name="birth" value ="<?php echo $birth;?>"></td>
            </tr>
            <tr>
                <td>Year & Section:</td>
                <td><input type="text" name="yearsec" value ="<?php echo $yearsec;?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Update" name="update">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php 
    session_start();

    if (!isset($_SESSION['login'])){
        header('location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Student</title>
</head>
<body>
    <h1>New Student</h1>
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
                <td><input type="text" placeholder="ID Number" name="idno"></td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" placeholder="Lastname" name="last"></td>
            </tr>
            <tr>
                <td>Firstname:</td>
                <td><input type="text" placeholder="Firstname" name="first"></td>
            </tr>
            <tr>
                <td>MI:</td>
                <td><input type="text" placeholder="MI" name="mi"></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="text" placeholder="Birthdate" name="birth"></td>
            </tr>
            <tr>
                <td>Year & Section:</td>
                <td><input type="text" placeholder="Year & Section" name="year_sec"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Save" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <?php
            if (isset($_GET['notif'])){
                $message = $_GET['notif'];
                echo '<h4 style="color:blue;">' .$message .'</h4>';

                echo '
                    <script>
                        setTimeout(function() {
                            document.getElementaryByID("notif").style.display = "none";
                        }, 3000);
                    </script>
                ';
        }
        ?>
    <form action="authenticate.php" method="post">
        <table>
            <tr>
                <td colspan="2" align="center"> 
                    <h2>Login</h2>
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="pwd"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> 
                    <input type="submit" name="login" value="Login">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
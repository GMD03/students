<?php
    include "dbcon.php";

    if ($_SERVER ["REQUEST_METHOD"] =="POST");
            if (isset ($_POST['login'])) {
               $username = $_POST['uname'];
               $password = $_POST['pwd'];

                $login = "SELECT * FROM user WHERE un='$username'";
                $result = $conn->query($login);

                if ($result->num_rows > 0){
                    $row = $result -> fetch_assoc();
                    
                    if ($row['pw'] == $password){
                        session_start();
                        
                        $_SESSION['username'] = $row['un'];
                        $_SESSION['password'] = $row['pw'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['user_level'] = $row['level'];
                        $_SESSION['login'] = true;
                        
                        header ('location: index.php');
                    } else {
                        $message = "Invalid Password";
                        header('location:login.php?notif='.$message);
                    }
                } else {
                    $message = "Username Not Found";
                    header('location:login.php?notif='.$message);
                }
            }

?>
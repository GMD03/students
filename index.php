<?php
    session_start();

    if (!isset($_SESSION['login'])){
        header('location: login.php');
        exit();
    }

    include "dbcon.php";

    $sql = "SELECT * FROM student Order BY lastname";
    $result = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Students System</title>

</head>
<body>
    <a href="create-student.php">Create Student</a>
    <a href="logout.php">Logout</a>

    <br>
        <?php
            echo "<h3> Hello! " . $_SESSION['fullname'] . "</h3>";
        ?>

    <div class="student-list">
        <h2>List of Students</h2>
            <form action="search-result.php" methode="post">
                <input type="text" name="searchkey">
                <input type="submit" name="search" value="Search">
            </form>  
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
        <table width="80%" border="1">
            <thead>
                <tr>
                    <th>ID NUmber</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>MI</th>
                    <th>Birth Date</th>
                    <th>Year & Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['mi']; ?></td>
                    <td><?php echo $row['birthdate']; ?></td>
                    <td><?php echo $row['year_section']; ?></td>
                    <td>
                        <a href="edit-student.php?edit_id=<?php echo $row['idnumber'];?>">Edit</a>
                        <a href="delete-student.php?del_id=<?php echo $row['idnumber'];?>">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
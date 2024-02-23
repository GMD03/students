<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('location: login.php');
        exit();
    }
    
    include "dbcon.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['search'])){
            $search_key = $_POST['searchKey'];

            // echo $search_key;

            $search = "SELECT * FROM student WHERE lastname LIKE '$search_key%' OR idnumber LIKE '$search_key%'";
            $result = $conn->query($search);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Students</title>
</head>
<body>
    <a href="index.php">HOME</a>
    <form action = "<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="searchKey">
        <input type="submit" name="search" value="Search">
    </form>
    <h2>Search result</h2>
    <table width = "80%" border = "1" class="table table-striped">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Lastname</th>
                <th>First</th>
                <th>MI</th>
                <th>Birth Date</th>
                <th>Year & Sec.</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    </tbody>
        <?php
            if($result -> num_rows > 0){
            while($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['idnumber'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['mi'];?></td>
            <td><?php echo $row['birthdate'];?></td>
            <td><?php echo $row['year_section'];?></td>
            <th>
                <a class="btn-primary" href="edit-student.php?edit_id=<?php echo $row['idnumber']; ?>">Edit</button>
                <a class="btn btn-danger" href="delete-student.php?del_id=<?php echo $row['idnumber']; ?>">Delete</button>
            </th>
        </tr>
        <?php
                }
            }
        ?>

    </table>
    
</body>
</html>
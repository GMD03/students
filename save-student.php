<?php
    include "dbcon.php";

    if (isset($_POST['submit'])){
        $id = $_POST['idno'];
        $lastname = $_POST['last'];
        $firstname = $_POST['first'];
        $mi = $_POST['mi'];
        $birth = $_POST['birth'];
        $yearsec = $_POST['year_sec'];

        $insert = "INSERT INTO student(`idnumber`, `lastname`, `firstname`, `mi`, `birthdate`, `year_section`)
            VALUES('$id', '$lastname', '$firstname', '$mi', '$birth', '$yearsec')";
        
        $result = $conn->query($insert);
        if ($result == TRUE){
            $message = "Student was successfully saved.";
            header('location: create-student.php?notif='.$message);
        } else {
            $message = "Error saving...";
            header('location: create-student.php?notif='.$message);
        }
    }
?>
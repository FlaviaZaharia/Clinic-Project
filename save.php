<?php 
if(isset($_POST["add"])){
    require 'database.php';
    $spec=$_POST['spec'];
    if(empty($spec)){
        header("Location:spec.php?error=emptyfield");
    exit();
    }
    else
    {
        $duplicate=mysqli_query($conn,"SELECT * FROM specializare WHERE spec='$spec'");
        if(mysqli_num_rows($duplicate)>0)
        {
            header("Location:spec.php?error=exista");
            exit(); 
        }
        else
        {
            $sql = "INSERT INTO specializare(spec)
        VALUES ('$spec');";
            if (mysqli_query($conn, $sql)) {
            
                header("Location:spec.php?success=added");
                exit();
            } 
            else{
                header("Location:spec.php?error=sqlerror");
                exit();
            }
        }
    }
    mysqli_close($conn);
}
<?php 
if(isset($_POST["add-oras"])){
    require 'database.php';
    $oras=$_POST['oras'];
    if(empty($oras)){
        header("Location:spec.php?err=emptyfield");
    exit();
    }
    else
    {
        $duplicate=mysqli_query($conn,"SELECT * FROM orase WHERE oras='$oras'");
        if(mysqli_num_rows($duplicate)>0)
        {
            header("Location:spec.php?err=exista");
            exit(); 
        }
        else
        {
            $sql = "INSERT INTO orase(oras)
        VALUES ('$oras');";
            if (mysqli_query($conn, $sql)) {
            
                header("Location:spec.php?success=added-oras");
                exit();
            } 
            else{
                header("Location:spec.php?err=sqlerror");
                exit();
            }
        }
    }
    mysqli_close($conn);
}
<?php
 include 'database.php';


if(count($_POST)>0)
 {
 if($_POST['type']==1)
 {
$sp=$_POST['spec'];
  $sql="DELETE FROM specializare WHERE spec='$sp';";
  if(mysqli_query($conn,$sql)){
    $sql1="DELETE FROM doctori WHERE specializare='$sp';"; 
    if(mysqli_query($conn,$sql1)){
      echo $sp;
    }
    else
    {
        echo "Error ". $sql."<br>". mysqli_error($conn);
    }

  }
  else{
      echo "Error ". $sql."<br>". mysqli_error($conn);
  }
  mysqli_close($conn);
 }
}

if(count($_POST)>0)
 {
 if($_POST['type']==2)
 {
  $oras=$_POST['oras'];
  $sql="DELETE FROM orase WHERE oras='$oras';";
  if(mysqli_query($conn,$sql)){
    $sql1="DELETE FROM doctori WHERE oras='$oras';"; 
    if(mysqli_query($conn,$sql1)){
      echo $oras;
    }
    else
    {
        echo "Error ". $sql."<br>". mysqli_error($conn);
    }

  }
  else{
      echo "Error ". $sql."<br>". mysqli_error($conn);
  }
  mysqli_close($conn);
 }
}
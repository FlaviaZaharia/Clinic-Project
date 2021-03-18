<?php
session_start();
if(isset($_POST['login-submit'])){
   require 'database.php';
   $u=$_POST['user'];
   $p=$_POST['pwd'];

   if(empty($u)||empty($p)){
    header("Location:admin_login.php?error=emptyfields");
    exit();
   }
   else{
    $sql="SELECT * FROM admin_user WHERE username=?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:admin_login.php?error=sqlerror");
    exit();
    }
    else
    {
      mysqli_stmt_bind_param($stmt,"s",$u);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row=mysqli_fetch_assoc($result)){
         $pwdcheck=password_verify($p,$row['password']);
         if($pwdcheck==false){
           header("Location:admin_login.php?error=wrongpwd");
            exit();
         }
         else if($pwdcheck==true){
              session_start();
              $_SESSION['username']=$row['username'];
              header("Location:admin_index.php?login=success");
              
            exit();
         }
        else
         {
            header("Location:admin_login.php?error=wrongpwd");
            exit(); 
         }
      }
      else
      {
         header("Location:admin_login.php?error=nouser");
        exit(); 
      }
    }

   }
}
else
{
   header("Location:admin_login.php");
    exit();
}
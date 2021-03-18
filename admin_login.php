<?php

session_start();
?>
<!doctype html>
<html>
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title> Online clinic</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="js/jquery.min.js"></script>
<script  src="js/jquery.validate.min.js"></script>
<script src="js/form-validation.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet"> 
<style> body{font-family: 'Sansita Swashed', cursive; text-align: center;}
        #adm{text-align:center;}
</style>
<div class="jumbotron text-center" style="margin-bottom:0">

    <h1>Clinica Vitalia</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin_login.php">Support <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cautare.php">Cautati medic<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </div>
</nav>



<?php
if(isset($_GET['error'])){
   if($_GET['error']=="emptyfields"){
     echo '<p class="loginerror">Completati ambele campuri</p>';
   }
   else
   if($_GET['error']=="wrongpwd"||$_GET['error']=="nouser")
   {
    echo '<p class="loginerror">User sau parola incorecte</p>';
   }

}
?>
<div class=container>
<form id="adm" action="userlog.php" method="post" >
    <label for="user">Username</label>
    <input type="text" class="form-control" name="user" >
    <label for="pwd">Password</label>
    <input type="password" class="form-control" name="pwd">
    <button type="submit"class="btn btn-danger" name="login-submit">Login</button>    
</form>
</div>

</html>
<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Gestionare doctori</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/style.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet"> 
<style> body{font-family: 'Sansita Swashed', cursive; text-align: center;}
        #f{text-align:left;}
        #o{text-align:left}
</style>
    <div class="jumbotron text-center" style="margin-bottom:0">

    <h1>Clinica Vitalia</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-danger ">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin_index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="crud.php">Toti medicii<span class="sr-only">(current)</span></a>
	  </li>
	  <li class="nav-item active">
        <a class="nav-link" href="cautare.php">Cautati medic<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="spec.php">Adaugati specializare/oras<span class="sr-only">(current)</span></a>
	  </li>
	  <li class="nav-item active">
        <a class="nav-link" href="view.php">Gestionare specializari/orase<span class="sr-only">(current)</span></a>
	  </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
	  </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
	  <li class="nav-item">
        <form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger btn-lg active" name="logout-submit">Log out</button>
        </form>
      </li>
    </ul>
  </div>
</nav>



<?php
if(isset($_GET['error'])){
   if($_GET['error']=="emptyfields"){
     echo '<p class="loginerror">Completati campul</p>';
   }
   else
   if($_GET['error']=="exista")
   {
    echo '<p class="loginerror">Specializarea exista deja</p>';
   }
   else
   if($_GET['error']=="sqlerror")
   {
    echo '<p class="loginerror">Eroare baza de date</p>';
   }
   

}
if(isset($_GET['success'])){
    if($_GET['success']=="added"){
        echo '<p ">Specializare adaugata</p>';
      }
}
?>

<form id="f" action="save.php" method="post">
<label>Specializare</label><br>
<input type="text" id="spec" name="spec"  required>
<button type="submit"class="btn btn-danger"  id="add" name="add">Adaugati</button>
</form>
<br>
<hr>
<br>

<?php
if(isset($_GET['err'])){
   if($_GET['err']=="emptyfield"){
     echo '<p class="loginerror">Completati campul</p>';
   }
   else
   if($_GET['err']=="exista")
   {
    echo '<p class="loginerror">Orasul exista deja</p>';
   }
   else
   if($_GET['err']=="sqlerror")
   {
    echo '<p class="loginerror">Eroare baza de date</p>';
   }
   

}
if(isset($_GET['success'])){
    if($_GET['success']=="added-oras"){
        echo '<p ">Oras adaugat</p>';
      }
}
?>
<form id="o" action="save1.php" method="post">
<label>Oras</label><br>
<input type="text" id="oras" name="oras"  required>
<button type="submit" class="btn btn-danger"  id="add-oras" name="add-oras">Adaugati</button>
</form>

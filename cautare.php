<?php 
session_start();
include 'database.php';
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
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet"> 
<style> body{font-family: 'Sansita Swashed', cursive; text-align: center;}
       .doctori-search{text-align:left};
</style>
    <div class="jumbotron text-center" style="margin-bottom:0">

    <h1>Clinica Vitalia</h1>
</div>
 <nav class="navbar  center navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-link" href="<?php if (isset($_SESSION['username'])) echo 'admin_index.php'; else echo'index.php'; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <?php if (isset($_SESSION['username'])) echo '<a class="nav-link" href="crud.php">Toti medicii<span class="sr-only">(current)</span></a>'; else echo'<a class="nav-link" href="admin_login.php">Support<span class="sr-only">(current)</span></a>';?>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cautare.php">Cautati medic<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <?php if (isset($_SESSION['username'])) echo '<a class="nav-link" href="spec.php">Adaugati specializare/oras<span class="sr-only">(current)</span></a>';?>
        
	  </li>
	  <li class="nav-item active">
    <?php if (isset($_SESSION['username'])) echo '<a class="nav-link" href="view.php">Gestionare specializari/orase<span class="sr-only">(current)</span></a>';?>
	  </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <?php
        if(isset($_SESSION['username']))
        echo
       '<form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger btn-lg active" name="logout-submit">Log out</button>
        </form>';?>
      </li>
    </ul>
  </div>
</nav>
<div class="doctori-search">
    <h3></h3>
<form   action="cautare.php" method="POST">
          <input type="text" id="search" name="search" Placeholder="Search">
          <button type="submit" id="submit-s" class="btn btn-danger btn-lg active" name="submit-s">Search</button>
</form>

<hr><br>
<?php
include 'database.php';

if(isset($_POST['submit-s'])){
  $search=mysqli_escape_string($conn,$_POST['search']);
  $sql="SELECT * FROM doctori WHERE oras='$search' OR nume='$search' OR specializare='$search'";
  $result=mysqli_query($conn,$sql);
  $queryResult=mysqli_num_rows($result);
  if($queryResult>0){
   while($row=mysqli_fetch_assoc($result)){
    echo  "<div class='doctor-view'>
    <h3>".$row['specializare']."</h3>
    <h3>".$row['nume']."</h3>
    <p>".$row['oras']."</p>
    <p>".$row['orar']."</p>
    <p>".$row['preturi']."</p>
    <hr>

</div>";
   }
  }
  else{
      echo 'Nu s-au gasit medici';
  }
}?>
<br>
</div>
</body>


</html>
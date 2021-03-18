<?php
include 'database.php';

if(isset($_POST['submit-s'])){
  $search=mysqli_escape_string($conn,$_POST['search']);
  $sql="SELECT * FROM doctori WHERE oras='$search' OR nume='$search'";
  $result=mysqli_query($conn,$sql);
  $queryResult=mysqli_num_rows($result);
  if($queryResult>0){
   while($row=mysqli_fetch_assoc($result)){
    echo  "<div class='doctor-view'>
    <h3>".$row['nume']."</h3>
    <h3>".$row['specializare']."</h3>
    <p>".$row['oras']."</p>
    <p>".$row['orar']."</p>
    <p>".$row['preturi']."</p>
</div>";
   }
  }
  else{
      echo 'Nu s-au gasit medici';
  }
}
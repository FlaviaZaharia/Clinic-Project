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
	<script src="ajax1.js"></script>
    
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet"> 
<style> body{font-family: 'Sansita Swashed', cursive; text-align: center;}
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


<div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gestionare <b>specializare</b></h2>
						
					</div>
					</div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th class="bg-danger">
						</th>
		<th  class="bg-danger">Specializare</th>
        <th  class="bg-danger">Delete</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM specializare");
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["spec"]; ?>">
				<td>
							
						</td>
                    <td><?php echo $row["spec"]; ?></td>
					<td>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["spec"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
					
				}
				?>
				</tbody>
			</table>
			
        </div>
	</div>
   
    <!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Sterge specializare</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_del" name="spec" class="form-control">					
						 <p>Sunteti sigur ca doriti sa stergeti aceasta specializare</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>


<br>
<br>
<div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gestionare <b>orase</b></h2>
						
					</div>
					</div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th class="bg-danger">
						</th>
		<th  class="bg-danger">Oras</th>
        <th  class="bg-danger">Delete</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM orase");
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["oras"]; ?>">
				<td>
							
						</td>
                    <td><?php echo $row["oras"]; ?></td>
					<td>
						<a href="#deleteEmployee" class="delete-oras" data-id="<?php echo $row["oras"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
					
				}
				?>
				</tbody>
			</table>
			
        </div>
	</div>
    
    <!-- Delete Modal HTML -->
	<div id="deleteEmployee" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Sterge oras</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						 <p>Sunteti sigur ca doriti sa stergeti acest oras</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete-o">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>    
    

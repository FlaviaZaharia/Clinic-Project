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
	<script src="ajax.js"></script>
    
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
						<h2>Gestionare <b>doctori</b></h2>
						
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons"></i> <span>Adaugare profil</span></a>
                </div></div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th class="bg-danger">
						</th>
		<th  class="bg-danger">ID</th>
        <th  class="bg-danger">Nume</th>
        <th  class="bg-danger">Specializare</th>
        <th  class="bg-danger">Oras</th>
        <th  class="bg-danger">Orar</th>
        <th  class="bg-danger">Pret consultatie</th>
        <th  class="bg-danger">Poza</th>
        <th  class="bg-danger">Edit/Delete</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM doctori");
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							
						</td>
                    <td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["nume"]; ?></td>
					<td><?php echo $row["specializare"]; ?></td>
					<td><?php echo $row["oras"]; ?></td>
					<td><?php echo $row["orar"]; ?></td>
                    <td><?php echo $row["preturi"]; ?></td>
                    <td><img src="<?php echo $row["poza"]; ?>" width="100" height="100"></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-nume="<?php echo $row["nume"]; ?>"
							data-spec="<?php echo $row["specializare"]; ?>"
							data-oras="<?php echo $row["oras"]; ?>"
							data-orar="<?php echo $row["orar"]; ?>"
                            data-pret="<?php echo $row["preturi"]; ?>"
                            data-poza="<?php echo $row["poza"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
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
	<div class="statusMsg"></div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form"  enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Adaugare profil</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>ID</label>
							<input type="text" id="id" name="id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nume</label>
							<input type="nume" id="nume" name="nume" class="form-control" required>
						</div>
						<div class="form-group">
						<label>Specializare</label>
                        <select  id="spec" name="spec" class="form-control" required>
                        <option selected>Alegeti din specializarile de mai jos</option>
                        <?php
                          $result = mysqli_query($conn,"SELECT * FROM specializare");
						  while($row = mysqli_fetch_array($result)) {
                           ?><option><?php echo $row["spec"]; ?></option><?php
						  }
						?>
                        </select>
						</div>
						<div class="form-group">
						<label>Oras</label>
                        <select  id="oras" name="oras" class="form-control" required>
                        <option selected>Alegeti din orasele de mai jos</option>
                        <?php
                          $result = mysqli_query($conn,"SELECT * FROM orase");
						  while($row = mysqli_fetch_array($result)) {
                           ?><option><?php echo $row["oras"]; ?></option><?php
						  }
						?>
                        </select>
						</div>
						<div class="form-group">
							<label>Orar</label>
							<input type="orar" id="orar" name="orar" class="form-control" required>
						</div>	
						<div class="form-group">
							<label>Pret consultatie</label>
							<input type="pret" id="pret" name="pret" class="form-control" required>
						</div>	
						<div class="form-group">
						   <label>Poza</label>
							<input type="file"  id="file" name="file" class="form-control" required>
           
						</div>		
					</div>
					<div id="err"></div>
					<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="submit" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Modifica profil</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
				
					<div class="modal-body">	
					<div class="form-group">
							<input type="hidden" id="id_u" name="id" class="form-control" required>
						</div>				
						<div class="form-group">
							<label>Nume</label>
							<input type="nume" id="nume_u" name="nume" class="form-control" required>
						</div>
						<div class="form-group">
						<label>Specializare</label>
                        <select  id="spec_u" name="spec" class="form-control" required>
						<option selected></option>
						<?php
                          $result = mysqli_query($conn,"SELECT * FROM specializare");
						  while($row = mysqli_fetch_array($result)) {
                           ?><option><?php echo $row["spec"]; ?></option><?php
						  }
						?>
                        </select>
						</div>
						<div class="form-group">
						<label>Oras</label>
                        <select  id="oras_u" name="oras" class="form-control" required>
                        <option selected></option>
                        <?php
                          $result = mysqli_query($conn,"SELECT * FROM orase");
						  while($row = mysqli_fetch_array($result)) {
                           ?><option><?php echo $row["oras"]; ?></option><?php
						  }
						?>
                        </select>
						</div>
						<div class="form-group">
							<label>Orar</label>
							<input type="orar" id="orar_u" name="orar" class="form-control" required>
						</div>	
                        <div class="form-group">
							<label>Pret consultatie</label>
							<input type="pret" id="pret_u" name="pret" class="form-control" required>
						</div>	
						<div class="form-group">
							<input type="hidden" id="poza_u" name="poza" class="form-control" required>
						</div>	
						<div class="form-group">
						<label>Poza actuala</label>
						<br>
						<img id="imgtest" width="100" height="100"/>
			            </div>
						<div class="form-group">
							<label>Schimbare poza</label>
							<input type="file" id="file" name="file" class="form-control" >
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="submit" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Sterge profil</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						 <p>Sunteti sigur ca doriti sa stergeti acest profil</p>
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

</body>
</html>    
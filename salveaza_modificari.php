<?php
 include 'database.php';


 if(count($_POST)>0)
 {
    if($_POST['type']==1)
    {
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$errorimg = $_FILES["file"]['error'];
$path = 'uploads/'; // upload directory
$oras=$_POST['oras'];
$spec=$_POST['spec'];
$id=$_POST['id'];
$nume=$_POST['nume'];
$orar=$_POST['orar'];
$pret=$_POST['pret'];
$duplicate=mysqli_query($conn,"SELECT * FROM doctori WHERE id='$id'");
       if(mysqli_num_rows($duplicate)>0)
       {
           echo json_encode(array("statusCode"=>202));
       }
       else{
if(!empty($_POST['id']) && !empty($_POST['nume']) &&!empty($_POST['spec']) &&!empty($_POST['oras'])&&!empty($_POST['orar'])&&!empty($_POST['pret'])&&$spec!="Alegeti din specializarile de mai jos"&&$oras!="Alegeti din orasele de mai jos"&& $_FILES['file'])
{
$img = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
    if($errorimg > 0){
        die('<div class="alert alert-danger" role="alert"> An error occurred while uploading the file </div>');
     }
//include database configuration file

//insert form data in the database
$sql = "INSERT INTO doctori( id,nume,oras,specializare,orar,preturi,poza)
        VALUES ('$id','$nume','$oras','$spec','$orar','$pret','$path');";
        if (mysqli_query($conn, $sql)) {
            
            echo json_encode(array("statusCode"=>200));
        } 
        else{
            echo json_encode(array("statusCode"=>201));
        }
}
}
} 
else 
{
    echo json_encode(array("statusCode"=>203));
}
mysqli_close($conn);

       }
    }}


if(count($_POST)>0)
{
    if($_POST['type']==2)
    {
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $errorimg = $_FILES['file']['error'];
    $path = 'uploads/';
    $img = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $id=$_POST['id'];
     $nume=$_POST['nume'];
     $spec=$_POST['spec'];
     $orar=$_POST['orar'];
     $oras=$_POST['oras'];
     $pret=$_POST['pret'];
     $poza=$_POST['poza'];
       if(empty($_POST['id']) || empty($_POST['nume']) ||empty($_POST['spec']) ||empty($_POST['oras'])||empty($_POST['orar'])||empty($_POST['pret'])||$spec==""||$oras=="")
       {
    
        echo json_encode(array("statusCode"=>202));
       }
        if($errorimg==4)
        {
            $sql="UPDATE doctori SET nume='$nume',oras='$oras',specializare='$spec',orar='$orar',preturi='$pret',poza='$poza' WHERE id='$id';";
                if (mysqli_query($conn, $sql)) {
                    
                    echo json_encode(array("statusCode"=>200));
                } 
                else{
                    echo json_encode(array("statusCode"=>201));
                } 
        }
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
        $path = $path.strtolower($final_image); 
        if(move_uploaded_file($tmp,$path)) 
        {
        $sql="UPDATE doctori SET nume='$nume',oras='$oras',specializare='$spec',orar='$orar',preturi='$pret',poza='$path' WHERE id='$id';";
                if (mysqli_query($conn, $sql)) {
                    
                    echo json_encode(array("statusCode"=>200));
                } 
                else{
                    echo json_encode(array("statusCode"=>201));
                }
            }
            
        
        }
    
        mysqli_close($conn);
    }
}

if(count($_POST)>0)
 {
 if($_POST['type']==3)
 {
  $id=$_POST['id'];
  $sql="DELETE FROM doctori WHERE id='$id';";
  if(mysqli_query($conn,$sql)){
      echo $id;

  }
  else{
      echo "Error ". $sql."<br>". mysqli_error($conn);
  }
  mysqli_close($conn);
 }
}

<?php
// including the database connection file
include_once("PDO.DB.class.php");
 $dbConn = new DB();
 
if(isset($_POST['update']))
{    
    $idattendee = $_POST['idvenue'];
    
    $name=$_POST['name'];
    $password=$_POST['capacity'];
   
    if(empty($name) || empty($capacity)) {    
            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($capacity)) {
            echo "<font color='red'>Capacity field is empty.</font><br/>";
        }
                
    } else {   
        $dbConn -> update($idvenue,$name,$capacity);
        header("Location: venues.php");
    }
}
?>
<?php
//getting id from url
$idvenue = $_GET['idvenue'];
 
//selecting data associated with this particular id
// $sql = "SELECT * FROM users WHERE id=:id";
// $query = $dbConn->prepare($sql);
// $query->execute(array(':id' => $id));

$row = $dbConn->getID($idvenue);
$name = $row['name'];
$password = $row['capacity'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <?php include "header.php"; ?>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="venues.php">
    <!-- <img src="" width="30" height="30" class="d-inline-block align-top" alt=""> -->
    HOME
</a>
</nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Edit Record</h2>
                    </div>
                    <p>All the fields must have a value</p>
                    <form  action="edit_venue.php" method="post" >
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>capacity</label>
                            <input type="capacity" name="capacity" class="form-control" value="<?php echo $capacity;?>" maxlength="30" required="">
                        </div>

    
                        <div class="form-group">
                            <input type="hidden" name="idvenue" class="form-control" value="<?php echo $idattendee;?>"  required="">
                        </div>
 
                        <input type="Submit" class="btn btn-primary" name="update" value="update">
                        <a href="venues.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
 
            </div> 
                
        </div>
 
</body>
</html>

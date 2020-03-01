<?php
// including the database connection file
include_once("PDO.DB.class.php");
 $dbConn = new DB();
 
if(isset($_POST['update']))
{    
    $idattendee = $_POST['idattendee'];
    
    $name=$_POST['name'];
    $password=$_POST['password'];

    foreach($_POST as $k => $v){
        echo "$k -> $v ..." ;
    }
    $role= (int) $_POST['role'];
   
    if(empty($name) || empty($password) || empty($role)) {    
            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        
        if(empty($role)) {
            echo "<font color='red'>Role field is empty.</font><br/>";
        }
                
    } else {   
        $password = hash("sha256", $password);
        $dbConn -> update($idattendee,$name,$password,$role);
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$idattendee = $_GET['idattendee'];
 
//selecting data associated with this particular id
// $sql = "SELECT * FROM users WHERE id=:id";
// $query = $dbConn->prepare($sql);
// $query->execute(array(':id' => $id));

$row = $dbConn->getID($idattendee);
$name = $row['name'];
$password = $row['password'];
$role = $row['role'];

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
  <a class="navbar-brand" href="index.php">
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
                    <form  action="edit_data.php" method="post" >
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="" maxlength="30" required="">
                        </div>

                        <div class="form-group">
                        <label for="role">Select the role of the user:</label>
                        <select id="role" name="role">
                            <option value="1">admin</option>
                            <option value="2">event manager</option>
                            <option value="3">attendee</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="idattendee" class="form-control" value="<?php echo $idattendee;?>"  required="">
                        </div>
 
                        <input type="Submit" class="btn btn-primary" name="update" value="update">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
 
            </div> 
                
        </div>
 
</body>
</html>

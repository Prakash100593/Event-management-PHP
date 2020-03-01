
<?php
//including the database connection file
include_once("PDO.DB.class.php");
$dbConn = new DB();

if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
        
    // checking empty fields
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
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        $password = hash("sha256", $password);
        $dbConn -> create($name,$password,$role);
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add attendee.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="" maxlength="30" required="">
                        </div>
                        
                        <div class="form-group">
                        <label for="role">Select the role of the user:</label>
                        <select id="role" name="role" required>
                            <option value="">Please select role</option>
                            <option value="1">admin</option>
                            <option value="2">event manager</option>
                            <option value="3">attendee</option>
                        </select>
                        </div>

                        <input type="Submit" class="btn btn-primary" name="Submit" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
 
            </div> 
                
        </div>
 
</body>
</html>



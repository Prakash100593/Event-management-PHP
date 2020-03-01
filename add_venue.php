
<?php
//including the database connection file
include_once("PDO.DB.class.php");
$dbConn = new DB();

if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];
        
    // checking empty fields
    if(empty($name) || empty($capacity)) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($capacity)) {
            echo "<font color='red'>capacity field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        $dbConn -> create($name,$capacity);
        echo "<font color='green'>Venue added successfully.";
        echo "<br/><a href='venues.php'>View Result</a>";
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
  <a class="navbar-brand" href="venues.php">
    HOME
</a>
</nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Venue details</h2>
                    </div>
                    <p>Please fill this form and submit to add venue.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>capacity</label>
                            <input type="capacity" name="capacity" class="form-control" value="" maxlength="30" required="">
                        </div>
                        
                        <input type="Submit" class="btn btn-primary" name="Submit" value="Submit">
                        <a href="venues.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
 
            </div> 
                
        </div>
 
</body>
</html>



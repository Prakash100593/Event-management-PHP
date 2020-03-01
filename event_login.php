<?php  
     require_once "PDO.DB.class.php";
 try  
 {  
    $db = new DB();
            
    if(isset($_GET['logout']) && $_GET['logout'] == true)
    {
        // session_destroy();
        // header("location:event_login.php");
        // exit;
    }
    else
    {
        $message = $db->validate_user();
        if (isset($_SESSION["loggedin"]))
        {
            header("location:login_success.php");
        }
        else{
        }
    }
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Login Page for Event</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3 align="">User Login</h3><br />  
                <form method="post">  
                     <label>name</label>  
                     <input type="text" name="name" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
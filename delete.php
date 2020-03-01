<?php
// including the database connection file
include_once("PDO.DB.class.php");
 $dbConn = new DB();
 $idattendee = $_GET['idattendee'];
 $dbConn -> delete($idattendee);
 header("Location:index.php");
 ?>
<?php
// including the database connection file
include_once("PDO.DB.class.php");
 $dbConn = new DB();
 $idvenue = $_GET['idvenue'];
 $dbConn -> delete($idvenue);
 header("Location:venues.php");
 ?>
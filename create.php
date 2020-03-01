<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    require("PDO.DB.class.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $object = new CRUD();

    $object->Create($username, $password);
}
?>
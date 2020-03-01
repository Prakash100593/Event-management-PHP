<?php
if (isset($_POST['idattendee']) && isset($_POST['idattendee']) != "") {
    require 'PDO.DB.class.php';
    $user_id = $_POST['idattendee'];

    $object = new DB();

    echo $object->Details($user_id);
}
?>
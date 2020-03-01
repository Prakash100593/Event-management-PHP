<?php
include 'PDO.DB.class.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['idattendee'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['idattendee']) ? $_POST['idattendee'] : NULL;
        $username = isset($_POST['name']) ? $_POST['name'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE attendee SET idattendee = ?, name = ?, password = ?,role =?  WHERE idattendee = ?');
        $stmt->execute([$idattendee, $username, $password,$role $_GET['idattendee']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM users WHERE idattendee = ?');
    $stmt->execute([$_GET['idattendee']]);
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$users) {
        die ('User doesn\'t exist with that idattendee!');
    }
} else {
    die ('No idattendee specified!');
}
?>

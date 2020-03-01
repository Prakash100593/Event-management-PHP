<?php

require 'PDO.DB.class.php';

$object = new DB();

// Design initial table header
$data = '<table class="table table-bordered table-striped">
      <tr>
       <th>No.</th>
       <th>name</th>
       <th>Password</th>
       <th>role</th>       
       <th>Update</th>
       <th>Delete</th>
      </tr>';


$attendee = $object->Read();

if (count($attendee) > 0) {
    $number = 1;
    foreach ($attendee as $attendee) {
        $data .= '<tr>
    <td>' . $number . '</td>
    <td>' . $user['name'] . '</td>
    <td>' . $user['password'] . '</td>
    <td>' . $user['role'] . '</td>
    <td>
     <button >
     

<?php

require_once './db.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fnameEl = $_POST['fname'];
    $lnameEl = $_POST['lname'];
    $emailEl = $_POST['email'];
    $phoneEl = $_POST['phone'];

    $db->insert($fnameEl, $lnameEl, $emailEl, $phoneEl);
}

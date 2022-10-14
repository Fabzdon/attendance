<?php
$title = 'deleterecord';
require_once "includes/header.php";
require_once "database/crud.php";
require_once "database/connection.php";
require_once 'includes/auth_check.php';
if(!$_GET['id']){

    include 'includes/errormessage.php';
    header("Location: viewrecords.php");



}
else
{
    $id = $_GET['id'];


    $result = $crud->deleteAttendee($id);
    echo $result;
    if($result){
        header("Location: viewrecords.php");
    } 
    else
    {
        include 'includes/errormessage.php';
    }
}
?>
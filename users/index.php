<?php
include "../config.php";

// Check user login or not
// if(!isset($_SESSION['uname'])){
if($_SESSION['uname'] == "1"){
    header('Location: words/');
}else header('Location: ../');

 ?>

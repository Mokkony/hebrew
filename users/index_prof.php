<?php
include "../config.php";

// Check user login or not
// if(!isset($_SESSION['uname'])){
if($_SESSION['uname'] == "1"){
    header('Location: admin/words/');
}
else if($_SESSION['uname'] == "2"){
    header('Location: editor/words/');
}
else header('Location: ../');

 ?>

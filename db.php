<?php 
session_start();
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'formwithjs'
) or die(mysqli_erro($mysqli));
?>
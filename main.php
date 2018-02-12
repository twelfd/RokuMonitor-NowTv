<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
    } 
    require 'assets/login.class.php';
    $user = new USER();
    if(!$user->is_loggedin()){
        $user->redirect('index.php');
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Atlantic</h2>
        <a href="atlantic/atlantic.php?action=reset">Reset</a>
        <a href="atlantic/atlantic.php?action=fullreset">Full Reset</a>
        <h2>SS Football</h2>
        <a href="ss1/ss1.php?action=reset">Reset</a>
        <a href="ss1/ss1.php?action=fullreset">Full Reset</a>
    </body>
</html>

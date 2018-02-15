<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
    } 
    require 'assets/login.class.php';
    $user = new USER();
    if(!$user->is_loggedin()){
        $user->redirect('index.php');
        exit();
    }
    if (isset($_GET['logout'])){
        session_destroy();
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
        <a href="atlantic/atlantic.php?action=reset">Channel Fix</a>
        <a href="atlantic/atlantic.php?action=fullreset">OTT Fix</a>
        <h2>SS EPL</h2>
        <a href="ssepl/ssepl.php?action=reset">Channel Fix</a>
        <a href="ssepl/ssepl.php?action=fullreset">OTT Fix</a>
        <h2>SS Main Event</h2>
        <a href="ssmainevent/ssmainevent.php?action=reset">Channel Fix</a>
        <a href="ssmainevent/ssmainevent.php?action=fullreset">OTT Fix</a>    
        
    </body>
</html>

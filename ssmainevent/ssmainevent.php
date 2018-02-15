<?php 
# Set the ip of the Roku box here
$ip = "http://192.168.2.126:8060";

use Curl\Curl;
require '/var/www/html/vendor/autoload.php';
require '/var/www/html/assets/login.class.php';
    if (!isset($_GET['action'])){
        $curl = new Curl;
        $curl->get("$ip/query/active-app");
        $results = get_object_vars($curl);
        //var_dump($results);
        $xml = $results['response'];
        $xml = simplexml_load_string($xml) or die("Error: Cannot create object");
        //var_dump($xml);
        $results = get_object_vars($xml);
        if ($results['app'] === "NOW TV") {
            $curl->post("$ip/keypress/Select");
            sleep(5);
            $curl->post("$ip/keypress/Select");
            exit();
        }
        else {
            $curl->post("$ip/launch/26614");
                    sleep(5);
                    $x = 1;
                    while ($x < 10) {
                        $curl->post("$ip/keypress/Up");
                        sleep(1);
                        $x++;
                    }
                    $x = 1;
                    while ($x < 5) {
                        $curl->post("$ip/keypress/Down");
                        sleep(1);
                        $x++;
                    }
                    $curl->post("$ip/keypress/Select");
                    sleep(1);
                    $x = 1;
                    while ($x < 11) {
                        $curl->post("$ip/keypress/Up");
                        sleep(1);
                        $x++;
                    }
                    //$curl->post("$ip/keypress/Select");
                    /*sleep(1);
                    $curl->post("$ip/keypress/Down");
                    sleep(1);
                    $curl->post("$ip/keypress/Down");
                    sleep(1);*/
                    $curl->post("$ip/keypress/Select");
                    sleep(5);
                    $curl->post("$ip/keypress/Select");
                    sleep(1);
                    $user->redirect("../main.php");
                    exit();
        }
    }
    if(!isset($_SESSION)) { 
        session_start(); 
    }  
    //require '/var/www/html/assets/login.class.php';
    $user = new USER();
    if(!$user->is_loggedin()){
        $user->redirect('../index.php');
        exit();
    }
    

        $curl = new Curl;
        $curl->get("$ip/query/active-app");
        $results = get_object_vars($curl);
        //var_dump($results);
        $xml = $results['response'];
        $xml = simplexml_load_string($xml) or die("Error: Cannot create object");
        //var_dump($xml);
        $results = get_object_vars($xml);
        if (isset($_GET['action'])){
            if ($_GET['action'] === "reset"){
                if ($results['app'] === "NOW TV"){
                    $x = 1;
                    while ($x < 5) {
                    $curl->post("$ip/keypress/Up");
                    sleep(1);
                    $x++;
                    }
                     /*$curl->post("$ip/keypress/Select");
                    sleep(3);
                    $curl->post("$ip/keypress/Select");
                    sleep(3);
                    $curl->post("$ip/keypress/Down");
                    sleep(1);
                    $curl->post("$ip/keypress/Down");
                    sleep(1);*/
                    $curl->post("$ip/keypress/Select");
                    sleep(3);
                    $curl->post("$ip/keypress/Select");
                    $user->redirect("../main.php");
                    exit();
                }
                else {
                    $curl->post("$ip/launch/26614");
                    sleep(5);
                    $x = 1;
                    while ($x < 10) {
                        $curl->post("$ip/keypress/Up");
                        sleep(1);
                        $x++;
                    }
                    $x = 1;
                    while ($x < 5) {
                        $curl->post("$ip/keypress/Down");
                        sleep(1);
                        $x++;
                    }
                    $curl->post("$ip/keypress/Select");
                    sleep(1);
                    $x = 1;
                    while ($x < 11) {
                        $curl->post("$ip/keypress/Up");
                        sleep(1);
                        $x++;
                    }
                    //$curl->post("$ip/keypress/Select");
                    /*sleep(1);
                    $curl->post("$ip/keypress/Down");
                    sleep(1);
                    $curl->post("$ip/keypress/Down");
                    sleep(1);*/
                    $curl->post("$ip/keypress/Select");
                    sleep(5);
                    $curl->post("$ip/keypress/Select");
                    sleep(1);
                    $user->redirect("../main.php");
                    exit();
                }
            }
            if ($_GET['action'] === "fullreset"){
                $curl->post("$ip/keypress/Home");
                /*sleep(8);
                $curl->post("$ip/launch/26614");
                sleep(5);
                $x = 1;
                while ($x < 10) {
                    $curl->post("$ip/keypress/Up");
                    sleep(1);
                    $x++;
                }
                $x = 1;
                while ($x < 4) {
                    $curl->post("$ip/keypress/Down");
                    sleep(1);
                    $x++;
                }
                $curl->post("$ip/keypress/Select");
                sleep(3);
                $x = 1;
                while ($x < 11) {
                    $curl->post("$ip/keypress/Up");
                    sleep(1);
                    $x++;
                }
                $curl->post("$ip/keypress/Select");
                sleep(1);
                $curl->post("$ip/keypress/Down");
                sleep(1);
                $curl->post("$ip/keypress/Down");
                sleep(1);
                $curl->post("$ip/keypress/Select");
                sleep(5);
                $curl->post("$ip/keypress/Select");
                sleep(1);*/
                $user->redirect("../main.php");
                exit();
            }
        }
        
    sleep(2);
    exit();
        ?>
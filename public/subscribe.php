<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/accountService.php");

    $db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);
    $errortext = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if(!empty($_GET["subscribe"])){
            rmChannel($_SESSION["username"], $_GET["subscribe"]);
            $errortext = "remove ".$_GET["subscribe"]." from subscription list successfully";
        }
        $subscriptions = getChannels($_SESSION["username"]);
    
        render("subscription_template.php", ["subscriptions" => $subscriptions,"errortext" => $errortext,"title" => "Subsciption"]);
    }
    else{
        $subscriptions = getChannels($_SESSION["username"]);
    
        render("subscription_template.php", ["subscriptions" => $subscriptions,"errortext" => $errortext,"title" => "Subsciption"]);
    }

    $db->sql_close();
?>


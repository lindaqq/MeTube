<?php

// configuration
require("../includes/config.php"); 
require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

$groupname = $_GET["groupname"];
$topic = $_GET["topic"];
$groupid = $_GET["groupid"];

$discusses = getDiscusses($groupid);

render("topic_template.php", ["groupname"=>$groupname, "topic"=>$topic, "comments" =>$discusses]);

$db->sql_close();

?>


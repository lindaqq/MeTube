<?php

// configuration
require("../includes/config.php"); 
require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);
$username = $_SESSION["username"];

$groupname = $_GET["groupname"];
$topic = $_GET["topic"];
$groupid = $_GET["groupid"];

if (isset($_POST["discuss"])) {
  $content = $_POST["discuss"];
  addDiscuss( $username, $groupid, $content);
}

$discusses = getDiscusses($groupid);

render("topic_template.php", ["groupid"=>$groupid, "groupname"=>$groupname, "topic"=>$topic, "comments" =>$discusses]);

$db->sql_close();

?>


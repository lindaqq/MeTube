<?php

// configuration
require_once("../includes/config.php");

require("../includes/mediaService.php");
require("../includes/searchService.php"); 
require("../includes/sharingService.php"); 
require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$username = $_SESSION["username"];

if (isset($_POST["receiver"])) {
  $receiver = $_POST["receiver"];
  $content = $_POST["content"];
  $sender = $username;
  sendMessage($sender, $receiver, $message);
}

$messages = getMessages($username);

render("message_template.php", ["messages" => $messages]);

$db->sql_close();
?>

<?php

// configuration
require_once("../includes/config.php");

require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$username = $_SESSION["username"];

if (isset($_POST["receiver"])) {
  $receiver = $_POST["receiver"];
  $message = $_POST["content"];
  $sender = $username;
  sendMessage($sender, $receiver, $message);
}
$userid1 = $username;
$friends = getFriends ($userid1);
$contacts = getContacts ($userid1);
$messages = getMessages($username);
$contacts = array_merge($friends, $contacts);

render("message_template.php", ["messages" => $messages, "contacts" => $contacts]);

$db->sql_close();
?>

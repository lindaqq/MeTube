<?php

// configuration
require_once("../includes/config.php");

require("../includes/interactionService.php");

if (!isset($_SESSION["username"])) {
  header('Location: index.php');
}

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);

if (isset($_POST["groupname"])) {
  $groupname = $_POST["groupname"];
  $topic = $_POST["topic"];
  createGroup($groupname, $topic, "");
}

$groups = showGroups();

render("group_template.php", ["title" => "Group", "groups" => $groups]);

$db->sql_close();
?>


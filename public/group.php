<?php

// configuration
require_once("../includes/config.php");

require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);

if (isset($_POST["groupname"])) {
  $groupname = $_POST["groupname"];
  $detail = $_POST["detail"];
  createGroup($groupname, $detail);
}

$groups = showGroups();

render("group_template.php", ["title" => "Group", "groups" => $groups]);

$db->sql_close();
?>


<?php

// configuration
require("../includes/config.php"); 
require("../includes/searchService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);

// $_POST["keywords"] should be the search keyword

$result = search($_POST["keywords"]); 
  render("search_template.php", ["title" => "Search Result", "result" => $result]);
$db->sql_close();
?>


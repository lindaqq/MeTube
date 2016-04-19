<?php

// configuration
require("../includes/config.php"); 
require("../includes/searchService.php"); 
require("../includes/sharingService.php"); 
require("enum.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);

// $_POST["keywords"] should be the search keyword

$key = "";
if (!isset($_POST["keywords"])) {
  $words = $_POST["key"];
  $key = $words;
  $type = $_POST["type"];
  $category = $_POST["category"];

  $time = $_POST["date"];
  if ($time == 1) {
    $start= (new \DateTime())->modify('-24 hours');
  $starttime = $start->format('Y-m-d H:i:s');
  } else if($time == 2) {
    $start= (new \DateTime())->modify('-30 days');
  $starttime = $start->format('Y-m-d H:i:s');
  } else {
    $starttime= "";
  }

  $result = filterSearch($words, $type, $category, $starttime); 
} else {
  $key = $_POST["keywords"];
  $result = search($_POST["keywords"]); 
}

  render("search_template.php", ["title" => "Search Result", "result" => $result, "key" => $key, "keywords" => getKeywords()]);
$db->sql_close();
?>


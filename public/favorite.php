<?php

// configuration
require("../includes/config.php"); 
require("../includes/mediaService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$username = $_SESSION["username"];

if (isset($_GET["drop"])) {
  $mediaid = $_GET["drop"];
  rmFavoriteMedia($username, $mediaid);
}
$favorites = browseByFavorite($username);

render("favorite_template.php", ["title" => "favorite", "favorites" => $favorites]);
$db->sql_close();
?>


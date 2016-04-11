<?php

// configuration
require_once("../includes/config.php");

require("../includes/mediaService.php");
require("../includes/searchService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$mediaid = $_GET["id"];

if (isset($_GET["subscribe"])) {
  
}
if (isset($_GET["favorite"])) {

}


if(isset($_SESSION["username"])){
    $playlists = showPlaylists($_SESSION["username"]);
}
$playlists = Array();
$recommend = recommend($mediaid, 8); 


render("image_template.php", ["mediaid" => $mediaid, "recommend" => $recommend,"playlists" => $playlists, "titile" => $_GET["name"]]);

$db->sql_close();
?>

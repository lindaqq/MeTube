<?php

// configuration
require_once("../includes/config.php");

require("../includes/mediaService.php");
require("../includes/searchService.php"); 
require("../includes/sharingService.php"); 
require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$mediaid = $_GET["id"];

if (isset($_GET["subscribe"])) {
  
}
if (isset($_GET["favorite"])) {

}

$playlists = Array();
if(isset($_SESSION["username"])){
    $playlists = showPlaylists($_SESSION["username"]);
}

$recommend = recommend($mediaid, 8); 
$media = viewMedia($mediaid);
$comments = getComments($mediaid);


render("image_template.php", ["media" => $media,"comments" => $comments,"mediaid" => $mediaid, "recommend" => $recommend,"playlists" => $playlists, "titile" => $_GET["name"]]);

$db->sql_close();
?>

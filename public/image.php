<?php

// configuration
require_once("../includes/config.php");

require("../includes/mediaService.php");
require("../includes/searchService.php"); 
require("../includes/sharingService.php"); 
require("../includes/interactionService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$mediaid = $_GET["id"];
$playlists = Array();
if(isset($_SESSION["username"])){
    $playlists = showPlaylists($_SESSION["username"]);
    $username = $_SESSION["username"];
}

if (isset($_GET["favorite"])) {
  if (!isset($username)) {
    continue;
  }
  addFavoriteMedia($username, $mediaid);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (!isset($username)) {
    continue;
  }

  if(!empty($_POST["playlist"])){
    foreach($_POST["playlist"] as $playlistid) {
      addPlaylistMedia($playlistid, $mediaid);
    }
  }

  if(!empty($_POST["comment"])){
    $content = $_POST["comment"];
    addComment($username, $mediaid, $content);
  }

  if(!empty($_POST["rate"])){
    $score = $_POST["rate"];
    rateMedia($mediaid, $username, $score);
  }
}

$recommend = recommend($mediaid, 8); 
$media = viewMedia($mediaid);
$comments = getComments($mediaid);

if (isset($_GET["subscribe"])) {
  if (!isset($username)) {
    continue;
  }
  $subscriber_id = $username;
  $channel_id = $media['username'];
  addChannel($subscriber_id, $channel_id);
}


//render("image_template.php", ["media" => $media,"comments" => $comments,"mediaid" => $mediaid, "recommend" => $recommend,"playlists" => $playlists, "titile" => $_GET["name"]]);
render("image_template.php", ["media" => $media,"comments" => $comments,"mediaid" => $mediaid, "recommend" => $recommend,"playlists" => $playlists]);

$db->sql_close();
?>

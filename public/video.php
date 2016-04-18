<?php

// configuration
require_once("../includes/config.php");
require_once("enum.php");

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

if (isset($username) && isset($_GET["favorite"])) {
  addFavoriteMedia($username, $mediaid);
}

if (isset($username) && isset($_GET["commentid"])) {
  $commentid = $_GET["commentid"];
  rmComment($commentid);
}

if (isset($username) && $_SERVER["REQUEST_METHOD"] == "POST"){
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

if (isset($username) && isset($_GET["subscribe"])) {
  $subscriber_id = $username;
  $channel_id = $media['username'];
  if ($subscriber_id != $channel_id) {
    addChannel($subscriber_id, $channel_id);
  }
}


render("video_template.php", ["media" => $media,"comments" => $comments,"mediaid" => $mediaid, "recommend" => $recommend,"playlists" => $playlists, "Category" => $Category, "Keywords" => $Keywords]);

$db->sql_close();
?>

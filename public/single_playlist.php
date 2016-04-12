<?php

// configuration
require("../includes/config.php"); 
require("../includes/mediaService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$username = $_SESSION["username"];
$playlistid = $_GET["playlistid"];
$playlistname = $_GET["playlistname"];

if (isset($_GET["drop"])) {
  $mediaid = $_GET["drop"];
  rmPlaylistMedia($playlistid, $mediaid);
}
$medias = browseByPlaylist($playlistid);

render("single_playlist_template.php", ["title" => "singleplaylist", "playlistid" => $playlistid,"playlistname" => $playlistname, "medias" => $medias]);
$db->sql_close();
?>


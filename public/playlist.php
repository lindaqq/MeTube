<?php

// configuration
require("../includes/config.php"); 
require("../includes/mediaService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$username = $_SESSION["username"];

if (isset($_POST["playlist"])) {
  $playlistname = $_POST["playlist"];
  addPlaylist($playlistname, $username);
}
$playlists = showPlaylists($username);

render("playlist_template.php", ["title" => "playlist", "playlists" => $playlists]);
$db->sql_close();
?>


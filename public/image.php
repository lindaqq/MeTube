<?php

// configuration
require_once("../includes/config.php");
require("../includes/mediaService.php");
    
$id = $_GET["id"];
$playlists = Array();

if(isset($_SESSION["username"])){
    $playlists = showPlaylists($_SESSION["username"]);
}


render("image_template.php", ["id" => $id, "playlists" => $playlists, "titile" => $_GET["name"]]);
?>

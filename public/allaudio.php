<?php

// configuration
require_once("../includes/config.php");
require_once("../includes/mediaService.php");

$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
    
// get image paths from database   
$populars = browseByViewcountAndType(2, 9);
$recents = browseByUploadrecentAndType(2, 9);

// render home page for image, can be changed to video later
render("audio_homepage.php", ["populars" => $populars, "recents" => $recents]);
$db->sql_close();

?>


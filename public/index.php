<?php

// configuration
require_once("../includes/config.php");
require_once("../includes/mediaService.php");
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
    
// get image paths from database   
$popular = browseByViewcountAndType(3, 9);
$recent = browseByUploadrecentAndType(3, 9);

// render home page for image, can be changed to video later
render("image_homepage.php", ["images" => $popular]);
$db->sql_close();
?>

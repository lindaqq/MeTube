<?php

// configuration
require_once("../includes/config.php");
    
// get image paths from database   
$images = query("SELECT * FROM media order by view_count DESC limit 6");

// render home page for image, can be changed to video later
render("image.php", ["images" => $images]);
?>

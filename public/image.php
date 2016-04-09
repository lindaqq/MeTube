<?php

// configuration
require_once("../includes/config.php");
    
$id = $_GET["id"];
//echo $id;

render("image_template.php", ["titile" => "MeTube"]);
?>

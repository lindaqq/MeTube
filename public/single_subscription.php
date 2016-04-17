<?php

// configuration
require("../includes/config.php"); 
require("../includes/mediaService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);

$subscribe = $_GET["subscribe"];


$medias = browseByChannel($subscribe);

render("single_subscription_template.php", ["subscription" => $subscribe, "medias" => $medias]);
$db->sql_close();
?>


<?php

// configuration
require_once("../includes/config.php");
require("../includes/searchService.php"); 
$db = new mysql_db(SERVER, USERNAME, PASSWORD,DATABASE);
$mediaid = $_GET["id"];

if (isset($_GET["subscribe"])) {
  
}
if (isset($_GET["favorite"])) {

}
$recommend = recommend($mediaid, 8); 

render("image_template.php", ["titile" => "MeTube", "mediaid" => $mediaid, "recommend" => $recommend]);
$db->sql_close();
?>

<?php

    // configuration
    require("../includes/config.php"); 
    
// $_POST["keywords"] should be the search keyword

    render("search_template.php", ["title" => "Search Result"]);
?>


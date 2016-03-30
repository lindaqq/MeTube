<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT * FROM account WHERE id = ?", $_SESSION["id"]);
    
    render("account_form.php", ["active" => 1,"user" => $rows[0], "errortext" => "","titile" => "My Account"]);

?>


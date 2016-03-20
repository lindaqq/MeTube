<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT * FROM account WHERE id = ?", $_SESSION["id"]);
    
    render("account_form.php", ["user" => $rows[0], "errortext" => "","titile" => "My Account"]);

?>


<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT * FROM account WHERE username = ?", $_SESSION["username"]);
    
    render("account_form.php", ["user" => $rows[0], "errortext" => "","titile" => "My Account"]);

?>


<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/accountService.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!emtpy($_POST["contact"])){
            
        }
        else if (!emtpy($_POST["friend"])){
            
        }
        else if (!emtpy($_POST["foe"])){
            
        }
        
    }
    else{
        $contacts = getContacts($_SESSION["username"]);
        $friends = getFriends($_SESSION["username"]);
        $foes = getFoes($_SESSION["username"]);
        
        render("contact_template.php", ["contacts" => $contacts, "friends" => $friends, "foes" => $foes,  "errortext" => "","titile" => "Contact"]);
    }

?>


<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/accountService.php");

    $db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $errortext_contact = "";
        $errortext_friend = "";
        $errortext_foe = "";
        
        if(!empty($_POST["contact"])){
            $result = addContact($_SESSION["username"], $_POST["contact"]);
            if($result === 0){
                $errortext_contact = "you are a foe of ".$_POST["contact"].", you can't add ".$_POST["contact"]." as a contact";
            }
            else{
                $errortext_contact = "add contact successfully";
            }
        }
        else if (!empty($_POST["friend"])){
             $result = addFriend($_SESSION["username"], $_POST["friend"]);
            if($result === 0){
                $errortext_friend = "you are a foe of ".$_POST["contact"].", you can't add ".$_POST["contact"]." as a friend";
            }
            else{
                $errortext_friend = "add contact successfully";
            }
        }
        else if (!empty($_POST["foe"])){
            addFoe($_SESSION["username"], $_POST["foe"]);
            
            $errortext_foe = "add foe successfully";
        }
        
        $contacts = getContacts($_SESSION["username"]);
        $friends = getFriends($_SESSION["username"]);
        $foes = getFoes($_SESSION["username"]);
        

        render("contact_template.php", ["contacts" => $contacts, "friends" => $friends, "foes" => $foes,  "errortext_contact" => $errortext_contact, "errortext_friend" => $errortext_friend, "errortext_foe" => $errortext_foe, "titile" => "Contact"]);
        
        
    }
    else{
        $contacts = getContacts($_SESSION["username"]);
        $friends = getFriends($_SESSION["username"]);
        $foes = getFoes($_SESSION["username"]);
        

        render("contact_template.php", ["contacts" => $contacts, "friends" => $friends, "foes" => $foes,  "errortext_contact" => "", "errortext_friend" => "", "errortext_foe" => "", "titile" => "Contact"]);
    }
    $db->sql_close();


?>


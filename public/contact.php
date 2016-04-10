<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/accountService.php");

    $db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

    $errortext_contact = "";
    $errortext_friend = "";
    $errortext_foe = "";
    
    //apache config set REQUEST_METHOD GET as default, automatically add / after the linke
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if(!empty($_GET["contact"])){
            rmExist($_SESSION["username"], $_GET["contact"]);
            
            $errortext_contact = "remove ". $_GET["contact"]. " from contact list successfully";
        }
        else if(!empty($_GET["friend"])){
            rmExist($_SESSION["username"], $_GET["friend"]);
            
            $errortext_friend = "remove ". $_GET["friend"]. " from friend list successfully";
        }
        else if(!empty($_GET["foe"])){
            rmExist($_SESSION["username"], $_GET["foe"]);
            
            $errortext_foe = "remove ". $_GET["foe"]. " from foe list successfully";
        }
        
        
        $contacts = getContacts($_SESSION["username"]);
        $friends = getFriends($_SESSION["username"]);
        $foes = getFoes($_SESSION["username"]);
        

        render("contact_template.php", ["contacts" => $contacts, "friends" => $friends, "foes" => $foes,  "errortext_contact" => $errortext_contact, "errortext_friend" => $errortext_friend, "errortext_foe" => $errortext_foe, "titile" => "Contact"]);
        
    }
    

    else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(!empty($_POST["contact"])){
            if ($_POST["contact"] === $_SESSION["username"]){
                $errortext_contact = "can't add yourself";
            }
            else if(existUser($_POST["contact"]) === 0){
                $errortext_contact = "user ".$_POST["contact"]. " doesn't exist";
            }
            else {
                $result = addContact($_SESSION["username"], $_POST["contact"]);
                if($result === 0){
                $errortext_contact = "you are a foe of ".$_POST["contact"].", you can't add ".$_POST["contact"]." as a contact";
                }
                else{
                    $errortext_contact = "add contact successfully";
                }
            }
            
            
        }
        else if (!empty($_POST["friend"])){
            if ($_POST["friend"] === $_SESSION["username"]){
                $errortext_friend = "can't add yourself";
            }
            else if(existUser($_POST["friend"]) === 0){
                $errortext_friend = "user ".$_POST["friend"]." doesn't exist";
            }
            else{
                $result = addFriend($_SESSION["username"], $_POST["friend"]);
            if($result === 0){
                $errortext_friend = "you are a foe of ".$_POST["contact"].", you can't add ".$_POST["contact"]." as a friend";
            }
            else{
                $errortext_friend = "add contact successfully";
                }
            }
            
             
        }
        else if (!empty($_POST["foe"])){
            if ($_POST["foe"] === $_SESSION["username"]){
                $errortext_foe = "can't add yourself";
            }
            else if(existUser($_POST["foe"]) === 0){
                $errortext_foe = "user ".$_POST["foe"]." doesn't exist";
            }
            else{
                addFoe($_SESSION["username"], $_POST["foe"]);
            
                $errortext_foe = "add foe successfully";
            }
            
            
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


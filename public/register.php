<?php

    // configuration
    require("../includes/config.php"); 
    
    $errortext="";
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            $errortext = "username must not be empty";
            render("register_form.php", ["errortext" => $errortext, "title" => "Log In"]);
            
        }
        else if (empty($_POST["password"]) || empty($_POST["password1"]))
        {
            $errortext = "password must not be empty";
            render("register_form.php", ["errortext" => $errortext, "title" => "Log In"]);
        }
        else if ($_POST["password"] !== $_POST["password1"] ){
            $errortext = "passwords don't match";
            render("register_form.php", ["errortext" => $errortext, "title" => "Log In"]);
        }

        // query database for user
        $rows = query("SELECT * FROM account WHERE username = ?", $_POST["username"]);
        
        if (count($rows) != 0){
            $errortext = "username already exists";
            render("register_form.php", ["errortext" => $errortext, "title" => "Log In"]);
        }
        // insert new username/password
        else{
            if(empty($_POST["detail"])){
                query("insert into account (username, password) values (?, ?)", $_POST["username"], $_POST["password"]);
            }
            else{
                query("insert into account (username, password,detail) values (?, ?,?)", $_POST["username"], $_POST["password"], $_POST["detail"]);
            }
            
            
            
            //////////// how to detect insert failure????????????????????????????????
            //$rows = query("SELECT * FROM account WHERE username = ?", $_POST["username"]);
            $_SESSION["username"] = $_POST["username"];
            require_once("../public/index.php");
        }

    }
    else
    {
        // else render form
        render("register_form.php", ["errortext" => $errortext, "title" => "Log In"]);
    }

?>


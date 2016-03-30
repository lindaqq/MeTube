<?php

    // configuration
    require("../includes/config.php"); 
    
    $errortext="";
    $rows = query("SELECT * FROM account WHERE id = ?", $_SESSION["id"]);
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // validate submission
        if (empty($_POST["username"]))
        {
            $errortext = "username must not be empty";
            render("account_form.php", ["active" =>1,"user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
            
        }
        else if (empty($_POST["password"]))
        {
            $errortext = "password must not be empty";
            render("account_form.php", ["active" =>1,"user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
        }
        else if (!empty($_POST["password"]) && empty($_POST["password1"])){
            if($_POST["password"] !== $rows[0]["password"]){
                $errortext = "To change password, repeat password again";
                render("account_form.php", ["active" =>1,"user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
            }
        }
        else if ($_POST["password"] !== $_POST["password1"] ){
            $errortext = "passwords don't match";
            render("account_form.php", ["active" =>1,"user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
        }
        else if (empty($_POST["email"])){
            $errortext = "email must not be empty";
            render("account_form.php", ["active" =>1,"user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
        }

        // query database for user
        $rows2 = query("SELECT * FROM account WHERE username = ?", $_POST["username"]);
        
        if (count($rows2) != 0){
            // if username is not current username, but a replicate of another user's name
            if($rows2[0]["id"] !== $_SESSION["id"]){
                $errortext = "username already exists";
                render("account_form.php", ["active" =>1,"user" => $rows[0], "errortext" => $errortext, "title" => "My Account"]);
            }
            
            query("update account set username = ?, password = ?, email = ? where id = ?", $_POST["username"], $_POST["password"], $_POST["email"], $_SESSION["id"]);
          
            $errortext = "successfully update profile";
            $rows3 = query("SELECT * FROM account WHERE id = ?", $_SESSION["id"]);
    
            render("account_form.php", ["active" =>1,"user" => $rows3[0], "errortext" => $errortext, "title" => "My Account"]);
        }
        // update username/password/email
        else{
            query("update account set username = ?, password = ?, email = ? where id = ?", $_POST["username"], $_POST["password"], $_POST["email"], $_SESSION["id"]);
          
            $errortext = "successfully update profile";
            $rows3 = query("SELECT * FROM account WHERE id = ?", $_SESSION["id"]);
    
            render("account_form.php", ["active" =>1,"user" => $rows3[0], "errortext" => $errortext, "title" => "My Account"]);
        }

    }
    else
    {
        // else render form
        render("account_form.php", ["active" =>1,"user" => $rows[0], "errortext" => $errortext, "title" => "My Account"]);
    }

?>


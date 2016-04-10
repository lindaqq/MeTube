<?php

    // configuration
    require("../includes/config.php"); 
    
    $errortext="";
    $rows = query("SELECT * FROM account WHERE username = ?", $_SESSION["username"]);
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
      if (empty($_POST["password"]))
        {
            $errortext = "password must not be empty";
            render("account_form.php", ["user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
        }
        else if (!empty($_POST["password"]) && empty($_POST["password1"])){
            if($_POST["password"] !== $rows[0]["password"]){
                $errortext = "To change password, repeat password again";
                render("account_form.php", ["user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
            }
        }
        else if ($_POST["password"] !== $_POST["password1"] ){
            $errortext = "passwords don't match";
            render("account_form.php", ["user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
        }
        /*
        else if (empty($_POST["email"])){
            $errortext = "email must not be empty";
            render("account_form.php", ["active" =>1,"user" => $rows[0],"errortext" => $errortext, "title" => "My Account"]);
        }
        */
        
        /*
        // query database for user
        $rows2 = query("SELECT * FROM account WHERE username = ?", $_POST["username"]);
        
        if (count($rows2) != 0){
            // if username is not current username, but a replicate of another user's name
            if($rows2[0]["username"] !== $_SESSION["username"]){
                $errortext = "username already exists";
                render("account_form.php", ["active" =>1,"user" => $rows[0], "errortext" => $errortext, "title" => "My Account"]);
            }
            
            query("update account set username = ?, password = ?, where id = ?", $_POST["username"], $_POST["password"], $_SESSION["id"]);
          
            $errortext = "successfully update profile";
            $rows3 = query("SELECT * FROM account WHERE username = ?", $_SESSION["username"]);
    
            render("account_form.php", ["active" =>1,"user" => $rows3[0], "errortext" => $errortext, "title" => "My Account"]);
        }
        // update username/password
        else*/
        {
            $detail="";
            if(empty($_POST["detail"])){
                $detail="";
            }
            else{
                $detail=$_POST["detail"];
            }
            query("update account set password = ?,detail = ? where username = ?", $_POST["password"], $detail, $_SESSION["username"]);
          
            $errortext = "successfully update profile";
            $rows3 = query("SELECT * FROM account WHERE username = ?", $_SESSION["username"]);
    
            render("account_form.php", ["user" => $rows3[0], "errortext" => $errortext, "title" => "My Account"]);
        }

    }
    else
    {
        // else render form
        render("account_form.php", ["user" => $rows[0], "errortext" => $errortext, "title" => "My Account"]);
    }

?>


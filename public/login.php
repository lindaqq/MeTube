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
            render("login_form.php", ["errortext" => $errortext, "title" => "Log In"]);
            
        }
        else if (empty($_POST["password"]))
        {
            $errortext = "password must not be empty";
            render("login_form.php", ["errortext" => $errortext, "title" => "Log In"]);
        }

        // query database for user
        $rows = query("SELECT * FROM account WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if ($_POST["password"] === $row["password"])
            {
                // remember that user's now logged in by storing user's username in session
                $_SESSION["username"] = $row["username"];

                // redirect to homepage
                require_once("../public/index.php");
            }
            else{
                $errortext = "invalid username/password";
                render("login_form.php", ["errortext" => $errortext, "title" => "Log In"]);
            }
        }
        else{
            $errortext = "username not exists";
            render("login_form.php", ["errortext" => $errortext, "title" => "Log In"]);
        }
    }
    else
    {
        // else render form
        render("login_form.php", ["errortext" => $errortext, "title" => "Log In"]);
    }

?>


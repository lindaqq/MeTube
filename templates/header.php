<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../templates/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../templates/css/styleqi.css" type="text/css">
	<script type="text/javascript" src="../templates/js/jquery.js"></script>
	<script type="text/javascript" src="../templates/js/bootstrap.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Metube</title>
        <?php endif ?>
</head>


<body>
    <div id="top">
	<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
       
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../public/index.php">MeTube</a>
        </div>
       
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../public/index.php">Image</a></li>
                <li><a href="#">Video</a></li>
                
                <li><a href="#">Audio</a></li>
            </ul>

             <!--
            <form class="navbar-form navbar-right" role="search"> -->
            <form class="navbar-form" role="search" action="../public/search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this site" name="keywords" size="50">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"> Search
                        <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>

                </div>
            <?php
                if(isset($_SESSION["username"])){
                    echo <<<_END
                    <button  type = "button" onclick="document.location.href = '../public/logout.php'" class="btn btn-default navbar-right" style="margin-left:20px">Log Out</button>
                    <button  type = "button" onclick="document.location.href = '../public/account.php'" class="btn btn-primary navbar-right">My Account</button>
_END;
                }
                else{
                    echo <<<_END
                    <button  type = "button" onclick="document.location.href = '../public/login.php'" class="btn btn-default navbar-right" style="margin-left:20px">Sign in</button>
        
                 <button type = "button" onclick="document.location.href = '../public/register.php'" class="btn btn-primary navbar-right">Register</button>
_END;
                }
    
            ?>  
            
            </form>
            
        </div>
    </div>
	</nav>
	<hr>
    </div>
    
    <div id="middle">
    <div class="container">

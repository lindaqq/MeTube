<!--div class="col-lg-6 col-sm-6"-->
<div class="container">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="../templates/images/orange_background.jpg">
        </div>
        <div class="useravatar">
            <img alt="" src="../templates/images/account.png">
        </div>
        <div class="card-info"> <span class="card-title"><?php 
            $username = $user["username"];
            echo $username;
            ?></span>

        </div>
    </div>
    
    
    
    
    
    
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" onclick="document.location.href = '../public/account.php'"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" onclick="document.location.href = '../public/contact.php'"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Contact</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Subscription</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Playlists</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab5" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/media_upload_process.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Uploads</div>
            </button>
        </div>
    </div>

        <div class="well">
          <h3>My Profile</h3>
            <?php
            $username = $user["username"];
            $password = $user["password"];
            $detail = $user["detail"];
            
            echo <<<_END
            <form class="form-signin" action="../public/update_profile.php" method="post">
                <h4>$username</h4>
                <h4>password:</h4><input type="password" class="form-control" name="password" value=$password required>
                <h4>repeate password:</h4><input type="password" class="form-control" name="password1" placeholder="Repeat Password if need to change" >
                <h4>About me: </h4><textarea  class="form-control" name="detail" rows="4" cols="50" >$detail</textarea>
                
                <br><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Update My Profile</button>
                <br>
                <h4>$errortext</h4>
            </form>
_END;
            
            ?>
                         
        </div>
            
         
</div>

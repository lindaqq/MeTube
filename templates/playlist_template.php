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
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
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
            <button type="button" id="following" class="btn btn-default" href="#tab6" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Uploads</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
          <?php
          if ($active === 1){
              echo <<<_END
              <div class="tab-pane fade in active" id="tab1">
_END;
          }
          else{
              echo <<<_END
              <div class="tab-pane fade in" id="tab1">
_END;
          }
          ?>
          <h3>My Profile</h3>
            <?php
            $username = $user["username"];
            $password = $user["password"];
            $email = $user["email"];
            
            echo <<<_END
            <form class="form-signin" action="../public/update_profile.php" method="post">
                <h4>username:</h4><input type="text" class="form-control" name="username" value=$username required autofocus>
                <h4>password:</h4><input type="password" class="form-control" name="password" value=$password required>
                <h4>repeate password:</h4><input type="password" class="form-control" name="password1" placeholder="Repeat Password if changing password" >
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Update My Profile</button>
                <br>
                <h4>$errortext</h4>
            </form>
_END;
            
            ?>
                         
        </div>
            
          <?php
          if ($active === 2){
              echo <<<_END
              <div class="tab-pane fade in active" id="tab2">
_END;
          }
          else{
              echo <<<_END
              <div class="tab-pane fade in" id="tab2">
_END;
          }
          ?>
          <h3>This is tab 2</h3>
        </div>
    
        <?php
          if ($active === 3){
              echo <<<_END
              <div class="tab-pane fade in active" id="tab3">
_END;
          }
          else{
              echo <<<_END
              <div class="tab-pane fade in" id="tab3">
_END;
          }
          ?>
    
          <h3>This is tab 3</h3>
        </div>

        
         <?php
          if ($active === 4){
              echo <<<_END
              <div class="tab-pane fade in active" id="tab4">
_END;
          }
          else{
              echo <<<_END
              <div class="tab-pane fade in" id="tab4">
_END;
          }
          ?>
    
          <h3>This is tab 4</h3>
        </div>

        <?php
          if ($active === 5){
              echo <<<_END
              <div class="tab-pane fade in active" id="tab5">
_END;
          }
          else{
              echo <<<_END
              <div class="tab-pane fade in" id="tab5">
_END;
          }
          ?>
    
          <h3>This is tab 5</h3>
        </div>


        <?php
          if ($active === 6){
              echo <<<_END
              <div class="tab-pane fade in active" id="tab6">
_END;
          }
          else{
              echo <<<_END
              <div class="tab-pane fade in" id="tab6">
_END;
          }
          ?>
    
         <h3>Uploads</h3>
              <form method="post" action="../public/media_upload_process.php" enctype="multipart/form-data" >
 
                <p style="margin:0; padding:0">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                Add a Media: <label style="color:#663399"><em> (Each file limit 10M)</em></label><br/>
                <input  name="file" type="file" size="50" />
  
	           <input value="Upload" name="submit" type="submit" />
                </p>                
            </form>
            <?php
                echo $errortext;
            ?>
        </div>
          
          
      </div>
    </div>

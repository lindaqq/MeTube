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
            $username = $_SESSION["username"];
            echo $username;
            ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
         <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" onclick="document.location.href = '../public/account.php'"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" onclick="document.location.href = '../public/contact.php'"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Contact</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/subscribe.php'" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Subscription</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/playlist.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Playlists</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" nclick="document.location.href = '../public/favorite.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-primary" onclick="document.location.href = '../public/media_upload_process.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Uploads</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/message.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Messages</div>
            </button>
        </div>
    </div>

        <div class="well">
         <h3>Uploads</h3>
            
            <div class="row text-center">
                <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
                <form method="post" action="../public/media_upload_process.php" enctype="multipart/form-data" >
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <label>Add a Media:</label> <label style="color:#663399"><em> (Each file limit 10M)</em></label><br/>
                    <input  name="file" type="file" size="50" />
                    <h4>title:</h4><input type="text" class="form-control" name="title" required autofocus>
                    <h4>type:</h4>
                    <div class="row text-center">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="radio">
                      <input type="radio" name="type" value="1" checked>
                        video
                        </label>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="radio">
                      <input type="radio" name="type" value="2">
                        audio
                        </label>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="radio">
                      <input type="radio" name="type" value="3">
                        image
                        </label>
                        </div>
                    </div>
                    <h4>description:</h4><textarea  class="form-control" name="description" rows="4" cols="50" required autofocus></textarea>
                    
                    <h4>Category:</h4>
                    <select name = "category" class="input-sm form-control">
                                      <option value="1">Sports</option>
                                      <option value="2">Entertainment</option>
                                        <option value="3">Others</option>
                                      
                    </select>
                    
                       
                    <h4>Keywords:</h4>
                    <div class="row text-center">
                    
                     <?php
                    $i = -1;
                    foreach($keywords as $word) {
                        $i = $i + 1;
                        echo <<<_END
                        <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="checkbox">
                      <input type="checkbox" name="keyword[]" value="$i">
                        $word
                        </label>
                        </div>
_END;
        }   
    
                    ?> 
                    </div>
                   
                    
                    
                     <h4>sharing:</h4>
                    <div class="row text-center">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="radio">
                         <input type="radio" name="share" value="0" checked>share to everyone </label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="radio">
                         <input type="radio" name="share" value="1" >share to friends only </label>
                        </div>
                    
                    </div>
                     
                    
                    <h4>block certain friends:</h4>
                        <textarea  class="form-control" name="block" rows="4" cols="50" placeholder="type in usernames of your friends that you want to block. Separate by ;" ></textarea>
                    
                    
                    <h4>Settings:</h4>
                    <div class="row text-center">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="checkbox">
                         <input type="checkbox" name="discuss" value="1" checked>can be discussed</label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="checkbox">
                         <input type="checkbox" name="rate" value="1" checked>can be rated </label>
                        </div>
                    
                    </div>
                    
                     <br><br>
	               <input value="Upload" name="submit" type="submit" />
                               
                </form>
            
                </div>
                
            </div>
              
            <?php
                echo $errortext;
            ?>
        </div>
</div>

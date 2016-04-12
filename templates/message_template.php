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
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/favorite.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/media_upload_process.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Uploads</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-primary" onclick="document.location.href = '../public/message.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Messages</div>
            </button>
        </div>
    </div>

        <div class="well">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <p class="lead"> My Messages:  </p>   
                </div>  
            
            </div>
          
            
  		    <div class="row text-center">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="list-group">
            <?php
                //echo $errortext;
                
                foreach($messages as $message){
                  $content = $message["content"];
                  $sender = $message["sender"];
                  $receiver = $message["receiver"];
                  $posttime = $message["posttime"];
                $posttime = split(' ', $posttime)[0];
                    
                    echo <<<_END
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">From $sender to $receiver $posttime</h6>
                        <p class="list-group-item-text">$content</p>
                    </a>
_END;
                }  
                
            ?>
                    </div>
                </div>
        
            </div>  
            
            <br><br>
            <p>Send New Message:</p>
            <div class="row text-center">
                <form action="../public/message.php" method="post">
                    
                    <h4>To:</h4><select name = "receiver" class="input-sm form-control">
                        <?php
                            foreach($contacts as $contact){
                                $name = $contact["userid2"];
                                
                                echo <<<_END
                                <option value=$name>$name</option>
_END;
                            }
                        ?>                   
                    </select>
                    
                    <h4>Content: </h4><textarea  class="form-control" name="content" rows="4" cols="50" ></textarea>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <!--a href="#" class="btn btn-primary btn-primary">Add</a-->
                        <button class="btn btn-primary btn-primary" type="submit">
                        Send</button>
                    </div>
                    <br><br>
                    <h4>$errortext</h4>
                </form>
            
            </div>     
    </div>

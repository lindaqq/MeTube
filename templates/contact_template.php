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
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <p class="lead"> Contacts:  </p>   
                </div>
                
                 <form action="../public/contact.php" method="post">
                    
                    <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
                       <input type="text" class="input-sm form-control" name="contact" placeholder="add username of the new contact"/>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <!--a href="#" class="btn btn-primary btn-primary">Add</a-->
                        <button class="btn btn-primary btn-primary" type="submit">
                        Add</button>
                    </div>
                </form>
            
            </div>
      
          
  		    <div class="row text-center">
            <?php
                foreach($contacts as $contact){
                    echo <<<_END
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-4">

      			   <div class="img-thumbnail"> <img src="../templates/images/account.png" alt="Thumbnail Image 1" class="img-responsive" width="100" height="100"></div>
      			<p>$contact</p>
                <p>[drop]</p>
    		</div>
_END;
                }  
                
            ?>
        
                
            <?php  
                /*
            for($i = 0; $i < 10; $i++){
                echo <<<_END
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-4">

      			   <div class="img-thumbnail"> <img src="../templates/images/account.png" alt="Thumbnail Image 1" class="img-responsive" width="100" height="100"></div>
      			<p>contact name</p>
                <p>[drop]</p>
    		</div>
_END;
            }
            */
            ?>
        </div>
            
            <br><br>
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <p class="lead"> Friends:  </p>   
                </div>
                
                 <form action="../public/contact.php" method="post">
                    
                    <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
                       <input type="text" class="input-sm form-control" name="friend" placeholder="add username of new friend"/>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <!--a href="#" class="btn btn-primary btn-primary">Add</a-->
                        <button class="btn btn-primary btn-primary" type="submit">
                        Add</button>
                    </div>
                </form>
            
            </div>
      
            
            
            <!--p class="lead"> Friends: </p-->
  		    <div class="row text-center">
        
            <?php    
            for($i = 0; $i < 10; $i++){
                echo <<<_END
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-4">

      			   <div class="img-thumbnail"> <img src="../templates/images/account.png" alt="Thumbnail Image 1" class="img-responsive" width="100" height="100"></div>
      			<p>contact name</p>
                <p>[drop]</p>
    		</div>
_END;
            }
            ?>
        </div>
            
            <br><br>
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <p class="lead"> Foes:  </p>   
                </div>
                
                 <form action="../public/contact.php" method="post">
                    
                    <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
                       <input type="text" class="input-sm form-control" name="foe" placeholder="add username of new foe"/>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <!--a href="#" class="btn btn-primary btn-primary">Add</a-->
                        <button class="btn btn-primary btn-primary" type="submit">
                        Add</button>
                    </div>
                </form>
            
            </div>
  		    <div class="row text-center">
        
            <?php    
            for($i = 0; $i < 10; $i++){
                echo <<<_END
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-4">

      			   <div class="img-thumbnail"> <img src="../templates/images/account.png" alt="Thumbnail Image 1" class="img-responsive" width="100" height="100"></div>
      			<p>contact name</p>
                <p>[drop]</p>
    		</div>
_END;
            }
            ?>
        </div>

    </div>

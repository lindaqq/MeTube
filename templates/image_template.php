
<div class="row">
    <h1>Article Thumbnails</h1>
    <!--p>Use it to your news site, feature a article.</p-->
</div>
    <div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
            <div class="row">
			<!-- artigo em destaque -->
			<div class="featured-article">
				<img src="http://placehold.it/482x350" alt="" class="thumb">
				<div class="block-title">
					<!--h2>Lorem ipsum dolor asit amet</h2-->
					<p class="by-author"><small>By Jhon Doe &nbsp;&nbsp;&nbsp;&nbsp; Viewed: 234 &nbsp;&nbsp;&nbsp;&nbsp; Avg Rating: 3.5</small></p>
				</div>  
			</div>       
            </div>
            
            <div class="row">
                <h3>Description:</h3>
            </div>
            
            <div class="row">
                Lorem ipsum dolor asit amet Lorem ipsum dolor asit amet Lorem ipsum dolor asit amet Lorem ipsum dolor asit amet Lorem ipsum dolor asit amet Lorem ipsum dolor asit amet Lorem ipsum dolor asit amet
            </div>
            
            <br>
            
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    Rate:
                </div>
                
                <form class="form-inline" role="form" action="../public/image.php" method="rate">
                   <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="radio">
                      <input type="radio" name="rate" value="1">
                        1
                        </label>
                        </div>
                        
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="radio">
                      <input type="radio" name="rate" value="2">
                        2
                        </label>
                        </div>
                        
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="radio">
                      <input type="radio" name="rate" value="3">
                        3
                        </label>
                        </div>
                        
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <button class="btn btn-primary btn-small" type="submit">Rate</button>
                        </div>
                
                </form>
                    
                
            </div>
            <br>
            
            <div class="row">
            <a href="../public/image.php?subscribe=..." class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Subscribe</a>
            <a href="../public/image.php?favorite=..." class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-up"></span> Add to favorites</a>
            <a href="../public/image.php?favorite=..." class="btn btn-warning"><span class="glyphicon glyphicon-thumbs-up"></span> Download</a>
            </div>
            
            <br>
            <div class="row">
                    <form role="form" action="../public/image.php" method="post">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                            <button class="btn btn-info" type="submit">Add to Playlists:</button>
                            </div>
                        </div>
                            
                        <div class="row">
                            
                            <?php
                        
                    for($i=0; $i < 4; $i++){
                        echo <<<_END
                        <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="checkbox">
                      <input type="checkbox" name="playlist[]" value="$i">
                        playlist $i
                        </label>
                        </div>
_END;
        }   
                    ?> 
                        </div>
                            
                    </form>
            </div>
            
            <br><br>
            <p>Add new comment:</p>
            
                <form role="form" action="../pulbic/image.php" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 ">   
                            <textarea  class="form-control" name="comment" rows="4" cols="50" placeholder="add new comment" ></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <button class="btn btn-info" type="submit">Add</button>
                        </div>
                    </div>
                
                    
                </form>
            
           
            <br><br>
            <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

                <div class="col-sm-10 col-md-10 col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                        </div>
                        <div class="panel-body">
                            Panel content ..............................................................
                            .................................................................
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            
            
            
            </div>
			<!-- /.featured-article -->
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1">
			<ul class="media-list main-list">
                <?php
                foreach($recommend as $media) {
                  $title = $media["title"];
                  $username = $media["username"];

                    echo <<<_END
                    <li class="media">
			    <a class="pull-left" href="#">
			      <img class="media-object" src="http://placehold.it/150x90" alt="...">
			    </a>
			    <div class="media-body">
			      <h4 class="media-heading">$title</h4>
			      <p class="by-author">By $username</p>
			    </div>
                  </li>
_END;
                }
                
                
                ?>
			</ul>
		</div>

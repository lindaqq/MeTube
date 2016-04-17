<?php
require("../public/enum.php");
$title = $media["title"];
$username = $media["username"];
$viewcount = $media["viewcount"];
$avgrate = $media["avgrate"];
$path = $media["path"];
echo <<<_END
<div class="row">
    <h1>$title</h1>
</div>
    <div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
            <div class="row">
			<!-- artigo em destaque -->
			 <div class="featured-article">
				<a href="#">
					<img src="../templates/images/400X200.gif" alt="" class="thumb" max-height = 240>
<audio controls>
  <source src=$path type="audio/mpeg">
Your browser does not support the audio element.
</audio>
				</a>
				<div class="block-title">
					<p class="by-author"><small>By $username &nbsp;&nbsp;&nbsp;&nbsp;Viewed: $viewcount &nbsp;&nbsp;&nbsp;&nbsp;Avg Rating: $avgrate</small></p>
				</div>
			</div>
            </div>
            
            <br>
_END;
?>

<div class="row well">
                <?php
                    if(isset($_SESSION["username"])){
                        if ($media["canrate"] == 1){
            echo <<<_END
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    Rate:
                </div>
                
                <form class="form-inline" role="form" action="../public/image.php?id=$mediaid" method="post">
                   <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="radio">
                      <input type="radio" name="rate" value="1" checked>
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
_END;
        }
                        
                        echo <<<_END
                        <a href="../public/image.php?id=$mediaid&subscribe=$mediaid" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Subscribe $username</a>
                        
                        <a href="../public/image.php?id=$mediaid&favorite=$mediaid" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-up"></span> Add to favorites</a>
_END;
                    }
                
                ?>
            
                <a href="<?php echo $media["path"]?>" download class="btn btn-warning"><span class="glyphicon glyphicon-thumbs-up"></span> Download</a>
            </div>
            
            <br>

<?php
        if(isset($_SESSION["username"])){

            $count = count($playlists);
            if($count === 0){
                 echo <<<_END
            <div class="row well">
                    <button class="btn btn-info">Add to Playlists:</button><p> you don't have any playlist. Add one in your account </p>
                
            </div>
          
_END;
            }
            else{
                echo <<<_END
                <div class="well">
                    <form role="form" action="../public/image.php?id=$mediaid" method="post">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                            <button class="btn btn-info" type="submit">Add to Playlists:</button>
                            </div>
                        </div>
                        <div class="row text-center">
_END;
                    foreach($playlists as $playlist){
                        $playlistid = $playlist["playlistid"];
                        $playlistname = $playlist["playlistname"];
                echo <<<_END
                        <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="checkbox">
                      <input type="checkbox" name="playlist[]" value=$playlistid>
                        $playlistname
                        </label>
                        </div>
_END;

        }   
                echo <<<_END
                        </div>
                    </form>
                </div>
            <br><br>
_END;
            }
        }
    ?>

<?php
        if($media["candiscuss"] == 1){
            if (isset($_SESSION["username"])){
            echo <<<_END
            <div class="row">
            <h3>Add new comment:</h3>
            
                <form role="form" action="../public/image.php?id=$mediaid" method="post">
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
            </div>
                <br><br>
_END;
            }
            
            foreach($comments as $comment){
                $username = $comment["username"];
                $content = $comment["content"];
                $posttime = $comment["posttime"];
                $posttime = split(' ', $posttime)[0];
                $commentid = $comment["commentid"];
                
                echo <<<_END
                 <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

                <div class="col-sm-10 col-md-10 col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>$username</strong> <span class="text-muted">$posttime</span>
_END;
                if(isset($_SESSION["username"]) && ($username==$_SESSION["username"])){
                    echo <<<_END
                    <a href="../public/image.php?id=$mediaid&commentid=$commentid">delete</a>
_END;
                }
                
                echo <<<_END
                            
                        </div>
                        <div class="panel-body">
                            $content
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            </div>
_END;
            }
        }

    ?>


<!-- /.featured-article -->
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1">      
            <div class="row">
                <p>Category:<?php echo $Category[$media["category"]]?></p>
            </div>
            <div class="row">
                <p>Keywords:</p>
            </div>
            <div class="row">
                <?php
                    //$words = split(",",substr($media["keywords"],0, -1));
                    $wordstr = $media["keywords"];
                    $wordstr = preg_replace('/\s+/', '', $wordstr);
                    $words = split(",",$wordstr);
                    foreach($words as $word) {
                      if ($word == "") {
                        continue;
                      }
                        echo <<<_END
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <button class="btn btn-success btn-sm">$word</button>
                        </div>
_END;
                    }
                ?>
            </div>
            <br><br>
            <div class="row">
                <p class="lead">Recommendations:</p>
            </div>
            
            <div class="row">
			<ul class="media-list main-list">
                <?php
                foreach($recommend as $media) {
                  $title = $media["title"];
                  $username = $media["username"];
                  $id = $media["mediaid"];
                  $type = $Type[$media["type"]];

                    echo <<<_END
                    <li class="media">
			    <a class="pull-left" href="$type.php?id=$id">
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
		</div>
</div>

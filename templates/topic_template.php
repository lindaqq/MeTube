<div class="well">
        <div class="row">
            <?php
            
            echo <<<_END
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p class="lead"> Group: $groupname </p>   
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p class="lead"> Topic: $topic  </p>   
                </div>
_END;
            ?>
                
        </div>
    
        <div class="row text-center">
    
        <form role="form" action="../public/topic.php?groupid=<?php echo $groupid.'&groupname='.$groupname.'&topic='.$topic?>" method="post">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">   
                            <textarea  class="form-control" name="discuss" rows="4" cols="50" placeholder="add new comment" ></textarea>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row text-center">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                        <button class="btn btn-info" type="submit">Add</button>
                        </div>
                    </div>
                </form>
    
        </div>
</div>
            
            
          
    
        <div class="row text-center">
            <?php
                //echo $errortext;
                
                 foreach($comments as $comment){
                $username = $comment["username"];
                $content = $comment["content"];
                $posttime = $comment["posttime"];
                $posttime = split(' ', $posttime)[0];
                
                echo <<<_END
                 <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="100" height="100">
                </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>$username</strong> <span class="text-muted">$posttime</span>
                            
                        </div>
                        <div class="panel-body">
                            $content
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            </div>
_END;
            }
                
            ?>
    </div> 

            
          
  		    
        
                


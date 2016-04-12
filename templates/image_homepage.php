
<p class="lead"> Popular Uploads: </p>
<div class="row text-center">
    <?php
         //for($i=0; $i < 12; $i++){
        foreach($populars as $popular){
            $id=$popular["mediaid"];
            $title = $popular["title"];
            $viewcount = $popular["viewcount"];
            $posttime = $popular["posttime"];
            $posttime = split(' ', $posttime)[0];
               echo <<<_END
               
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
      			   <div class="img-thumbnail"> <a href="../public/image.php?id=$id&name=$title"><img src="../templates/images/400X200.gif" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			   <p>$title</p>
                    <h6>viewed: $viewcount</h6>
                    <h6>uploaded at: $posttime</h6>
    		  </div> 
            </div>
_END;
        }   
    ?>
            
</div>

<br><br>
<p class="lead"> Recent Uploads: </p>
<div class="row text-center">
    <?php
         //for($i=0; $i < 12; $i++){
        foreach($recents as $recent){
            $id=$recent["mediaid"];
            $title = $recent["title"];
            $viewcount = $recent["viewcount"];
            $posttime = $recent["posttime"];
            $posttime = split(' ', $posttime)[0];
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
      			   <div class="img-thumbnail"> <a href="../public/image.php?id=$id&name=$title"><img src="../templates/images/400X200.gif" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			   <p>$title</p>
                    <h6>viewed: $viewcount</h6>
                    <h6>uploaded at: $posttime</h6>
    		      </div> 
            </div>
_END;
        }   
    ?>
</div>
   <div class="row text-center"> 
    <a href="../public/allimage.php" class="btn btn-lg btn-success">View More</a>
    </div>
            

<p class="lead"> Popular Pulic Uploads: </p>
<div class="row text-center">
    <?php
         //for($i=0; $i < 12; $i++){
        foreach($populars as $popular){
            $id=$popular["mediaid"];
            $title = $popular["title"];
            $viewcount = $popular["viewcount"];
            $posttime = $popular["posttime"];
            $posttime = split(' ', $posttime)[0];
            $path = $popular["path"];
               echo <<<_END
               
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
      			   <div class="img-thumbnail"> <a href="../public/audio.php?id=$id"><img src=$path alt="Thumbnail Image 1" class="img-responsive"></a></div>
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
<p class="lead"> Recent Public Uploads: </p>
<div class="row text-center">
    <?php
         //for($i=0; $i < 12; $i++){
        foreach($recents as $recent){
            $id=$recent["mediaid"];
            $title = $recent["title"];
            $viewcount = $recent["viewcount"];
            $posttime = $recent["posttime"];
            $posttime = split(' ', $posttime)[0];
            $path = $recent["path"];
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
      			   <div class="img-thumbnail"> <a href="../public/audio.php?id=$id"><img src="$path" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			   <p>$title</p>
                    <h6>viewed: $viewcount</h6>
                    <h6>uploaded at: $posttime</h6>
    		      </div> 
            </div>
_END;
        }   
    ?>
</div>

<p class="lead"> Shared By Friends: </p>
<div class="row text-center">
    <?php
         //for($i=0; $i < 12; $i++){
        foreach($friends as $friend){
            $id=$friend["mediaid"];
            $title = $friend["title"];
            $viewcount = $friend["viewcount"];
            $posttime = $friend["posttime"];
            $posttime = split(' ', $posttime)[0];
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
      			   <div class="img-thumbnail"> <a href="../public/audio.php?id=$id"><img src= "$path" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			   <p>$title</p>
                    <h6>viewed: $viewcount</h6>
                    <h6>uploaded at: $posttime</h6>
    		      </div> 
            </div>
_END;
        }   
    ?>
</div>




   <!--div class="row text-center"> 
    <a href="../public/allimage.php" class="btn btn-lg btn-success">View More</a>
<<<<<<< HEAD
    </div-->
            


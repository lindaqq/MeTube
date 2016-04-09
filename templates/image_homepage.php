<?php

/*
echo <<<_END

<p class="lead"> Popular Uploads: </p>
  		<div class="row text-center">
_END;

        foreach ($images as $image)
        {
            $title = $image["title"];
            $id=$image["mediaid"];
            $path;
            if($image["path"] === NULL)
                $path = "../templates/images/400X200.gif";
            else
                $path = $image["path"];
            
            echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">

      			<div class="img-thumbnail"> <a href="../public/image.php?id=$id"><img src=$path alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			<p>$title</p>
    		</div>
_END;

        }
        */

?>

<p class="lead"> Popular Uploads: </p>
<div class="row text-center">
    <?php
         for($i=0; $i < 12; $i++){
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">

      			<div class="img-thumbnail"> <a href="../public/image.php?id=1"><img src="../templates/images/400X200.gif" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			<p>image name</p>
    		</div> 
_END;
        }   
    ?>
            
</div>

<p class="lead"> Recent Uploads: </p>
<div class="row text-center">
    <?php
         for($i=0; $i < 12; $i++){
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">

      			<div class="img-thumbnail"> <a href="../public/image.php?id=1"><img src="../templates/images/400X200.gif" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			<p>image name</p>
    		</div> 
_END;
        }   
    ?>
   <div class="row text-center"> 
    <a href="../public/allimage.php" class="btn btn-lg btn-success">View More</a>
    </div>
            
</div>
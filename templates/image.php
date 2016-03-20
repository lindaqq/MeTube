<?php


echo <<<_END

<p class="lead"> Popular Uploads: </p>
  		<div class="row text-center">
_END;

        foreach ($images as $image)
        {
            $title = $image["title"];
            $path;
            if($image["path"] === NULL)
                $path = "../templates/images/400X200.gif";
            else
                $path = $image["path"];
            
            echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">

      			<div class="img-thumbnail"> <img src=$path alt="Thumbnail Image 1" class="img-responsive"></div>
      			<p>$title</p>
    		</div>
_END;
        }
?>
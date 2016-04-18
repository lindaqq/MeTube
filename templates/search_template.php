
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline" name="input" method="post" action="../public/search.php" id="filter-tables">
<input type="hidden" name="key" value="<?php echo isset($key)?$key:"" ?>">
        	<div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    		<h4 class="muted">Category</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <select name = "category" class="input-md form-control">
                                        <option value="0">all</option>
                                      <option value="1">sports</option>
                                      <option value="2">entertainment</option>
                                        <option value="3">others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
        		<div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    		<h4 class="muted">Upload Date</h4>
                                <div class="row">
                                <div class="col-sm-12">
                                    <select name = "date" class="input-md form-control">
                                        <option value="0">all upload dates</option>
                                      <option value="1">In the last 1 day</option>
                                      <option value="2">In the last 30 days</option>
                                    </select>
                                </div>
                            </div>
                    		
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    		<h4 class="muted">File Type</h4>
                                <div class="row">
                                <div class="col-sm-12">
                                    <select name = "type" class="input-md form-control">
                                        <option value="0">all</option>
                                      <option value="1">video</option>
                                      <option value="2">audio</option>
                                        <option value="3">image</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row text-center"><button type="submit" class="btn btn-default">Filter</button></div>
                
            </div>
            </form>
    </div>
</div>


<div class="row text-center">
    <?php
require("../public/enum.php");
        foreach($result as $media) {
          $title = $media['title'];
          $mediaid = $media['mediaid'];
          $path = $media['path'];
          $type = $Type[$media["type"]];
            if($media["type"] == 3){
                echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div width="300" height="auto" class = "panel panel-default" >
      			   <div class="img-thumbnail"> <a href="../public/$type.php?id=$mediaid"><img src=$path alt="Thumbnail Image 1" class="img-responsive" ></a></div>
      			<p>$title</p>
                </div>
        </div> 
_END;
            }
            
            else if($media["type"] == 2){
                echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div width="300" height="auto" class = "panel panel-default">
      			<div class="img-thumbnail"> <a href="../public/$type.php?id=$mediaid"><img src="../templates/images/audio.jpg" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			<p>$title</p>
                </div>
    		</div> 
_END;
            }
            else{
                echo <<<_END
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                    <div width="300" height="auto" class = "panel panel-default">
                        <a href="../public/$type.php?id=$mediaid">
      			       <video width="300" height="auto">
                        <source src=$path type="video/mp4">
                        Your browser does not support the video tag.
                        </video></a>
                        <p>$title</p>
                    </div>
    		</div> 
_END;
            }
            
        
               
             /////////////////// paganation??
        }   
    ?>
            
</div>
						

<h3>Word Cloud:</h3>
<div class="row text-center">
    <?php
        foreach($keywords as $keyword){
            echo <<<_END
            <div class="col-sm-2 col-md-2 col-lg-2">
                <form action="../public/search.php" method="post">
                    <input type="hidden" name="keywords" value=$keyword>
                    <button class="btn btn-primary btn-lg" type="submit">
                    $keyword</button>
                </form>
            </div>
_END;
        }
    ?>
</div>




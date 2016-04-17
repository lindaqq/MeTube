
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline" name="input" method="post" action="../public/search.php" id="filter-tables">
<input type="hidden" name="key" value="<?php echo isset($key)?$key:"" ?>"></input>
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
        foreach($result as $media) {
          $title = $media['title'];
          $mediaid = $media['mediaid'];
          $path = $media['path'];
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">

      			<div class="img-thumbnail"> <a href="../public/image.php?id=$mediaid"><img src="$path" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			<p>$title</p>
    		</div> 
_END;
             /////////////////// paganation??
        }   
    ?>
            
</div>
						<div class="widget">
							<h4 class="widget-title">WordsCloud</h4>
							<ul class="popular-tags">
            <?php
              foreach($keywords as $word) {
                        echo <<<_END
                <li><a href="#"><i class="icon-tag"></i>$word</a></li>
_END;
              }
            ?>
							</ul>
						</div>

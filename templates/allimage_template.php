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


<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline" name="input" method="get" action="#" id="filter-tables">
        	<div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    		<h4 class="muted">Persons</h4>
                            <div class="radio">
                              <label><input type="radio" name="optradio_category" checked="checked"> All Categories</label>
                            </div>
                            <p/>
                            <div class="radio">
                              <label><input type="radio" name="optradio_category"> Specific Categories</label>
                            </div>
                    		<p></p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <select name = "category" class="input-sm form-control">
                                      <option>Category 1</option>
                                      <option>Category 2</option>
                                      <option>Category 3</option>
                                      <option>Category 4</option>
                                      <option>Category 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
        		<div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    		<h4 class="muted">Date</h4>
                            <div class="radio">
                              <label><input type="radio" name="optradio_date" checked="checked" > All Upload Dates</label>
                            </div>
                            <p/>
                            <div class="radio">
                              <label><input type="radio" name="optradio_date"> Specific Upload Dates</label>
                            </div>
                    		<p></p>
                            <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="text" class="input-sm form-control" name="start_date"/>
                                <span class="input-group-addon"> - </span>
                                <input type="text" class="input-sm form-control" name="end_date"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    		<h4 class="muted">Date</h4>
                            <div class="radio">
                              <label><input type="radio" name="optradio_date" checked="checked" > All Image Sizes</label>
                            </div>
                            <p/>
                            <div class="radio">
                              <label><input type="radio" name="optradio_date"> Sizes larger than:</label>
                            </div>
                    		<p></p>
                            <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="text" class="input-sm form-control" name="start_date" placeholder="width"/>
                                <span class="input-group-addon"> X </span>
                                <input type="text" class="input-sm form-control" name="end_date" placeholder="height"/>
                                <span class="input-group-addon">px</span>
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
         for($i=0; $i < 30; $i++){
               echo <<<_END
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">

      			<div class="img-thumbnail"> <a href="../public/image.php?id=1"><img src="../templates/images/400X200.gif" alt="Thumbnail Image 1" class="img-responsive"></a></div>
      			<p>image name</p>
    		</div> 
_END;
             /////////////////// paganation??
        }   
    ?>
            
</div>

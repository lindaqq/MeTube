<div class="well">
        <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p class="lead"> Group name  </p>   
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p class="lead"> Topic name  </p>   
                </div>
        </div>
    
        <div class="row text-center">
    
            <form role="form" action="../public/topic.php" method="post">
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
            
                
                 <form action="../public/topic.php" method="post">
                    
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                       <input type="text" class="input-md form-control" name="topic" placeholder="add name of new topic " maxlength="30"/>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <!--a href="#" class="btn btn-primary btn-primary">Add</a-->
                        <button class="btn btn-primary btn-primary" type="submit">
                        Add</button>
                    </div>
                </form>
            
          
    
        <div class="row text-center">
            <?php
                //echo $errortext;
                
                for($i = 0; $i < 12; $i++){
                    echo <<<_END
                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                    <a href="../public/single_topic.php"><div class="img-thumbnail"> <img src="../templates/images/topic.png" alt="Thumbnail Image 1" class="img-responsive" width="100" height="100"></div>
      			   <p>topic $i</p></a>
    		</div>
_END;
                }  
                
            ?>
</div>  
            
          
  		    
        
                


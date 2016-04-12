<div class="well">
        <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p class="lead"> topic of Group name:  </p>   
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
            
        </div>  
    
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
            
          
  		    
        
                


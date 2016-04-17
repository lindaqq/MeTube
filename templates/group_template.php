<div class="well">
<div class="row text-center">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="list-group">
            <?php               
                foreach($groups as $group) {
                  $groupname = $group["groupname"];
                  $topic = $group["topic"];
                    echo <<<_END
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">
                           
                                $groupname
                        </h4>
                        <p class="list-group-item-text">$topic</p>
                        <br>
                        <div class="list-group-item-text">
                            <button onclick="document.location.href = '../public/topic.php'" class="btn btn-primary btn-primary" type="button">Join</button>
                        </div>
                    </a>
_END;
                }  
                
            ?>
                    </div>
    </div>
    
    <div class="col-sm-6 col-md-6 col-lg-6">
        <p>Create a new group:</p>
        <form class="form-signin" action="../public/group.php" method="post">
                <input type="text" class="form-control" name="groupname" placeholder="group name" maxlength="30" required autofocus>
                <br>
                <input type="text" class="form-control" name="topic" placeholder="topic" maxlength="30" required>
                   
                    <br><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Create</button>
                
                </form>
    </div>

</div>
</div>

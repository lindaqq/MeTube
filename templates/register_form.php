<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Register to continue to MeTube</h1>
            <div class="account-wall">
                <img class="profile-img" src="../templates/images/account.png"
                    alt="" width = "150" height="150">
                <form class="form-signin" action="../public/register.php" method="post">
                <input type="text" class="form-control" name="username" placeholder="Username" maxlength="10" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" maxlength="10" required>
                <input type="password" class="form-control" name="password1" placeholder="Repeat Password" maxlength="10" required>
                <textarea  class="form-control" name="detail" rows="4" cols="50" placeholder="about me"></textarea>
                
                    <br><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Register</button>
                
                </form>
                <?php
                    echo $errortext;
                ?>
            </div>
            
        </div>
    </div>
</div>

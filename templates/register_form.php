<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Register to continue to MeTube</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" action="../public/register.php" method="post">
                <input type="text" class="form-control" name="username" placeholder="Email or Username" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <input type="password" class="form-control" name="password1" placeholder="Repeat Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Register</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
                <?php
                    echo $errortext;
                ?>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>

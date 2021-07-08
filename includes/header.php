<nav class="navbar navbar-inverse navbar-fixed-top col-xs-12">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="color: white;">CONT₹OL</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['email_id'])) { ?>
                <li><a href="about-us.php"><span class="glyphicon glyphicon-exclamation-sign"></span> About us </a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
                <li><a href="scripts/logout-script"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
            <?php } else { ?>
                <li><a href="about-us.php"><span class="glyphicon glyphicon-exclamation-sign"></span> About us </a></li>
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign up </a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log in </a></li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>
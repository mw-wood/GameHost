<!-- Navbar -->

<nav class="nav">
    <a href="index.php" class="center-vertical"><img alt="logo" src="Assets/favicon.png" width="64px" height="64px" style="float: left; margin-right: 5px"></a>
    <section id="search-container" class="search-container center-vertical">
        <form method="POST" action="">
            <input id="search-bar" class="search-bar" type="text" placeholder="Search">
            <div id="search-icon-container" class="search-icon-container no-select"> 
                <i class="material-icons search-icon">search</i>
            </div>
        </form>
    </section>

    <div id="account-icon-container" class="account-icon-container center-vertical no-select"> 
        <i class="material-icons account-icon">person</i>
    </div>

    <?php 
        if(isset($_SESSION["user"])) { ?>
            <div id="username" class="username center-vertical">
                <p class="center-vertical"> <?php echo $_SESSION["user"] ?> </p>
            </div> 
        <?php 
        }
        else { ?>
            <a href="auth.php">
                <div id="login" class="login center-vertical">
                        Log in 
                </div> 
            </a>
        <?php 
        }
    ?>
</nav>
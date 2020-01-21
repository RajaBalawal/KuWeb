<?php
if(isset($_REQUEST['logout'])){
    session_destroy();
    header("Location:".WEBSITE_URL);
}
?>
<header>
    <div class="logo">
        <?php
        if(isset($_SESSION['Login'])){
        ?>
            <div class="pull-right">
                <a href="?logout" class="btn btn-danger">Logout</a>
            </div>
        <?php
        }
        ?>
        <h1> KU TALENT</h1>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="job.php">JOBS</a></li>
                <li><a href="s-login.php">STUDENT'S ZONE</a></li>
                <li><a href="e-login.php">EMPLOYER'S ZONE</a></li>
                <li><a href="http://kunet.kingston.ac.uk/k1426446/ku-admin/index.php">KU ADMIN</a></li>
            </ul>
        </div>
    </nav>

</header>
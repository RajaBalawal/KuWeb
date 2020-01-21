<?php
require_once "../class/functions.php";
$obj = new Functions();
if(isset($_POST['login'])){
    $query = $obj->Mysqli->query("SELECT * FROM users WHERE email = '".$_POST['email']."' AND Password = '".$obj->Encrypt($_POST['password'])."' AND user_type='1'");
    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_assoc($query);
        if($data['active']==1) {
            $_SESSION['Login'] = true;
            $_SESSION['User'] = $data;
            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'success',
                'msg' => 'Welcome Admin'
            );
            header("Location:dashboard.php");
        } else {
            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'error',
                'msg' => 'Sorry! Your account has been disabled'
            );
        }
    } else {
        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'error',
            'msg' => 'Invalid email or password'
        );
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KU Talent Staff Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css?v=<?php echo date('is');?>" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
</head>

<body>

<div class="container">

    <form class="form-signin" method="post">
        <h2 class="form-signin-heading text-center">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
    </form>

</div>
<?php include "messages.php";?>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js" type="text/javascript"></script>
</body>
</html>

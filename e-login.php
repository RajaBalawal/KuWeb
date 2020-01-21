<?php require_once "class/functions.php";
$obj = new Functions();
if(isset($_SESSION['Login'])){
    header("Location:e-dashboard.php");
}
if(isset($_POST['e_login'])){
    $stu = $obj->Mysqli->query("SELECT * FROM users WHERE email = '".$_POST['e_email']."'  AND password = '".$obj->Encrypt($_POST['e_password'])."' AND user_type = '3' AND active = '1'  ");
    if(mysqli_num_rows($stu) > 0){
        $user = mysqli_fetch_assoc($stu);
        $expiry = $user['expiry'];

        if($expiry <= date('Y-m-d H:i:s')){
            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'error',
                'msg' => 'Your login details has been expired.'
            );
        } else {
            $_SESSION['Login'] = true;
            $_SESSION['User'] = $user;
            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'success',
                'msg' => 'Successfully Logged In'
            );
            header("Location:e-dashboard.php");
        }
    } else {
        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'error',
            'msg' => 'Invalid login or password'
        );
        header("Location:e-login.php");
    }
}



?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo COMPANY_NAME?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ku-admin/css/style.css" rel="stylesheet">
    <script src="ku-admin/js/jquery-3.2.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <?php include "header.php";?>

    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">Employer Login</h2>
                    <form action="" name="s_login_form" method="post" class="form-horizontal">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="e_email">Email</label>
                                <input type="email" name="e_email" id="e_email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="e_password">Password</label>
                                <input type="password" name="e_password" id="e_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="e_login">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"?>

</body>
</html>

<?php require_once "class/functions.php";
$obj = new Functions();

if(isset($_SESSION['Login'])){
    header("Location:s-dashboard.php");
}

if(isset($_POST['s_register'])){
    $already = $obj->Mysqli->query('SELECT * FROM users WHERE email = "'.$_POST['email'].'"  ');
    if(mysqli_num_rows($already) > 0){
        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'error',
            'msg' => 'Email already Exists'
        );
    } else {
        $obj->Mysqli->query("INSERT INTO users SET email = '".$_POST['email']."', password = '".$obj->Encrypt($_POST['password'])."', user_type = '2', active = '1' ");
        $obj->Mysqli->query("INSERT INTO students SET user_id = '".$obj->Mysqli->insert_id."', student_name = '".$_POST['name']."', father_name = '".$_POST['f_name']."', contact = '".$_POST['contact']."', address = '".$_POST['address']."' ");
        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'success',
            'msg' => 'Registered Successfully, You can Login now.'
        );
    }
}

if(isset($_POST['s_login'])){
    $stu = $obj->Mysqli->query("SELECT u.*, s.* FROM users u LEFT OUTER JOIN students s ON u.id = s.user_id WHERE u.email = '".$_POST['s_email']."'  AND u.password = '".$obj->Encrypt($_POST['s_password'])."' AND user_type = '2' AND u.active = '1'  ");
    if(mysqli_num_rows($stu) > 0){
        $user = mysqli_fetch_assoc($stu);

        $_SESSION['Login'] = true;
        $_SESSION['User'] = $user;

        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'success',
            'msg' => 'Successfully Logged In'
        );
        header("Location:s-dashboard.php");
    } else {
        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'error',
            'msg' => 'Invalid login or password'
        );
        header("Location:s-login.php");
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
                <div class="col-md-6">
                    <h2 class="text-center">Student Login</h2>
                    <form action="" name="s_login_form" method="post" class="form-horizontal">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="s_email">Email</label>
                                <input type="email" name="s_email" id="s_email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="s_password">Password</label>
                                <input type="password" name="s_password" id="s_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="s_login">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <h2 class="text-center">Student Register</h2>
                    <form action="" name="s-registration-form" method="post" class="form-horizontal">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="tel" name="contact" id="contact" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="f_name">Father Name</label>
                                <input type="text" name="f_name" id="f_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="s_register">Register</button>
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

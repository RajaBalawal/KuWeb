<?php require_once "class/functions.php";
$obj = new Functions();
$obj->RequireLogin();

if(isset($_POST['upload'])){
    $allowedExts = array("doc", "docx", "pdf");
    $temp = explode(".", $_FILES["cv"]["name"]);
    $extension = end($temp);
    if ( ($_FILES["cv"]["size"] < 20000000) && in_array($extension, $allowedExts))
    {
        if ($_FILES["cv"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["cv"]["error"] . "<br>";
        }
        else
        {
            $file_name = date('ymdHis')."_".$_FILES["cv"]["name"];
            move_uploaded_file($_FILES["cv"]["tmp_name"], UPLOADS_PATH.$file_name);

            $obj->Mysqli->query("INSERT INTO cv_uploaded SET student_id = '".$_SESSION['User']['user_id']."', role_category_id = '".$_POST['category']."', file = '".$file_name."', upload_datetime = '".date('Y-m-d H:i:s')."'  ");

            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'success',
                'msg' => 'Your CV uploaded successfully.'
            );
            header("Location:s-dashboard.php");

        }
    }
    else
    {
        echo "Invalid file";
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
                <h2 class="text-center">Upload CV</h2>
                <form action="" name="s-login-form" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="s-category">Role Category</label>
                            <select name="category" class="form-control" required>
                                <?php
                                $roles = $obj->Mysqli->query("SELECT * FROM role_categories");
                                while($role = $roles->fetch_array()){
                                    echo '<option value="'.$role['id'].'">'.$role['category_name'].'</div>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="s-password">Upload CV</label>
                            <input type="file" name="cv" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" name="upload">Submit</button>
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

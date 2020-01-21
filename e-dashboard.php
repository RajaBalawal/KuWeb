<?php require_once "class/functions.php";
$obj = new Functions();
$obj->RequireLogin();
$q1 = array();
if(isset($_POST['search'])){
    $q1 = $obj->Mysqli->query("SELECT cu.*, s.student_name FROM cv_uploaded cu LEFT OUTER JOIN students s ON cu.student_id = s.user_id WHERE cu.role_category_id = '".$_POST['category']."' ");
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
        <div class="col-md-12">
            <h2>Employee Dashboard</h2>
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px">
                    <form class="form-inline" method="post" action="">
                        <div class="form-group" style="margin-right: 10px">
                            <label>Role Category</label>
                            <select name="category" class="form-control" required>
                                <?php
                                $roles = $obj->Mysqli->query("SELECT * FROM role_categories");
                                while($role = $roles->fetch_array()){
                                    echo '<option value="'.$role['id'].'">'.$role['category_name'].'</div>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="search" class="btn btn-success">Search</button>
                    </form>
                </div>
            </div>

            <br>

            <?php
            if(!empty($q1) && mysqli_num_rows($q1)>0){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Download CV</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($r1 = $q1->fetch_array()){
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?>.</td>
                                            <td><?php echo $r1['student_name'];?></td>
                                            <td><a href="<?php echo UPLOADS_URL.$r1['file'];?>"><?php echo $r1['file'];?></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                if(isset($_POST['search'])){
                    echo '<div class="alert alert-danger">No CV Found in selected Role Category</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include "footer.php"?>
</body>
</html>

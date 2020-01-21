<?php require_once "class/functions.php";
$obj = new Functions();
$obj->RequireLogin();
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
                <h2><?php echo ucfirst($_SESSION['User']['student_name']);?></h2>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <?php
                        $i = 1;
                        $q1 = $obj->Mysqli->query("SELECT * FROM cv_uploaded WHERE student_id = '".$_SESSION['User']['user_id']."' ");
                        if(mysqli_num_rows($q1) > 0){
                            while($r1 = $q1->fetch_array()){
                                ?>
                                <tr>
                                    <td colspan="2"><h3><?php echo $i++?>.</h3></td>
                                </tr>
                                <?php
                                if($r1['status']=='P'){
                                    ?>
                                    <tr>
                                        <td><b>Uploaded Date:</b></td>
                                        <td><?php echo $r1['upload_datetime'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status:</b></td>
                                        <td>Pending</td>
                                    </tr>
                                    <?php
                                }
                                if($r1['status']=='I'){
                                    ?>
                                    <tr>
                                        <td><b>Uploaded Date:</b></td>
                                        <td><?php echo $r1['upload_datetime'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status:</b></td>
                                        <td>Incomplete</td>
                                    </tr>
                                    <tr>
                                        <td><b>Feedback</b></td>
                                        <td><?php echo $r1['feedback'];?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><a href="upload-cv.php" class="btn btn-success">Upload Again</a></td>
                                    </tr>
                                    <?php
                                }
                                if($r1['status']=='C'){
                                    ?>
                                    <tr>
                                        <td><b>Uploaded Date:</b></td>
                                        <td><?php echo $r1['upload_datetime'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status:</b></td>
                                        <td>Completed</td>
                                    </tr>
                                    <?php
                                    if($r1['feedback']!=''){
                                        ?>
                                        <tr>
                                            <td><b>Feedback</b></td>
                                            <td><?php echo $r1['feedback'];?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><a href="?act=shareyes&id=<?php echo $r1['id']?>" class="btn btn-info">Share Permission</a> </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo '<a href="upload-cv.php" class="btn btn-success btn-lg">Upload CV</a>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <img src="images/StudentEmployment.jpg">
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>

</body>
</html>

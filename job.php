<?php require_once "class/functions.php";
$obj = new Functions();
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
                <h2>Jobs</h2>
                <ul>
                    <li><h4>Engineer</h4></li>
                    <li><h4>Reporter</h4></li>
                    <li><h4>Mechanic</h4></li>
                    <li><h4>Artists</h4></li>
                    <li><h4>Airport Security</h4></li>
                    <li><h4>Analyst</h4></li>
                    <li><h4>Developer</h4></li>
                    <li><h4>Tester</h4></li>
                </ul>

            </div>
            <div class="col-md-6">
                <img src="images/jobs-list.jpg">
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>

</body>
</html>

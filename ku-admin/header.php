<?php
if(isset($_REQUEST['logout'])){
    session_destroy();
    header("Location:".ADMIN_URL);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css?v=<?php echo date('is');?>" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>

</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <a class="navbar-brand" href="#">KU-Talent</a>
    <a href="?logout" class="pull-right btn btn-danger" style="margin: 7px 10px 0 0 ;">Logout</a>
</nav>

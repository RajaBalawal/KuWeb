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
    <section>
        <img src="images/page.jpg" alt="" width="100%" height="80%"/>
    </section>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <p><img src="images/bkg_06.png" alt="" style="width: 100%"/></p>
                <h4>Resume Writing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
            <div class="col-sm-3">
                <p><img src="images/bkg_07.png" alt="" style="width: 100%"/></p>
                <h4>Recruiter Reach</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
            <div class="col-sm-3">
                <p><img src="images/bkg_08.png" alt="" style="width: 100%"/></p>
                <h4>Courses / Certifications</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
            <div class="col-sm-3">
                <p><img src="images/resume.png" alt="" style="width: 100%"/></p>
                <h4>Resume Evaluation</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
        </div>
    </div>

    <br>

    <section>
        <div class="row">
            <h2 class="section-title"> TOP MOST COMPANIES 2017</h2>
            <div class="col-md-12">
                <img src="images/Top_companies.jpg" alt="" style="width: 100%;max-height: 300px" class="img-responsive" />
            </div>
        </div>
    </section>

    <br>

    <section>
        <div class="row">
            <h2 class="section-title"> TOP MOST TRENDING TECHNOLOGIES</h2>
            <div class="col-md-12">
                <img src="images/reflectiv_logos_references.jpg" alt="" style="width: 100%;max-height: 300px" class="img-responsive"/>
            </div>
        </div>
    </section>

    <br>

    <section>
        <h2 class="section-title"> WHO WE ARE ?</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-9">
                    <p>Students regularly submit to the KU talent team their CVs to be checked. KU Talent staff check the CVs and provide feedback to the students; but there is no formal space where completed CVs are held.</p>
                    <p>KU Talent are regularly approached by employers, often smaller companies with a specialised requirement, who would like to quickly view a number of CVs and then select and approach students who meet their requirements.</p>
                    <p>Students regularly submit to the KU talent team their CVs to be checked. KU Talent staff check the CVs and provide feedback to the students; but there is no formal space where completed CVs are held.</p>
                    <p>KU Talent are regularly approached by employers, often smaller companies with a specialised requirement, who would like to quickly view a number of CVs and then select and approach students who meet their requirements.</p>
                </div>
                <div class="col-md-3">
                    <img src="images/resume-CV.png" alt="" class="img-responsive"/>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"?>

</body>
</html>

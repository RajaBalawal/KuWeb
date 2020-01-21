<?php require_once "../class/functions.php";
$obj = new Functions();
$obj->RequireAdminLogin();

if(isset($_POST['update'])){
    $obj->Mysqli->query("UPDATE cv_uploaded SET status = '".$_POST['cv_status']."', feedback = '".$_POST['feedback']."'  ");
}

include ('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 nav-menu">
            <ul class="nav ">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Latest CV's <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="role-categories.php">Add Role Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="completed-list.php">Completed List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create-employer-login.php">Create Employer Login</a>
                </li>
            </ul>
        </nav>

        <main class="col-sm-10">

            <h1>Latest CV's</h1>
            <div class="table-responsive">
                <?php
                $q1 = $obj->Mysqli->query("SELECT cu.*, rc.category_name, s.student_name, s.contact FROM cv_uploaded cu LEFT OUTER JOIN role_categories rc ON cu.role_category_id = rc.id LEFT OUTER JOIN students s ON cu.student_id = s.user_id WHERE cu.status IN ('P','I') ");
                if(mysqli_num_rows($q1)>0){
                ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th width="8%">Category</th>
                            <th width="10%">Student Name</th>
                            <th width="5%">Contact</th>
                            <th width="10%">CV</th>
                            <th width="10%">Status</th>
                            <th width="15%">Feedback</th>
                            <th width="5%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        while ($r1 = $q1->fetch_array()){
                        ?>
                            <tr>
                                <td><?php echo $i++;?>.</td>
                                <td><?php echo $r1['category_name'];?></td>
                                <td><?php echo $r1['student_name'];?></td>
                                <td><?php echo $r1['contact'];?></td>
                                <td style="word-break: break-all;"><a href="<?php echo UPLOADS_URL.$r1['file'];?>"><?php echo $r1['file'];?></a></td>
                                <form class="form-horizontal" method="post" action="">
                                    <td>
                                        <div class="form-group">
                                            <label><input type="radio" name="cv_status" value="C" <?php echo ($r1['status']=='C') ? 'checked' : '' ;?> required > Completed</label><br>
                                            <label><input type="radio" name="cv_status" value="I" <?php echo ($r1['status']=='I') ? 'checked' : '' ;?>> In completed</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" name="feedback" rows="3" cols="4"><?php echo $r1['feedback']?></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="cv_id" value="<?php echo $r1['id'];?>">
                                        <button type="submit" name="update" class="btn btn-success">Update</button>
                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo '<div class="alert alert-danger">No Record Found</div>';
                }
                ?>
            </div>
        </main>
    </div>
</div>
<?php include "messages.php";?>
<?php
include ('footer.php');
?>

<?php require_once "../class/functions.php";
$obj = new Functions();
$obj->RequireAdminLogin();

$btn_name = 'add';
$btn_text = 'Add';
$btn_class = 'success';
$e_email = $e_password = $expiry = $user_id = '';

if(isset($_POST['add'])){
    if($_POST['expiry']<=date('Y-m-d H:i')){
        $_SESSION['Message'] = true;
        $_SESSION['Message'] = array(
            'type' => 'error',
            'msg' => 'Invalid Expiry Date.'
        );
    } else {
        $already = $obj->Mysqli->query('SELECT * FROM users WHERE email = "'.$_POST['e_email'].'"  ');
        if(mysqli_num_rows($already) > 0){
            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'error',
                'msg' => 'Email already Exists.'
            );
        } else {
            $obj->Mysqli->query("INSERT INTO users SET email = '".$_POST['e_email']."', password = '".$obj->Encrypt($_POST['e_password'])."', user_type = '3', expiry = '".$_POST['expiry']."', active = '1' ");
            $_SESSION['Message'] = true;
            $_SESSION['Message'] = array(
                'type' => 'success',
                'msg' => 'Registered Successfully.'
            );
            header("Location:create-employer-login.php");
        }
    }
}

if(isset($_REQUEST['act']) && $_REQUEST['act']=='update'){
    $btn_name = 'update';
    $btn_text = 'Update';
    $btn_class = 'warning';
    $data = $obj->Mysqli->query("SELECT * FROM users WHERE id = '".$_REQUEST['id']."' ");
    $data = mysqli_fetch_assoc($data);
    $e_email = $data['email'];
    $e_password = $obj->Decrypt($data['password']);
    $expiry = $data['expiry'];
    $user_id = $data['id'];
}

if(isset($_REQUEST['act']) && $_REQUEST['act']=='delete'){
    $obj->Mysqli->query("DELETE FROM users WHERE id = '".$_REQUEST['id']."' ");
    $_SESSION['Message'] = true;
    $_SESSION['Message'] = array(
        'type' => 'error',
        'msg' => 'Deleted.'
    );
    header("Location:create-employer-login.php");
}

if(isset($_POST['update'])){
    $obj->Mysqli->query("UPDATE users SET email = '".$_POST['e_email']."', password = '".$obj->Encrypt($_POST['e_password'])."', expiry = '".$_POST['expiry']."' WHERE id = '".$_POST['user_id']."'  ");
    $_SESSION['Message'] = true;
    $_SESSION['Message'] = array(
        'type' => 'success',
        'msg' => 'Updated Successfully.'
    );
    header("Location:create-employer-login.php");
}

include ('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 nav-menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Latest CVs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="role-categories.php">Add Role Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="completed-list.php">Completed List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="create-employer-login.php">Create Employer Login</a>
                </li>
            </ul>
        </nav>

        <main class="col-sm-10">

            <h1>Employer Login</h1>
            <form class="form-inline" method="post" action="">
                <div class="form-group" style="margin-right: 10px">
                    <label>Email</label>
                    <input type="email" class="form-control" name="e_email" value="<?php echo (isset($_POST['e_email'])) ? $_POST['e_email'] : $e_email ;?>" required>
                </div>
                <div class="form-group" style="margin-right: 10px">
                    <label>Password</label>
                    <input type="text" class="form-control" name="e_password" value="<?php echo (isset($_POST['e_password'])) ? $_POST['e_password'] : $e_password ;?>" required>
                </div>
                <div class="form-group" style="margin-right: 10px">
                    <label>Expiry Date/Time</label>
                    <input type="datetime" class="form-control" name="expiry" id="datetimepicker" value="<?php echo (isset($_POST['expiry'])) ? $_POST['expiry'] : $expiry ;?>" required>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                <button type="submit" name="<?php echo $btn_name?>" class="btn btn-<?php echo $btn_class?>"><?php echo $btn_text?></button>
            </form>
            <hr>
            <?php if(!isset($_REQUEST['act'])){ ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Expiry</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $q1 = $obj->Mysqli->query("SELECT * FROM users WHERE user_type = '3' ");
                    while ($r1 = $q1->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $i++;?>.</td>
                            <td><?php echo $r1['email']?></td>
                            <td><?php echo $r1['expiry']?></td>
                            <td>
                                <a href="?act=update&id=<?php echo $r1['id']?>" class="btn btn-warning">Update</a>
                                <a href="?act=delete&id=<?php echo $r1['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </main>
    </div>
</div>
<?php include "messages.php";?>
<?php
include ('footer.php');
?>

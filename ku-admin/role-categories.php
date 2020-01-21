<?php require_once "../class/functions.php";
$obj = new Functions();
$obj->RequireAdminLogin();

$cat_name = $cat_id = '';
$btn_value = 'Add';
$btn_class = 'success';
$btn_name = 'add';

if(isset($_REQUEST['act']) && $_REQUEST['act']=='update'){
    $cat_name = $obj->Mysqli->query("SELECT category_name FROM role_categories WHERE id = '".$_REQUEST['id']."' ");
    $cat_name = mysqli_fetch_assoc($cat_name);
    $cat_name = $cat_name['category_name'];
    $cat_id = $_REQUEST['id'];
    $btn_value = 'Update';
    $btn_class = 'warning';
    $btn_name = 'update';
}

if(isset($_REQUEST['act']) && $_REQUEST['act']=='delete'){
    $obj->Mysqli->query("DELETE FROM role_categories WHERE id = '".$_REQUEST['id']."' ");
    header("Location:role-categories.php");
}

if(isset($_POST['add'])){
    $obj->Mysqli->query("INSERT INTO role_categories SET category_name = '".$_POST['category_name']."' ");
    header("Location:role-categories.php");
}

if(isset($_POST['update'])){
    $obj->Mysqli->query("UPDATE role_categories SET category_name = '".$_POST['category_name']."' WHERE id = '".$_POST['cat_id']."'  ");
    header("Location:role-categories.php");
}

include ('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 nav-menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Latest CV's <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="role-categories.php">Add Role Categories</a>
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

            <h1>Role Categories</h1>
            <form class="form-inline" method="post" action="">
                <div class="form-group" style="margin-right: 10px">
                    <label>Role Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="<?php echo $cat_name;?>" >
                </div>
                <input type="hidden" name="cat_id" value="<?php echo $cat_id;?>">
                <button type="submit" name="<?php echo $btn_name?>" class="btn btn-<?php echo $btn_class?>"><?php echo $btn_value?></button>
                <?php
                if(isset($_REQUEST['act']) && $_REQUEST['act']=='update'){
                    echo '<a href="role-categories.php" class="btn btn-danger" >Cancel</a>';
                }
                ?>
            </form>
            <?php if(!isset($_REQUEST['act'])){?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $q1 = $obj->Mysqli->query("SELECT * FROM role_categories");
                    while($r1 = $q1->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $i++;?>.</td>
                            <td><?php echo $r1['category_name']?></td>
                            <td>
                                <a href="?act=update&id=<?php echo $r1['id'];?>" class="btn btn-warning">Update</a>
                                <a href="?act=delete&id=<?php echo $r1['id'];?>" class="btn btn-danger">Delete</a>
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

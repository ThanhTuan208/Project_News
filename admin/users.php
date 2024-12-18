<?php
include "header.php";
include "sidebar.php";
?>

<style>
    tr,
    td {
        vertical-align: middle;
        text-align: center;
    }
</style>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h1>Manage User</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $getAllAccount = $account->getAllAccount();
                            foreach ($getAllAccount as $key => $value): ?>
                                <tbody>
                                    <tr class="">
                                        <td><?php echo $value['tendangnhap'] ?></td>
                                        <td><?php echo $value['matkhau'] ?></td>
                                        <td><?php echo $value['ngaydangki'] ?></td>
                                        <td>
                                            <a href="updateUser.php?id=<?php echo $value['id']; ?>"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a href="delete.php?user_id=<?php echo $value['id']; ?>"
                                                class="btn btn-danger btn-sm">Delete</a>

                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                        <div class="row" style="margin-left: 18px;">
                            <ul class="pagination">
                                <li class="active">1</li>
                                <li>2</li>
                                <li>3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>
<?php
include "header.php";
include "sidebar.php";
?>
<style>
    th,
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
        <h1>Manage Categories</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="addCate.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $getAllCate = $categories->getAllCate();
                            foreach ($getAllCate as $key => $value):
                                ?>
                                <tbody>
                                    <tr class="">
                                        <td width="100"><img src="<?php echo $value['image'] ?>"></td>
                                        <td><?php echo $value['name'] ?></td>

                                        <td>
                                            <a href="updateCate.php?cate_id=<?php echo $value["id"] ?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="delete.php?cate_id=<?php echo $value['id'] ?>" class="btn
                                                    btn-danger btn-mini">Delete</a>
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
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>
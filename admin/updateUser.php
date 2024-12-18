<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Add New Items</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="updateItem.php" method="post" class="form-horizontal"
                            enctype="multipart/form-data">
                            <?php
                            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
                            $getAccountByID = $account->getAccountByID($id);
                            foreach ($getAccountByID as $key => $value):
                                ?>
                                <div class="control-group">
                                    <label class="control-label">Password: </label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="pass"
                                            value="<?php echo $value["matkhau"] ?>" /> *
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                            <?php endforeach ?>
                            <div class="form-actions">
                                <button type="submit" href="updateItem.php?id=<?php echo $id ?>" name="update"
                                    value="pass" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>
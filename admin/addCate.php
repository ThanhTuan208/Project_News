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
                    <div class="widget-content padding">
                        <!-- BEGIN FORM -->
                        <form action="addItem.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Choose
                                    an image</label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Cate name:
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Slug:
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="slug" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Parent:
                                </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="parent" /> *
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" href="addItem.php" name="add" value="cate"
                                    class="btn btn-success">Add</button>
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
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
                            $id = $_GET['cate_id'];
                            $getCateByID = $categories->getCateById($id);
                            foreach ($getCateByID as $key => $value): ?>

                                <div class="control-group">
                                    <label class="control-label">Choose a Cate</label>
                                    <div class="controls">
                                        <select name="cate" id="cate">
                                            <?php
                                            $getAllCate = $categories->getAllCate();
                                            foreach ($getAllCate as $key => $cate):
                                                $selected = ($cate['id'] == $value['category']) ? 'selected' : '';
                                                ?>
                                                <option value="<?php echo $cate['name']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $cate['name']; ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Slug: </label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="slug"
                                            value="<?php echo $value["slug"] ?>" /> *
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">


                                <div class="control-group">
                                    <label class="control-label">Choose
                                        an image</label>

                                    <div class="controls">
                                        <input type="file" name="fileUpload" id="fileUpload">
                                        <br>
                                        <img src="<?php echo $value["image"]; ?>" alt="Current Image"
                                            style="max-width: 250px">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Parent:
                                    </label>
                                    <div class="controls">
                                        <input type="number" class="span11" name="parent"
                                            value="<?php echo $value["parent"] ?>" /> *
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" href="updateItem.php?cate_id=<?php echo $id ?>" name="update"
                                        value="cate" class="btn btn-success">Update</button>
                                </div>
                            <?php endforeach ?>
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
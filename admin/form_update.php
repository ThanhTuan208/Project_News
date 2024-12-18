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
                        <?php
                        $id = $_GET['id'];
                        $getAllByIdItems = $item->getAllByIdItems($id);
                        foreach ($getAllByIdItems as $key => $value): ?>
                            <form action="updateItem.php" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="title"
                                            value="<?php echo $value["title"] ?>" /> *
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">

                                <div class="control-group">
                                    <label class="control-label">Excerpt</label>
                                    <div class="controls">
                                        <textarea class="span11" name="excerpt"><?php echo $value["excerpt"] ?></textarea>

                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Content</label>
                                    <div class="controls">
                                        <textarea class="span11" name="content"><?php echo $value["content"] ?></textarea>
                                    </div>
                                </div>
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
                                    <label class="control-label">Choose a
                                        category</label>
                                    <div class="controls">
                                        <select name="cate" id="cate">
                                            <?php
                                            $getAllCate = $categories->getAllCate();
                                            foreach ($getAllCate as $key => $cate):
                                                $selected = ($cate['id'] == $value['category']) ? 'selected' : '';
                                                ?>
                                                <option value="<?php echo $cate['id']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $cate['name']; ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Featured
                                    </label>

                                    <div class="controls">
                                        <select name="featured" id="featured">
                                            <option value="0" <?php echo ($value["featured"] === 0) ? "selected" : ""; ?>>
                                                No</option>
                                            <option value="1" <?php echo ($value["featured"] === 1) ? "selected" : ""; ?>>
                                                Yes</option>
                                        </select> *

                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">View
                                    </label>
                                    <div class="controls">
                                        <input type="number" class="span11" name="view"
                                            value="<?php echo $value["views"] ?>" /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Author</label>
                                    <div class="controls">
                                        <select name="author" id="cate">
                                            <?php
                                            $getAllUsers = $user->getAllUsers();
                                            foreach ($getAllUsers as $key => $user):
                                                $selected = ($user["id"] == $value["author"]) ? "selected" : "";
                                                ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo $selected ?>>
                                                    <?php echo $user["name"] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select> *
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" href="updateItem.php?id=<?php echo $id ?>" name="update"
                                        value="item" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        <?php endforeach ?>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>
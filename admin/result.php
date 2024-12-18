<?php
include "header.php";
include "sidebar.php";

$perPage = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $perPage;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "All";
$total = count($item->TotalCate($keyword));
$url = $_SERVER['PHP_SELF'] . '?keyword=' . $keyword;
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h6>Result: found <?php echo $total ?> item(s) with keyword: "<?php echo $keyword ?>"</h6>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Items</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Excerpt</th>
                                    <th>Category</th>
                                    <th>Feature</th>
                                    <th>View</th>
                                    <th>Author</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $search = $item->search($keyword, $start, $perPage);
                            foreach ($search as $key => $value):
                                $dateFormat = date('M, d, Y', strtotime($value['created_at']));
                                ?>
                                <tbody>
                                    <tr class="">
                                        <td width="250">
                                            <img src="..anh/<?php echo $value['image'] ?>" />
                                        </td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['excerpt'] ?></td>
                                        <td><?php echo $value['nameCate'] ?></td>
                                        <td><?php echo $value['featured'] ?></td>
                                        <td><?php echo $value['views'] ?></td>
                                        <td><?php echo $value['nameUser'] ?></td>
                                        <td><?php echo $dateFormat ?></td>
                                        <td>
                                            <a href="#45" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="#45" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="row" style="margin-left: 18px;">
                            <div class="col-lg-12">
                                <ul class="pagination">
                                    <?php echo $item->pageInt($url, $total, $perPage, $page); ?>
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
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>
<?php include "footer.php" ?>
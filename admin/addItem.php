<?php
include "connect.php";
include "model/database.php";
include "model/item.php";
include "model/category.php";
include "model/users.php";
include "model/account.php";

$item = new Item();
$category = new Category();
$account = new Account();

$add = isset($_POST["add"]) ? $_POST["add"] : "";
if ($add == "item") {
    $title = $_POST['title'];
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $image = $_FILES['fileUpload']['name'];
    $category = $_POST['cate'];
    $featured = $_POST['featured'];
    $view = $_POST['view'];
    $author = $_POST['author'];

    if ($item->Add($title, $excerpt, $content, $image, $category, $featured, $view, $author)) {

        $target = "../anh/";
        $target_file = $target . basename($_FILES["fileUpload"]["name"]);
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        header("location:items.php");
    }
} else if ($add == "cate") {
    $image = $_FILES['fileUpload']['name'];
    $cate = $_POST['name'];
    $slug = $_POST['slug'];
    $parent = $_POST['parent'];

    if ($category->AddToCate($cate, $slug, $parent, $image)) {
        $target = "../anh/";
        $target_file = $target . basename($_FILES["fileUpload"]["name"]);
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        header("location:categories.php");
    }
}


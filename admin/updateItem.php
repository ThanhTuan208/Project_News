<?php
include "connect.php";
include "model/database.php";
include "model/item.php";
include "model/category.php";
include "model/users.php";
include "model/account.php";
$item = new Item();
$cate = new Category();
$account = new Account();

$update = isset($_POST["update"]) ? $_POST["update"] : "";
if ($update == "item") {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $image = $_FILES['fileUpload']['name'];
    $category = $_POST['cate'];
    $featured = $_POST['featured'];
    $view = $_POST['view'];
    $author = $_POST['author'];

    if (!empty($_FILES["fileUpload"]["name"])) {
        $target = "../anh/";
        $image = $_FILES['fileUpload']["name"];
        $target_file = $target . basename($image);
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);

        if ($item->Update($id, $title, $excerpt, $content, $image, $category, $featured, $view, $author)) {
            header("location:items.php");
        } else {
            header("location:form_update.php?id=$id");
        }
    } else
        header("location:items.php");
} else if ($update == "pass") {
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    if ($account->updatePass($id, $pass)) {
        header("location:users.php");
    } else {
        header("location:updateUsers.php?id=$id");
    }
} else if ($update == "cate") {
    $id = $_POST['id'];
    $name = $_POST['cate'];
    $slug = $_POST['slug'];
    $parent = $_POST['parent'];
    $image = $_FILES['fileUpload']['name'];

    if (!empty($_FILES["fileUpload"]["name"])) {
        $target = "../anh/";
        $image = $_FILES['fileUpload']["name"];
        $target_file = $target . basename($image);
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);

        if ($cate->UpdateCate($id, $name, $slug, $parent, $image)) {
            header("location:categories.php");
        } else {
            header("location:updateCate.php?cate_id=$id");
        }
    } else
        header("location:items.php");
}




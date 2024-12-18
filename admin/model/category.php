<?php
class Category extends Database
{
    public function getAllCate()
    {
        $sql = self::$con->prepare('SELECT * FROM categories');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getCateById($id)
    {
        $sql = self::$con->prepare('SELECT * FROM categories WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function AddToCate($name, $slug, $parent, $image)
    {
        $sql = self::$con->prepare('INSERT INTO `categories`(`name`, `slug`, `parent`, `image`)
        VALUES (?,?,?,?)');
        $sql->bind_param('ssis', $name, $slug, $parent, $image);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function Delete($id)
    {
        $sql = self::$con->prepare('DELETE FROM `categories` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function UpdateCate($id, $name, $slug, $parent, $image)
    {
        $sql = self::$con->prepare('UPDATE `categories` SET `name`=?,`slug`=?, `parent`=?, `image` = ? WHERE `id` = ?');
        $sql->bind_param('ssisi', $name, $slug, $parent, $image, $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }
}

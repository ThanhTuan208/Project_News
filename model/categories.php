<?php
class categories extends Db
{
    public function getAllCate()
    {
        $sql = self::$connection->prepare("SELECT * FROM categories");
        $sql->execute();
        $categories = array();
        $categories = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $categories;
    }

    public function getCateName($categoryId)
    {
        $sql = self::$connection->prepare("SELECT name FROM categories WHERE id = ?");
        $sql->bind_param("i", $categoryId);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['name'];
    }

    public function getNameCate()
    {
        $sql = self::$connection->prepare("SELECT categories.name FROM categories JOIN items ON categories.id = items.category");
        $sql->execute();
        $result = array();
        $result = $sql->get_result()->fetch_assoc();
        return $result;
    }
}

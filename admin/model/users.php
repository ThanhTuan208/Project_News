<?php
class Users extends Database
{
    public function getAllUsers()
    {
        $sql = self::$con->prepare('SELECT * FROM users');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

}

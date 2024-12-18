<?php
class Account extends Database
{
    public function getAllAccount()
    {
        $sql = self::$con->prepare('SELECT * FROM account');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function Delete($id)
    {
        $sql = self::$con->prepare('DELETE FROM `account` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function getAccountByID($id)
    {
        $sql = self::$con->prepare("SELECT * FROM account WHERE id LIKE ?");
        $sql->bind_param('i', $id);
        $sql->execute();
        $user = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $user;
    }

    public function UpdatePass($user_id, $pass)
    {
        $sql = self::$con->prepare("UPDATE account SET matkhau = ? WHERE id = ?");
        $sql->bind_param("si", $pass, $user_id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

}

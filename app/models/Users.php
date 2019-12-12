<?php
class Users extends Db
{  
    public function login($username, $password) {
      $sql = parent::$connection->prepare('SELECT * FROM users WHERE user_name = ? AND user_password = ?');
      $sql->bind_param('ss', $username, $password);
      return parent::select($sql);
    }
    //Lay danhs ach user
    public function getUserList($perPage, $page)
    {
        $start = ($page - 1) * $perPage;
        // Bước 2: Tạo câu query
        $sql = parent::$connection->prepare("SELECT * FROM users LIMIT $start, $perPage");
        return parent::select($sql);
    }
    //Lay tong user
    public function getTotalUser()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(user_id) FROM users");
        return parent::select($sql)[0]['COUNT(user_id)'];
    }
    //Xóa user
    public function deleteUser($UserId)
    {
        $sql = parent::$connection->prepare('DELETE FROM `users` WHERE `users`.`user_id` = ?');
        $sql->bind_param('i', $UserId);
        //Thực thi câu truy vấn
        return $sql->execute();
    }
    //Sign Up
    public function createUser($username, $password, $fullname) {
      $role = "member";
      $sql = parent::$connection->prepare('INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_role`) VALUES (NULL, ?, ?, ?, ?)');
      $sql->bind_param('ssss', $username, $password, $fullname, $role);
      return $sql->execute();
    }
}  
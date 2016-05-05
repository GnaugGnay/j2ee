<?php

class ModUser extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_user = 'user';
    }

    // 查看是否存在此用户
    public function login($username, $password){
        $sql = "select * from `{$this->table_user}` where `username` = '{$username}' and `password` = '{$password}'";
        return $this->query($sql);
    }

    //修改密码
    public function changePassword($username, $newPassword){
        $sql = "update `{$this->table_user}` set `password` = '{$newPassword}' where `username` = '{$username}'";
        return $this->query($sql);
    }

    //添加用户
    public function addUser($username) {
    	$sql = "insert INTO `{$this->conn}`.`{$this->table_user}` (`username`, `password`, `usertype`) VALUES ('{$username}', '{$username}', '1');";
        return $this->query($sql);
    }

}

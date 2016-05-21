<?php

class ModGroup extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_group = 'group';
    }

    // 获取全部分组
    public function getAll() {
        $sql = "select * from `{$this->table_group}`";
        return $this->query($sql);
    }
    //获取某个单独小组
    public function getGroup($group_id) {
        $sql = "select * from `{$this->table_group}` where `group_id` = '{$group_id}'";
        return $this->query($sql);
    }

    //插入小组成员
    public function insertIntoGroup($group_id, $group_member, $group_leader) {
        if ($group_leader == '') {
            $sql = "update `{$this->table_group}` SET `group_member`='{$group_member}' WHERE `group_id` = '{$group_id}'";
        } else {
            $sql = "update `{$this->table_group}` SET `group_member`='{$group_member}',`group_leader` = '{$group_leader}' WHERE `group_id` = '{$group_id}'";
        }
        return $this->query($sql);
    }

    //插入空条目
    public function insertEmpty($group_member) {
        $sql = "insert INTO `{$this->table_group}` (`group_member`, `group_leader`) VALUES ('{$group_member}', '');";
        return $this->query($sql);
    }

    //更新user表里面的group_flag
    public function updateGroupId($username,$group_id) {
        $sql = "update `user` SET `group_id` = '{$group_id}' WHERE `username` = '{$username}';";
        return $this->query($sql);
    }
}

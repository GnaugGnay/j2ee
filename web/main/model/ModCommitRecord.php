<?php

class ModCommitRecord extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_commitrecord = 'commitrecord';
    }

    //根据小组id查询提交记录
    public function getRecord($group_id){
        $sql = "select * from `{$this->table_commitrecord}` where `group_id` = '{$group_id}' order by `commit_date` DESC";
        return $this->query($sql);
    }

    //老师评分
    public function giveScore($record_id, $score, $comments) {
        $sql = "update `commitrecord` SET `score`='{$score}',`comments`='{$comments}' WHERE `record_id` = {$record_id}";
        var_dump($sql);
        return $this->query($sql);
    }

    //提交课程设计
    public function submitHomework($group_id, $commit_date, $file_name, $filePath){
        $sql = "insert INTO `commitrecord`(`group_id`, `commit_date`, `file_name`, `file_path`) VALUES ('{$group_id}','{$commit_date}','{$file_name}','{$filePath}')";
        return $this->query($sql);
    }
    //得到单独一条提交数据
    public function getSingleRecord($record_id) {
        $sql = "select * from `{$this->table_commitrecord}` where `record_id` = '{$record_id}'";
        return $this->query($sql);
    }
    //追问等
    public function commentRecord($record_id, $comments) {
        $sql = "update `{$this->table_commitrecord}` SET `comments`='{$comments}' WHERE `record_id` = {$record_id}";
        var_dump($sql);
        return $this->query($sql);
    }
}

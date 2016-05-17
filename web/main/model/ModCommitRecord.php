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
    public function giveScore($record_id, $score, $tea_comment) {
        $sql = "update `commitrecord` SET `score`='{$score}',`tea_comment`='{$tea_comment}' WHERE `record_id` = {$record_id}";
        return $this->query($sql);
    }

    //提交课程设计
    public function submitHomework($group_id, $commit_date, $file_name, $filePath){
        $sql = "insert INTO `commitrecord`(`group_id`, `commit_date`, `file_name`, `file_path`) VALUES ('{$group_id}','{$commit_date}','{$file_name}','{$filePath}')";
        return $this->query($sql);
    }
}

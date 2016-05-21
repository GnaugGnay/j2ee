<?php

class ModHomework extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_homework = 'homework';
    }

    // 获取全部作业
    public function getAll() {
        $sql = "select * from `{$this->table_homework}` ORDER BY `deadline` DESC";
        return $this->query($sql);
    }

    //删除某个作业
    public function delete ($hw_no) {
    	$sql = "delete from `{$this->table_homework}` where `hw_no` = {$hw_no}";
    	return $this->query($sql);
    }

    //上传作业
    public function insert ($hw_content, $file_name, $file_path, $hw_grade, $deadline) {
        $sql = "insert INTO `homework`(`hw_content`, `file_name`, `file_path`, `hw_grade`,`deadline` ) VALUES ('{$hw_content}','{$file_name}','{$file_path}','{$hw_grade}','{$deadline}')";
        return $this->query($sql);
    }

}

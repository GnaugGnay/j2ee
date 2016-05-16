<?php

class ModUserscore extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_userscore = 'userscore';
    }

    //查询历史成绩
    public function getScore($username){
        $sql = "select * from `userscore` where `username` = '{$username}'";
        return $this->query($sql);
    }

    //查询某次测验成绩
    public function getScoresOfQuiz($quiz_id){
        $sql = "select count(*) from `userscore` where `quiz_id` = '{$quiz_id}'";
        $scoreNum = $this->query($sql)[0]['count(*)'];
        $sql = "select `scores` from `userscore` where `quiz_id` = '{$quiz_id}'";
        $result['scores'] = $this->query($sql);
        $result['scoreNum'] = $scoreNum;
        return $result;
    }

    

}

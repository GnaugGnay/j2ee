<?php

class ModQuiz extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_onlinequiz = 'onlinequiz';
    }

    // 拿到全部试题
    public function getAll() {
        $sql = "select * from `{$this->table_onlinequiz}`";
        return $this->query($sql);
    }

}

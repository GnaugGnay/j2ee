<?php

class ModForum extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_forum = 'forum';
    }

    // 获取全部帖子
    public function getAll() {
        $sql = "select * from `{$this->table_forum}` ORDER BY `post_date` DESC";
        return $this->query($sql);
    }
    //获取单条帖子
    public function getPost($post_id) {
        $sql = "select * from `{$this->table_forum}` where `post_id` = {$post_id}";
        return $this->query($sql);
    }
    //评论帖子
    public function commentPost($post_id, $comment) {
        $sql = "update `{$this->table_forum}` SET `comment`='{$comment}' WHERE `post_id` = {$post_id}";
        return $this->query($sql);
    }
    //发表提问
    public function postQuestion($post_user, $title, $post_date) {
        $sql = "insert INTO `forum`(`post_user`, `title`, `comment`,`post_date`) VALUES ('{$post_user}','{$title}','[]', '{$post_date}')";
        return $this->query($sql);
    }
    
    // 删除帖子
    public function deletePost($post_id) {
        $sql = "delete FROM `forum` WHERE `post_id` = '{$post_id}'";
        return $this->query($sql);
    }
}
<?php

class SrvForumApi{

    // 获取全部帖子
    public function getPosts() {
        $mod = new ModForum();
        $re = $mod->getAll();
        foreach ($re as $key => $value) {
            $re[$key]['comment'] = json_decode($value['comment']);
        }
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    //评论帖子
    public function comment($data) {
        $post_id = $data['post_id'];
        $username = $data['username'];
        $name = $data['name'];
        $comment = $data['comment'];
        $userComent = array("username"=>$username,"name"=>$name,"comment"=>$comment);
        $mod = new ModForum();
        $re = $mod->getPost($post_id)[0]['comment'];
        $re = json_decode($re);
        array_push($re, $userComent);
        $re = json_encode($re,JSON_UNESCAPED_UNICODE);
        $re = $mod->commentPost($post_id, $re);

        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    //发表提问
    public function postQuestion($data) {
        $post_user = $data['post_user'];
        $title = $data['title'];
        $post_date = date("Y-m-d");
        $mod = new ModForum();
        $re = $mod->postQuestion($post_user, $title, $post_date);

        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    //删除帖子
    public function deletePost($data) {
        $post_id = $data['post_id'];
        $mod = new ModForum();
        $re = $mod->deletePost($post_id);
        $re = $mod->getAll();

        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
}

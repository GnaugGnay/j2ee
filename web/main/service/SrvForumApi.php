<?php
/**
 * Created by PhpStorm.
 * User: hzm
 * Date: 2015/10/22
 * Time: 16:36
 */

class SrvForumApi{

    // 获取全部分组
    public function getPosts() {
        $mod = new ModForum();
        $re = $mod->getAll();
        foreach ($re as $key => $value) {
            $re[$key]['comment'] = json_decode($value['comment']);
        }
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

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
}

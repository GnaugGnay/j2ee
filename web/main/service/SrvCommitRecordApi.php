<?php

class SrvCommitRecordApi{

    //根据小组id查询提交记录
    public function getRecord($data){
        $group_id = $data['group_id'];
        $mod = new ModCommitRecord();
        $re = $mod->getRecord($group_id);
        foreach ($re as $key => $value) {
            $re[$key]['comments'] = json_decode($value['comments'],JSON_UNESCAPED_UNICODE);
        }
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //老师打分
    public function giveScore($data){
        $record_id = $data['record_id'];
        $score = $data['score'];
        $comments = $data['comments'];

        $mod = new ModCommitRecord();
        $mod->giveScore($record_id, $score, $comments);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //继续评论等
    public function comment($data){
        $record_id = $data['record_id'];
        $user = $data['user'];
        $comment = $data['comment'];

        $userComent = array("user"=>$user,"comment"=>$comment);
        $mod = new ModCommitRecord();
        $re = $mod->getSingleRecord($record_id)[0]['comments'];
        $re = json_decode($re);
        array_push($re, $userComent);
        $re = json_encode($re,JSON_UNESCAPED_UNICODE);
        $re = $mod->commentRecord($record_id, $re);

        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);

    }

    //学生提交课程设计
    public function importCourseDesighStu() {
        ini_set('memory_limit','256M');

        $groupMember = $_POST['groupMember'];
        $file_path = WEB_ROOT . '/uploads/courseDesigh/' . $groupMember;
        if (!is_dir($file_path)){  
            $res = mkdir(iconv("UTF-8", "GBK", $file_path),0777); 
        }
        $name = $_FILES['filename']['name'];
        $tmp_name = $_FILES['filename']['tmp_name'];
        $size = $_FILES['filename']['size'];
        $upload = LibFile::uploadByFile($name, $tmp_name,$size, $file_path, $file_path, 2048, array('.doc','.docx','.xls','.xlsx'),$name);

        if(!$upload['state']) return array('state'=>0,'msg'=>$upload['msg']);

        $str = $_SERVER['QUERY_STRING'];
        $arr = explode("&",$str);
        foreach ($arr as $key => $value) {
            $arr2 = explode("=",$value);
            $temp[$arr2[0]] = $arr2[1];
        }

        $group_id = $temp['group_id'];
        $commit_date = date("Y-m-d");
        $file_name = $name;
        $filePath = '/uploads/courseDesigh/' . $groupMember . '/' . $file_name;
        $mod = new ModCommitRecord();
        $re = $mod->submitHomework($group_id, $commit_date, $file_name, $filePath);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
}

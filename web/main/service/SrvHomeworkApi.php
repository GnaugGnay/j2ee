<?php

class SrvHomeworkApi{

    // 获取全部作业
    public function getHomeworks() {
        $mod = new ModHomework();
        $re = $mod->getAll();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //删除某一个作业
    public function deleteHomework($data) { 
        $mod = new ModHomework();
        $hw_no = $data["hw_no"];
        $hw_no = intval(trim($hw_no), 10);
        $mod->delete($hw_no);
        $re = $mod->getAll();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //上传作业(老师)
    public function importHomeworkTea() {
        ini_set('memory_limit','256M');

        $name = $_FILES['filename']['name'];
        if (!empty($name)) {
            $tmp_name = $_FILES['filename']['tmp_name'];
            $size = $_FILES['filename']['size'];
            $upload = LibFile::uploadByFile($name, $tmp_name,$size, WEB_ROOT.'/uploads/homework', WEB_ROOT.'/uploads/homework', 2048, array('.doc','.docx'),$name);

            if(!$upload['state']) return array('state'=>0,'msg'=>$upload['msg']);
            $file_path = '/uploads/homework/' . $name;
        } else {
            $name = $_POST['title'];
            $file_path = '';
        }
        $hw_grade = $_POST['grade'];
        $textDesc = $_POST['textDesc'];
        if ($textDesc == '') {$textDesc = "无文件描述";}
        $deadline = $_POST['deadline'];
        $mod = new ModHomework();
        $re = $mod->insert($textDesc,$name,$file_path,$hw_grade,$deadline);

        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    /// 首页图片
    // public function getBannerList(){
    //     $mod = new ModGoods();
    //     $re = $mod->getBannerList();
    //     if($re){
    //         return LibUtil::reData(Code::$CODE_SUCCESS, $re);
    //     }
    //     return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, Code::$MSG_SYSTEM_ERROR);
    // }

    /// 上传商品,统一定价68元
    // public function addGoods($data){
    //     $data['uid'] = intval($data['uid']);
    //     $data['ct'] = time();
    //     $data['price'] = 68;
    //     $data['fav_count'] = 0;
    //     $data['purchased_count'] = 0;
    //     unset($data['psw']);

    //     $mod = new ModGoods();
    //     $re = $mod->addGoods($data);
    //     if($re){
    //         return LibUtil::reData(Code::$CODE_SUCCESS, $re); 
    //     }
    //     return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, Code::$MSG_SYSTEM_ERROR);

    // }
    // 获取上传的商品图片并且返回URL
    // public function upGoodsImg(){
    //     $name = $_FILES['filename']['name'];
    //     $tmp_name = $_FILES['filename']['tmp_name'];
    //     $size = $_FILES['filename']['size'];
    //     $res = LibFile::uploadByFile($name,$tmp_name,$size, PIC_UPLOAD_GOODS_DIR, PIC_UPLOAD_GOODS_URL,  2048, array('.png','.jpg'));
    //     $res['file'] = null;
    //     return LibUtil::retData(true, $res);
    // }

}

<?php

class SrvSectionApi{

    //得到章节目录(老师)
    public function getSectionsTea() {
        $mod = new ModSection();
        $re = $mod->getSections();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    //得到章节目录(学生)
    public function getSectionsStu() {
        $mod = new ModSection();
        $re = $mod->getSectionsStu();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //开放章节
    public function openSection($data) {
        $section_id = $data['section_id'];
        $mod = new ModSection();
        $re = $mod->openSection($section_id);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //关闭章节
    public function closeSection($data) {
        $section_id = $data['section_id'];
        $mod = new ModSection();
        $re = $mod->closeSection($section_id);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
}

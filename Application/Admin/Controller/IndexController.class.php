<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller{
    public function index(){
        if(session('adminUser')){
            $path = './file';
            //$path=iconv('utf-8', 'gb2312', $path);
            $path = $_REQUEST['path']?$_REQUEST['path']:iconv('utf-8', 'gb2312', $path);
            $path = urldecode($path);
            $this ->current = $path;
            $dir = readDirectory($path);
            iconv('utf-8', 'gb2312', $dir);
            $this->assign('dir',$dir);
            $this->display();  
        }else {
            redirect('./admin.php?c=login');
        }
    }

    public function downLoad(){
        $filename = $_REQUEST['filename'];
        $filename = urldecode($filename);
        header("content-Disposition:attachment;filename=".basename($filename));
        header("content-Length:".filesize($filename));
        readfile($filename);
    }

    public function fileDel() {
        $filename = $_REQUEST['path'];

        if (unlink($filename)) {
          $url = $_SERVER['HTTP_REFERER'];
          return show(1,'删除成功',array("url"=>$url));
        }else{
          return show(0,'删除失败');
        }

    }
}
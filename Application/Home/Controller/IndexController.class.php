<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
      public function index(){        
        $path = './file';
        $path = $_REQUEST['path']?$_REQUEST['path']:iconv('utf-8', 'gb2312', $path);
        $path = urldecode($path);
        $this ->current = $path;
        $dir = readDirectory($path);
        //var_dump($dir);
        iconv('utf-8', 'gb2312', $dir);
        //var_dump($dir);
        $this->assign('dir',$dir);
		    $this->display();
    }

    public function downLoad(){
        $filename = $_REQUEST['filename'];
        $filename = urldecode($filename);
        // echo $filename;exit();
        header("content-Disposition:attachment;filename=".basename($filename));
        header("content-Length:".filesize($filename));
        readfile($filename);
    }
}
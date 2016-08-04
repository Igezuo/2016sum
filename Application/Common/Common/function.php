<?php
	function show($status, $message, $data=array()){
		$result = array(
			'status' => $status,
			'message' => $message,
			'data' => $data,
		);
		exit(json_encode($result));
	}

	function getMd5Password($password) {
    	return md5($password . C('MD5_PRE'));
}
	
	function readDirectory($path){
		$handle = opendir($path);
		while (($item = readdir($handle))!==false) {
			if($item !='.' && $item !='..'){
				if(is_file($path.'/'.$item)){
					$arr ['file'] [] =$item;
				}
				if(is_dir($path.'/'.$item)){
					$arr ['dir'] [] =$item;
				}
			}
		}
		closedir($path);
		return $arr;
	}

	function getDirPath($path,$dir){
		$newpath= urlencode($path.'/'.$dir);
		return $newpath;
	}

	function getFilePath($path,$file){
		$newpath= $path.'/'.$file;
		return $newpath;
	}

	function getLastDir($path){
		if($path=='./file'){
			return urlencode($path);
		}else{
			$str = urlencode(preg_replace('/(.*)\/{1}([^\/]*)/i', '$1', $path));
			return $str;
		}
	}

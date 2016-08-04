<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./public/cikonss/cikonss.css" />
	   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<title>文件管理系统后台</title>
</head>
<body>
<div class="container">
<table class="table">
   		<caption>文件管理系统后台</caption>
   		<thead>
   			<tr>
   				<td>当前目录:<?php echo (iconv('gb2312','utf-8',$current)); ?></td>
   			</tr>
		</thead>
			<tr>
				<td>名称</td>
			</tr>

			<tr>
				<td>
					<span class="icon icon-small"><span class="icon-folder"></span></span>
					&nbsp;
					<a href="./admin.php?path=<?php echo (getLastDir($current)); ?>">..</a>
				</td>
			</tr>
		<tbody>
			<?php if(is_array($dir['dir'])): $i = 0; $__LIST__ = $dir['dir'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dirval): $mod = ($i % 2 );++$i;?><tr>
				<td>
					<span class="icon icon-small"><span class="icon-folder"></span></span>
					&nbsp;
					<a href="./admin.php?path=<?php echo (getDirPath($current,$dirval)); ?>" id="openFile" attr-name="/"><?php echo (iconv('gb2312','utf-8',$dirval)); ?></a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($dir['file'])): $i = 0; $__LIST__ = $dir['file'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fileval): $mod = ($i % 2 );++$i;?><tr>
				<td>
					<span class="icon icon-small"><span class="icon-file"></span></span>
						&nbsp;
					<span><?php echo (iconv('gb2312','utf-8',$fileval)); ?></span>	
					&nbsp;
					<a href="javascript:void(0)" id="file-edit" attr-message="编辑"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="./admin.php?c=index&a=downLoad&filename=<?php echo (getDirPath($current,$fileval)); ?>" attr-message="下载"><span class="glyphicon glyphicon-download"></span></a>
					&nbsp;
					<a href="javascript:void(0)" id="file-delete" attr-message="删除" attr-url="<?php echo (getFilePath($current,$fileval)); ?>"><span class="glyphicon glyphicon-remove-circle"></span></a>
					&nbsp;
					
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

</table>
</div>
<script src="./Public/js/dialog/layer.js"></script>
<script src="./Public/js/admin/common.js"></script>
<script src="./Public/js/dialog.js"></script>
</body>
</html>
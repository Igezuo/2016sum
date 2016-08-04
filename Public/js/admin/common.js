/**
 * 对文件的操作
 */
 $('.table #file-delete').on('click',function(){
 		var url = "./admin.php?c=index&a=fileDel"
 		var data = {'path':$(this).attr('attr-url')};
 		// console.log(data);
		layer.confirm('是否要删除？', {
  			btn: ['确定','取消'] //按钮
			}, 
			function(){
  				$.post(
  					url,
  					data,
  					function(s){
  						if(s.status == 1) {
                			return dialog.success(s.message,s.data.url);
            			}else {
                			return dialog.error(s.message);
            			}
  						},"JSON");
			}
  );
});
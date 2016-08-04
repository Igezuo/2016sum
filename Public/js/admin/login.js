var login = {
	check : function(){
		var username = $('input[name="username"]').val();
		var password = $('input[name="password"]').val();

		// if (!password) {
		// 	dialog.error('密码不能为空');
		// }

		if(username){
			if(!password){
				dialog.error('密码不能为空');
			}else{
				var url = "./admin.php?c=login&a=check";
				var data = {'username': username, 'password':password};
				//异步请求
				$.post(url,data,function(result){
					if(result.status==0){
						return dialog.error(result.message);
					}
					if(result.status==1){
						return dialog.success(result.message, './admin.php?c=index');
					}
				},'json');

			}
		}else{
			if(!password){
				dialog.error('用户名和密码不能为空');
			}else{
				dialog.error('用户名不能为空');
			}
		}
	}
}
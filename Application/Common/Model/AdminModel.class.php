<?php
namespace Common\Model;
use Think\Model;

class AdminModel extends Model {
	private $_db = '';
	public function __construct(){
		$this->_db = M('admin');
	}

	public function getAdminByUsername($username){
		$res = $this->_db->where('username="'.$username.'"')->find();
		return $res;
	}

	public function updateByAdminid($id, $data) {
		if (!$id || !is_numeric($id)) {
			throw_exception('ID不合法');
		}
		if (!$data || !is_array($data)) {
			throw_exception('更新的数据不合法');
		}
		return $this->_db->where('admin_id="'.$id.'"')->save($data);
	}
}

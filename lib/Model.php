<?php
/**
 * 模型的基类，所有的模型需要基础该类
 * User: a-yi
 * Date: 2014/11/6
 * Time: 18:55
 */

class Model{
	/**
	 * @var mixed db对象
	 */
	static $db;

	/**
	 * @var mixed 指定当前数据库连接的库
	 */
	protected $conn = '';

	/**
	 * @var mixed 指定当前模型所使用的表
	 */
	protected $table = '';

	/**
	 * 添加初始化方法，以在简单增删改查情况下直接使用此类而不用再新建model类
	 * @param string $conn DB的name
	 * @param string $table 表名
	 */
	public function __construct($conn = '', $table = ''){
		if($conn){
			$this->conn = $conn;
		}
		if($table){
			$this->table = $table;
		}

	}

	/**
	 * 连接DB
	 * @param string $name DB的name
	 * @param int $dbIndex DB的序号，针对多库的情况
	 * @return LibMysql
	 */
	protected function connDb($name = null, $dbIndex = 0){
		if (empty(self::$db)) {
			$libMysql = new LibMysql();
			self::$db = $libMysql;
		}else{
			$libMysql = self::$db;
		}

		$name = is_null($name) ? $this->conn : $name;
		$libMysql->useDb($name, $dbIndex);
		return $libMysql;
	}

	/**
	 * 执行SQL，如果是select语句则返回数组，其他返回结果
	 *
	 * @param string $sql SQL
	 * @param array $parameter 绑定变量
	 * @return array|bool|resource|string
	 */
	protected function query($sql, $parameter = array()){
		if(!$this->conn){
			Debug::log('模型没有执行数据ID', 'error');
			return false;
		}
		return $this->connDb($this->conn)->query($sql, $parameter);
	}

	/**
	 * 返回一条数据
	 *
	 * @param string $sql SQL
	 * @param array $parameter 绑定变量
	 * @return array|bool|resource|string
	 */
	protected function getOne($sql, $parameter = array()){
		if(!$this->conn){
			Debug::log('模型没有执行数据ID', 'error');
			return false;
		}
		return $this->connDb($this->conn)->getOne($sql, $parameter);
	}

	/**
	 * 插入数据
	 *
	 * @param array $data 插入的数据 k-v
	 * @param bool $returnId 是否返回ID
     * @param string $table 表名
	 * @return resource|string
	 */
	public function insert($data, $returnId = false, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		$re = $this->connDb($this->conn)->insert($this->table, $data);
		if($returnId && $re){
			return $this->connDb($this->conn)->insertId();
		}
		return $re;
	}
	
	public function multyInsert($data, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		$re = $this->connDb($this->conn)->multyInsert($this->table, $data);

		return $re;
	}

	/**
	 * 插入或者更新数据
	 *
	 * @param array $insertData 插入的数据
	 * @param array $updateData 更新的数据
     * @param string $table 表名
	 * @return resource|string
	 */
	public function insertOrUpdate($insertData, $updateData, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		$re = $this->connDb($this->conn)->insertOrUpdate($this->table, $insertData, $updateData);
		return $re;
	}



	/**
	 * 修改数据
	 *
	 * @param array $data 需要修改的数据 k-v
	 * @param array|string $where where字句
     * @param string $table 表名
	 * @return resource|string
	 */
	public function update($data, $where, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		return $this->connDb($this->conn)->update($this->table, $data, $where);
	}

	/**
	 * 删除数据
	 *
	 * @param array|string $where where字句
	 * @param int $limit 限制影响的条数
     * @param string $table 表名
	 * @return resource|string
	 */
	public function delete($where, $limit = 0, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		return $this->connDb($this->conn)->delete($this->table, $where, $limit);
	}

	/**
	 * 根据ID返回数据
	 *
	 * @param int $id ID
	 * @param string $field 字段
	 * @param string $idName ID的字段名
     * @param string $table 表名
	 * @return array
	 */
	public function getById($id, $field = '*', $idName = 'id', $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		return $this->connDb($this->conn)->getById($this->table, $id, $field, $idName);
	}
	
	public function findByAttribute($attri, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		return $this->connDb($this->conn)->getByAttributes($this->table, $attri, 1);
	}
	
	public function findAllByAttribute($attri, $limit=false, $page=false, $order=false, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		return $this->connDb($this->conn)->getByAttributes($this->table, $attri, $limit, $page, $order);
		
	}
	
	public function getCount($attri, $table = ""){
        if($table != "") $this->table = $table;
		if(!$this->conn || !$this->table){
			Debug::log('模型没有执行数据ID或者需要操作的数据表', 'error');
			return false;
		}
		
		return $this->connDb($this->conn)->getCount($this->table, $attri);
	}
}
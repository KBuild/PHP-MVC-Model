<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require_once('conf/database.php');
class Model
{
	var $connect;
	var $column;

	function dbconnect()
	{
		$this->connect = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	}

	function query($data)
	{
		$this->dbconnect();
		switch($data['type'])
		{
			case 'read' :
				$string = 'select * from ' . $data['tblname'];
				if(isset($data['target']) && isset($data['findby']))
				{
					$string .= ' where ' . $data['findby'] . '=' . $data['target'];
				}
				else
				{
					return 'Variable Error. Parameter not exists.';
					break;
				}
				$result = $this->connect->query($string);
				if(!$result)
				{
					return $this->connect->error;
				}
				return $result->fetch_array(MYSQLI_BOTH);
				break;
			case 'write' :
				$string = 'insert into ' . $data['tblname'] . ' values(';
				foreach($data['col'] as $key => $val)
				{
				        $string .= $key . '=\'' . $val . '\'';
				        if(end($data['col']) !== $val) $string .= ', ';
				}
				$string .= ')';
				$result = $this->connect->query($string);
				if(!$result)
				{
					return $this->connect->error;
				}
				return $result;
				break;
			case 'update' :
				$string = 'update ' . $data['tblname'] . ' set ';
				foreach($data['col'] as $key => $val)
				{
					$string .= $key . '=\'' . $val . '\'';
					if(end($data['col']) !== $val) $string .= ', ';
				}
				$string .= ' where id=' . $data['id'];
				$result = $this->connect->query($string);
				if(!$result)
				{
					return $this->connect->error;
				}
				return $result;
				break;
			case 'create' :
				$replace = array('string' => 'varchar(255)',
						 'integer' => 'int(11)',
						 'smalltext' => 'text',
						 'text' => 'mediumtext',
						 'bigtext' => 'longtext',
						 'timestamp' => 'datetime'); // set data type
				$string = 'create table ' . $data['tblname'] . '(id int(11) NOT NULL AUTO_INCREMENT, '; 
				foreach($data['col'] as $colname => $val)
				{
					$coltype = $replace[$val];
					$string .= $colname . ' ' . $coltype;
					$string .= ', ';
				}
				$string .= 'PRIMARY KEY(id))';
				$result = $this->connect->query($string);
				if(!$result)
				{
					return 'DB Error. ' . $this->connect->error . '.';
				}
				return $result;
				break;
			case 'drop' :
				$string = 'drop table ' . $data['tblname'];
				$result = $this->connect->query($string);
				if(!$result)
				{
					return 'DB Error. ' . $this->connect->error . '.';
				}
				return $result;
				break;
			default :
				return false;
				break;
			$this->connect->close();
		}
	}

	function create_table()
	{
		echo $this->query(
			array('type' => 'create', 'tblname' => $this->name, 'col' => $this->column)
		);
	}

	function drop_table()
	{
		echo $this->query(
			array('type' => 'drop', 'tblname' => $this->name)
		);
	}

	/* find data by id*/
	function findById($data)
	{
		$parameter = array('type' => 'read', 'tblname' => $this->name , 'findby' => 'id', 'target' => $data['id']);
		return $this->query($parameter);
	}

	/* find data */
	function find($data)
	{
		$parameter = array('type' => 'read', 'tblname' => $this->name, 'findby' => $data['findby'], 'target' => $data['target']);
		return $this->query($parameter);
	}

	/* update database */
	function update($data)
	{
		$parameter = array('type' => 'update', 'tblname' => $this->name, 'id'=>$data['id']);
		$parameter = array_merge($parameter, array('col' => $data['col']));
		return $this->query($parameter);
	}

	/* save data into database */
	function insert($data)
	{
		$parameter = array('type' => 'write', 'tblname' => $this->name);
		$parameter = array_merge($parameter, array('col' => $data['col']));
		return $this->query($parameter);
	}
}
?>

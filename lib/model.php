<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require_once('conf/database.php');
class Model
{
	var $connect;
	var $name;
	var $column;

	function __construct()
	{
		$this->connect = mysql_connect($db['host'], $db['user'], $db['passwd']);
		mysql_select_db($db['dbname'], $this->connect);
	}

	function query($data)
	{
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
					return false;
					break;
				}
				$result = mysql_query($string);
				return mysql_fetch_array($result);
				break;
			case 'write' :
				$string = 'insert into ' . $data['tblname'] . ' values(';
				foreach($data['col'] as $key => $val)
				{
				        $string .= $key . '=\'' . $val . '\'';
				        if(end($data['col']) !== $val) $string .= ', ';
				}
				$string .= ')';
				$result = mysql_query($string);
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
				$result = mysql_query($string);
				return $result;
				break;
			case 'create' :
				$string = 'create table ' . $data['tblname'] . '('; 
				foreach($data['col'] as $key => $val)
				{
					$string .= $key . '=\'' . $val . '\'';
					if(end($data['col']) !== $val) $string .= ', ';
				}
				return $result;
				break;
			case 'drop' :
				$string = 'drop table ' . $data['tblname'];
				$result = mysql_query($string);
				return $result;
				break;
			default :
				return false;
				break;
		}
	}

	function create_table()
	{
		$this->query(
			array('type' => 'create', 'tblname' => $this->name, 'col' => $this->column)
		);
	}

	function drop_table()
	{
		$this->query(
			array('type' => 'drop', 'tblname' => $this->name)
		);
	}

	/* find data by id*/
	function findById($data, $id)
	{
		$parameter = array('type' => 'read', 'tblname' => $this->name, 'findby' => 'id', 'target' => $id);
		$parameter = array_merge($parameter, array('col' => $data));
		$this->query($parameter);
	}

	/* find data */
	function find($data, $findby, $target)
	{
		$parameter = array('type' => 'read', 'tblname' => $this->name, 'findby' => $findby, 'target' => $target);
		$parameter = array_merge($parameter, array('col' => $data));
		$this->query($parameter);
	}

	/* update database */
	function update($data, $id)
	{
		$parameter = array('type' => 'update', 'tblname' => $this->name, 'id'=>$id);
		$parameter = array_merge($parameter, array('col' => $data));
	}

	/* save data into database */
	function insert($data)
	{
		$parameter = array('type' => 'write', 'tblname' => $this->name);
		$parameter = array_merge($parameter, array('col' => $data));
		$this->query($parameter);
	}
}
?>

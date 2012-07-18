<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */

require_once('lib/model.php');
require_once('lib/view.php');

Class Controller
{
	var $name = null;

	/* rendering view directly
	 *
	 * Parameter
	 *  $view_name : name of view(string)
	 *  $parameter : data for view(array)
	 *
	 */
	final function render($parameter)
	{
		global $view;
		$view->heading($parameter['title']);
		$appview = 'app/view/' . $this->name . '/' . ACTION . EXT;
		include_once($appview);
		$view->closing();
	}

	/* find date from model */
	final function find($parameter)
	{
		$appmodel = 'app/model/' . $this->name . EXT;
		include_once($appmodel);
		$model_name = ucfirst($this->name);
		$model = new $model_name();
		return $model->find($parameter);
	}

	final function findById($parameter)
	{
		$appmodel = 'app/model/' . $this->name . EXT;
		include_once($appmodel);
		$model_name = ucfirst($this->name);
		$model = new $model_name();
		return $model->findById($parameter);
	}

	final function findAll($parameter)
	{
		$appmodel = 'app/model/' . $this->name . EXT;
		include_once($appmodel);
		$model_name = ucfirst($this->name);
		$model = new $model_name();
		return $model->findAll($parameter);
	}

	/* update date from model */
	final function update($parameter)
	{
		$appmodel = 'app/model/' . $this->name . EXT;
		include_once($appmodel);
		$model_name = ucfirst($this->name);
		$model = new $model_name();
		$id = $parameter['id'];
		unset($parameter['id']);
		return $model->update(array('id' => $id, 'col' => $parameter));
	}

	/* insert date into model */
	final function insert($parameter)
	{
		$appmodel = 'app/model/' . $this->name . EXT;
		include_once($appmodel);
		$model_name = ucfirst($this->name);
		$model = new $model_name();
		return $model->insert(array('col' => $parameter));
	}
}
?>

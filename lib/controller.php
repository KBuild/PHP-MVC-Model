<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
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
	final function render($view_name, $parameter)
	{
		include_once('lib/view.php');
		$view->heading($parameter['title']);
		$appview = 'app/view/'.$this->name.'/'.$view_name.EXT;
		include_once($appview);
		$view->closing();
	}

	/* find date from model */
	final function find($model_name, $parameter)
	{
		$appmodel = 'app/model/'.$model_name;
		include_once($appmodel);
		call_user_func(find, $parameter);
	}

	/* update date from model */
	final function update($model_name, $parameter)
	{
		$appmodel = 'app/model/'.$model_name;
		include_once($appmodel);
		call_user_func(update, $parameter);
	}

	/* insert date into model */
	final function insert($model_name, $parameter)
	{
		$appmodel = 'app/model/'.$model_name;
		include_once($appmodel);
		call_user_func(insert, $parameter);
	}
}
?>

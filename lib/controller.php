<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
Class Controller
{
	var $name = null;

	/* rendering view directly */
	final function render($view_name)
	{
		$view = 'app/view/'.$this->name.'/'.$view_name.EXT;
		include_once($view);
	}

	/* find date from model */
	final function find($model_name, $parameter)
	{
		$model = 'app/model/'.$model_name;
		include_once($model);
		call_user_func(find, $parameter);
	}

	/* update date from model */
	final function update($model_name, $parameter)
	{
		$model = 'app/model/'.$model_name;
		include_once($model);
		call_user_func(update, $parameter);
	}

	/* insert date into model */
	final function insert($model_name, $parameter)
	{
		$model = 'app/model/'.$model_name;
		include_once($model);
		call_user_func(insert, $parameter);
	}
}
?>

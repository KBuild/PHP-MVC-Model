<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
Class Controller
{
	$name = string;

	/* rendering view directly */
	function render($view_name)
	{
		$view = PATH.'/app/view/'.$this->name.'/'.$view_name.'.php';
		include($view);
		call_user_func(callView, $this->name);
	}

	/* find date from model */
	function find($model_name, $parameter)
	{
		$model = PATH.'/app/model/'.$model_name;
		include($model);
		call_user_func(find, $parameter);
	}

	/* update date from model */
	function update($model_name, $parameter)
	{
		$model = PATH.'/app/model/'.$model_name;
		include($model);
		call_user_func(update, $parameter);
	}

	/* insert date into model */
	function insert($model_name, $parameter)
	{
		$model = PATH.'/app/model/'.$model_name;
		include($model);
		call_user_func(insert, $parameter);
	}
}
?>

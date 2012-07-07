<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require(PATH.'/lib/html.php');
class View
{
	$html = new HTML();
	function callView($name)
	{

	}
	function heading($name)
	{
		$this->html->head_open();
		$this->html->js_tag(APP_PATH.'/js/'.$name.'.js');
		$this->html->css_tag(APP_PATH.'/css/'.$name.'.css');
		$this->html->head_close();
	}
}
?>

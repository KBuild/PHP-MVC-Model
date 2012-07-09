<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require_once('lib/html.php');
class View
{
	function heading($title)
	{
		head_open($title);
		js_tag(APP_NAME.'js/'.CONTROLLER.'/'.ACTION.'.js');
		css_tag(APP_NAME.'css/'.CONTROLLER.'/'.ACTION.'.css');
		head_close();
	}
	function closing()
	{
		html_close();
	}
}
$view = new View();
?>

<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require_once 'conf/route.php';

if(empty($_SERVER['PHP_SELF']))
{
	$sp = preg_split('/\//',$route['default']);
	define(CONTROLLER, $sp[0]);
	define(ACTION, $sp[1]);
}
else
{
	$parameter = preg_split('/\//', $_SERVER['PHP_SELF']); // split parameter
	if(empty($parameter[2]))
	{
		$parameter[2] = 'index'; // set default action : index
	}
	define(CONTROLLER, $parameter[1]);
	define(ACTION, $parameter[2]);
}

$controller = strtolower(CONTROLLER).'Controller'; // set controller uri

require_once 'lib/controller.php';
require_once 'app/controller/'.$controller.EXT;

/* Error routine start */

if(empty($parameter[2]))
{
        $parameter[2] = 'index'; // set default action : index
}

/* if controller doesn`t exist print error and exit */
if(!file_exists('app/controller/'.$controller.EXT))
{
	header('Location: /404.html');
	exit();
}

if(!method_exists($controller, ACTION))
{
	header('Location: /404.html');
	exit();
}

/* End */

$ctr = new $controller;
$ctr->{ACTION}();

?>

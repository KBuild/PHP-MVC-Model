<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require_once 'conf/route.php';

if(empty($_SERVER['PHP_SELF'])) // set default route if has not $_SERVER['PHP_SELF']
{
	$default = preg_split('/\//',$route['default']);
	define(CONTROLLER, strtolower($default[0]));
	define(ACTION, strtolower($default[1]));
}
else
{
	$parameter = preg_split('/\//', $_SERVER['PHP_SELF']); // split parameter
	if(empty($parameter[2]))
	{
		$parameter[2] = 'index'; // set default action : index
	}
	if(isset($route[$parameter[1]][$parameter[2]]))
	{
		$proxy = preg_split('/\//', $route[$parameter[1]][$parameter[2]]);
		$parameter[1] = $proxy[0];
		$parameter[2] = $proxy[1];
	}
	define(CONTROLLER, strtolower($parameter[1]));
	define(ACTION, strtolower($parameter[2]));
}

$controller = ucfirst(CONTROLLER).'Controller'; // set controller uri

if($parameter[2] == $controller)
{
	echo 'URL Error<br />Invalid URL';
	exit;
}

if(empty($parameter[2]))
{
        $parameter[2] = 'index'; // set default action : index
}

/* if controller doesn`t exist print error and exit */
if(!file_exists('app/controller/'.$controller.EXT))
{
	echo 'File Error<br />';
	echo $controller . ' not found';
	exit();
}

require_once 'lib/controller.php';
require_once 'app/controller/'.$controller.EXT;

if(!method_exists($controller, ACTION))
{
	echo 'Action Error<br />';
	echo '"' . ACTION . '" action has not found';
	exit();
}

$ctr = new $controller;
$ctr->{ACTION}();

?>

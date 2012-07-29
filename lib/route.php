<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
require_once 'conf/route.php';

if(empty($_SERVER['PATH_INFO'])) // set default route if has not $_SERVER['PATH_INFO'] or has null value
{
	$default = preg_split('/\//',$route['default']);
	define(CONTROLLER, strtolower($default[0]));
	define(ACTION, strtolower($default[1]));
}
else
{

	$parameter = preg_split('/\//', $_SERVER['PATH_INFO']); // split parameter
	$actionparam = null; // parameter for action , default null

	/* Checking for validates of Controller name(string) */
	$intparam = (int)$parameter[1];
	$strparam = $parameter[1];
	if($strparam == (string)$intparam)
	{
		exit('URL Error. Invalid URL.');
	}

	/* Checking for type of Action , if integer route to N Action */
	$intparam = (int)$parameter[2];
	$strparam = $parameter[2];
	if($strparam == (string)$intparam)
	{
		if(isset($route[$parameter[1]]['NUM']))
		{
			$actionparam = $intparam;
			$newuri = preg_split('/\//', $route[$parameter[1]]['NUM']);
			$parameter[1] = $newuri[0];
			$parameter[2] = $newuri[1];
		}
	}

	/* if data is POST type, route to POST Action */
	if(!empty($_POST))
	{
		if(isset($route[$parameter[1]]['POST']))
		{
			$newuri = preg_split('/\//', $route[$parameter[1]]['POST']);
			$parameter[1] = $newuri[0];
			$parameter[2] = $newuri[1];
			$actionparam = $_POST;
		}
		else
		{
			exit('Route Error. Cannot route to POST Action.');
		}
	}

	if(!empty($route[$parameter[1]]) && $parameter[2] == NULL)
	{
		$newuri = preg_split('/\//', $route[$parameter[1]]);
	}
	else if(!empty($route[$parameter[1]][$parameter[2]]))
	{
		$newuri = preg_split('/\//', $route[$parameter[1]][$parameter[2]]);
	}

	if(!empty($newuri))
	{
		$parameter[1] = $newuri[0];
		$parameter[2] = $newuri[1];
	}

	if(empty($parameter[2]))
	{
		$parameter[2] = 'index'; // set default action : index
	}

	define(CONTROLLER, strtolower($parameter[1]));
	define(ACTION, strtolower($parameter[2]));
}

define(CONTROLLER_PATH, APP_NAME.'index.php/'.CONTROLLER);

unset($newuri);
unset($parameter);
unset($intparam);
unset($strparam);

$controller = ucfirst(CONTROLLER).'Controller'; // set controller uri

if(ACTION == $controller)
{
	exit('URL Error. Invalid URL');
}

if(ACTION == null)
{
	define(ACTION, 'index'); // set default action : index
}

/* if controller doesn`t exist print error and exit */
if(!file_exists('app/controller/'.$controller.EXT))
{
	exit('File Error. ' . $controller . ' not found.');
}

/* if controller doesn`t exists action(function) print error and exit */

require_once 'lib/controller.php';
require_once 'app/controller/'.$controller.EXT;

if(!method_exists($controller, ACTION))
{
	exit('Action Error. "' . ACTION . '" action not found.');
}

$ctr = new $controller;
$ctr->{ACTION}($actionparam);

unset($controller);
?>

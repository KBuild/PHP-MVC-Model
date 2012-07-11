<?php
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */

	/* $route : variable for routing
	 * $route['default'] : default location of controller
	 *
	 * $route['controller']['N'] : if request got likely www.example.com/index.php/post/1, take a action
	 *  -> ex) $route['post']['N'] = 'post/show';
	 *
	 * $route['controller']['action'] : if request got likely www.example.com/index.php/controller/action, take a action
	 *  -> ex) $route['post']['new'] = 'post/write'
	 */

	$route['default'] = 'post/index';
	$route['post']['test2'] = 'post/test';
	$route['post']['N'] = 'post/show';
?>

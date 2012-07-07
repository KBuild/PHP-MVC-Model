<?php if(!defined('PATH')) exit('Path error');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
class Route {
	function routing($url) {
		$parameter = preg_split('/\//', $url);
		var_dump($parameter);
		$controller = strtolower($parameter[1]).'Controller';
		require(PATH.'/lib/controller.php');
		require($controller);
		$paramter[3] = (isset($parameter[3])) ? $parameter[3] : null;
		call_user_func($parameter[2], $parameter[3]);
	}
}
?>

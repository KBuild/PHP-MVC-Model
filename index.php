<?php
//ini_set('display_errors', 'On');
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
$s = preg_split('/index.php/', $_SERVER['SCRIPT_NAME']);
define(PATH, dirname(__FILE__));
define(EXT, '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
define(APP_NAME, $s[0]);
require_once('lib/route.php');
?>

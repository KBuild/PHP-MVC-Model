<?php
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
$s = preg_split('/'.basename(__FILE__).'/', $_SERVER['SCRIPT_NAME']);
define(PATH, dirname(__FILE__));
define(EXT, '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
define(APP_NAME, $s[0]);
define(VERSION, 0.1);
require_once('lib/route.php');
?>

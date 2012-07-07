<?php
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
define(PATH, dirname(__FILE__));
$s = preg_split('/(\/index.php)/',$_SERVER['SCRIPT_NAME']);
define(APP_NAME, $s[0]);
require('lib/route.php');
Route::routing($_SERVER['PHP_SELF']);
?>

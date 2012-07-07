<?php
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
define(PATH, dirname(__FILE__));
echo strtr($_SERVER['SCRIPT_NAME'], basename(__FILE__), null);// get string of app folder
require('lib/route.php');
Route::routing($_SERVER['PHP_SELF']);
?>

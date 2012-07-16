<?php
/* author : KBuild
 * email : qwer7995@gmail.com
 */
function replacing($appname, $format)
{
	$pattern = array('/__lNAME__/', '/__cNAME__/');
	$replace = array(strtolower($appname), ucfirst($appname));
	return preg_replace($pattern, $replace, $format);
}
?>

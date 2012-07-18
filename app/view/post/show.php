<?php if(!defined('PATH')) exit('Path error');
require_once('lib/view.php');
if($parameter['post'] == NULL)
{
	exit('>< has no data');
}
?>
<h1> List.</h1><br />
<? table_print(1,3,$parameter['post'],'test') ?>

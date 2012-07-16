<?php
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
class Post extends Model
{
	function __construct()
	{
		$this->name = 'post';
		$this->column = array(
			'title' => 'string',
			'body' => 'text'
		);
	}
}
?>

<?php
/* Author : KBuild
 * Email : qwer7995@gmail.com
 */
class PostController extends Controller
{
	/* initialize */
	function PostController()
	{
		$this->name = 'post';
	}

	function index()
	{
		$this->render('index');
	}
	function test()
	{
		echo 'test';
	}
}
?>

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
		$title = 'Hello MVC!';
		$this->render(array('title' => $title, 'Var' => '3'));
	}

	function test()
	{
		echo 'test';
	}

	function show($id)
	{
		$post = $this->findById(
			array(
				'id' => $id
			)
		);
		$this->render(
			array(
				'title' => 'Show posts',
				'post' => $post
			)
		);			
	}
}
?>

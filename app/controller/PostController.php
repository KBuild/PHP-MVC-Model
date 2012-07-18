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
		echo 'test good';
	}

	function form()
	{
		$this->render(
			array(
				'title' => 'Input Form'
			)
		);
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

	function save($data)
	{
		echo $this->insert(
			array(
				'title' => $data['title'],
				'post' => $data['post']
			)
		);
	}
}
?>

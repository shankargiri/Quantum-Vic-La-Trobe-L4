<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = 'layouts.master';
	
	public function index()
	{
		$posts = Post::orderBy('created_at', 'DESC')->get();
		$this->layout->content = View::make('posts.index')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("posts.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Post::validate(Input::all());
		if ($validator->fails()) {
			return Redirect::to('posts/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$post = new Post;
			$post->title       = Input::get('title');
			$post->body      = Input::get('body');

			$post->save();
			
			// redirect
			return Redirect::to('posts');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return View::make("posts.show")->with('post', $post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make("posts.edit")->with('post', $post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Post::validate(Input::all());
		if ($validator->fails()) {
			return Redirect::to('posts/'.$id. '/edit')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$post = Post::find($id);
			$post->title       = Input::get('title');
			$post->body      = Input::get('body');
			$post->save();
			
			// redirect
			return Redirect::to('posts')->with('message', 'Successfully updated');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
		Session::flash('message', 'Successfully deleted the post!');
		return Redirect::to('posts')->with('message', 'Successfully deleted');
	}

	public function viewposts()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();
		if(Auth::user()->role == 'admin' || Auth::user()->role == 'teacher'):
			$this->layout->content = View::make('posts.viewposts')->with('posts', $posts);
		else:
			return View::make('posts.viewposts-kids')->with('posts', $posts);
		endif;
	}


}
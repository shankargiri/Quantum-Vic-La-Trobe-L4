<?php

use \Quantum\Repos\TagRepo\TagInterface; 


class TagsController extends \BaseController { 

	protected $layout = 'layouts.master';


	protected $tagInterface;

	function __construct(TagInterface $tagInterface){

		$this->tagInterface = $tagInterface;

	}

	public function index()
	{
		$tag = $this->tagInterface->getAll();
		$this->layout->content =  View::make('tags.index')
			->with('tag', $tag);
	}


	public function create()
	{
		$this->layout->content = View::make('tags.create');
	}


	public function store()
	{

		$validator = Tag::validate(Input::all());

		if($validator->fails()){
			return Redirect::to('tags/create')
							->withErrors($validator)
							->withInput(Input::all());
		}else{
		$tag = new Tag;
		$tag->name = Input::get('name');
		$tag->description = Input::get('description');
		if($tag->save())
			return Redirect::to('tags');
		}
	}

	
	public function show($id)
	{
		$tag = Tag::find($id);
		$this->layout->content = View::make('tags.show')
				->with('tag', $tag);
	}

	
	public function edit($id)
	{
		$tag = $this->tagInterface->getById($id);
		$this->layout->content = View::make('tags.edit')
				->with('tag', $tag);
	}

	
	public function update($id)
	{
		$rules = array(
			'name' 			=> 'required',
			'description'	=> 'required'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('tags/'.$id.'/edit')
							->withErrors($validator)
							->withInput(Input::all());
		}else{
		$tag = $this->tagInterface->getById($id);
	
		$tag->name = Input::get('name');
		$tag->description = Input::get('description');
		if($tag->save())
			return Redirect::to('tags');
		}
	}

	
	public function destroy($id)
	{
		$tag = $this->tagInterface->getById($id);
		$tag->delete();
		return Redirect::to('tags');
	}

	public function tagsResources(){

		$this->layout->content =  View::make('tags.tagsresources');
	}
	
	public function filterResources(){

		$name = Input::get('name');
		$tag = Tag::where('name', 'LIKE', $name.'%')->get();

		if(Request::ajax()){
	
			foreach($tag as $tag_name) {

				$results[] = $tag_name->name;
				 print_r($results);

			}
			
			return json_encode(array('tags' => $results));	
		}
		$this->layout->content = View::make('tags.resource_tag')->with('tag', $tag);

	}

}

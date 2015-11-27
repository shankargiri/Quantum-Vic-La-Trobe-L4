<?php

class PostersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$all_posters = Poster::all();
		return View::make('posters.index')->with('all_posters', $all_posters);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posters.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Poster::validate($input = Input::only('title', 'description', 'release_date'));
		if($validator->fails()){
			return Redirect::back()
							->withErrors($validator)
							->withInput(Input::all());
		}else{
			$poster = new Poster;
			$poster->title = Input::get('title');
			$poster->description = Input::get('description');
			$poster->release_date = Input::get('release_date');
			if($poster->save())
			{
				return Redirect::route('posters');
			}
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$poster = Poster::find($id);
		return View::make('posters.edit', compact('poster'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Poster::validate($input = Input::only('title', 'description', 'release_date'));
		if($validator->fails()){
			return Redirect::back()
							->withErrors($validator)
							->withInput(Input::all());
		}else{
			$poster = Poster::find($id);
			$poster->title = Input::get('title');
			$poster->description = Input::get('description');
			$poster->release_date = Input::get('release_date');
			if($poster->save())
			{
				return Redirect::route('posters');
			}
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
		$poster = Poster::find($id);
		if($poster->delete())
		{
			return Redirect::back();
		}
	}

}
<?php
namespace Quantum\Repos\TagRepo;

class TagRepository implements TagInterface{
	public function getAll()
	{
		return \Tag::all();
	}
	public function getById($id)
	{
		return \Tag::find($id);
	}
}
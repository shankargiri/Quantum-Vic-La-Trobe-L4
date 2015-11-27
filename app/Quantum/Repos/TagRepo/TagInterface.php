<?php
namespace Quantum\Repos\TagRepo;

interface TagInterface{
	public function getAll();
	public function getById($id);
}
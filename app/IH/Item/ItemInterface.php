<?php namespace Core\Item;

/**
*	Item Interface - required properties and methods
*/

interface ItemInterface
{
	protected $fillable;

	protected $validationRules;

	public function attributes();

	public function categories();

	public function reviews();

	public function relatedItems();

	public function tags();

}
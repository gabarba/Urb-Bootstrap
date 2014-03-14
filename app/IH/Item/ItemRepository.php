<?php namespace Core\Item;

use IH\Item\Item;

/**
* Item Repository 
*/

class ItemRepository
{
	// Item Model
	protected $item;

	/**
	* Inject required item model 
	*
	* @param Model $item
	* @return ItemRepository
	*/
	public function __contstruct(Item $item)
	{
		$this->item = $item;
	}

	/**
	* FIlter Items based on Attributes
	*
	* @param $attributes - array of attributes and values to be filtered by
	* @return collection of items filtered by attributes
	*/

	public function FilterByAttributes($attributes)
	{
		$this->item->FilterByAttributes($attributes);
	}

	/**
	* Retrieve Attribute Value by Code 
	*
	*@param $code string
	*@return string
	*/
	public function getAttributeValueByCode($code = null)
	{
		$this->item->getAttributeValueByCode($code);
	}

}
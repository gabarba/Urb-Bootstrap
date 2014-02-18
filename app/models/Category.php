<?php

class Category extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category';

	/**
	* Soft Deletes Enabled for this model. 
	*
	* @var boolean
	*/
	 protected $softDelete = false;


	 /**
	 * Retrieve products that belong to this category
	 * 
	 * @return collection of products belong to this category
	 */

	 public function products() 
	 {
	 	return $this->belongsToMany('Product', 'category_products');
	 }


	public function returnChildrenCategories()
	{
		return $this->where('parent_cat_id',$this->id)->where('status',1)->get(); //Pull Child Categories
	}
}
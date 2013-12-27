<?php namespace App\Models;

class Product extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	* Soft Deletes Enabled for this model. 
	*
	* @var boolean
	*/
	 protected $softDelete = true;


	 /**
	 * Retrieve related product reviews
	 * 
	 * @return collection of reviews related to product
	 */
	 public function reviews()
	 {
	 	return $this->hasMany('Review');
	 }

	 /**
	 * Retrieve related product categories
	 * 
	 * @return collection of categories related to product
	 */

	 public function categories() 
	 {
	 	return $this->belongsToMany('Category');
	 }

}
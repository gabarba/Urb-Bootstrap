<?php

class Product extends Eloquent {

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
	 public function reviews(){
	 	return $this->hasMany('review');
	 }

}
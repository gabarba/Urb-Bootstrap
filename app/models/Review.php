<?php

class Review extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

	/**
	* Soft Deletes Enabled for this model. 
	*
	* @var boolean
	*/
	 protected $softDelete = true;


	 /**
	 * Retrieve associated product
	 * 
	 * @return returns the reviews product
	 */
	 public function product(){
	 	return $this->belongsTo('product');
	 }

	 public function user(){
	 	return $this->belongsTo('user');
	 }
	 
}
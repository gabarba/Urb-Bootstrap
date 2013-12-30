<?php namespace App\Models;

class ProductEav extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_eav';

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array();

	public function get_attribute() 
	{
		return $this->belongsTo('ProductAttribute');
	}

	public function get_product() 
	{
		return $this->belongsTo('Product');
	}

}

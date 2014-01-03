<?php 

class ProductEav extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_eav';

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array();

	public function attribute() 
	{
		return $this->belongsTo('ProductAttributes','product_attribute_id');
	}

	public function product() 
	{
		return $this->belongsTo('Product');
	}

}

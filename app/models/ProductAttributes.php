<?php 

class ProductAttributes extends Eloquent {

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array();

	 public function values() 
	 {
	 	return $this->hasMany('ProductEav','product_attribute_id');
	 }
}

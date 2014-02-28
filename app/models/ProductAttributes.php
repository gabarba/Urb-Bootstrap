<?php 

class ProductAttributes extends Eloquent {

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array();

	 public function values() 
	 {
	 	return $this->hasMany('ProductEav','product_attribute_id');
	 }

	 // Return Attributes used in product filtering
	 public static function getFilterAttributes() 
	 {
	 	return self::where('use_in_filter',1)->get(array('id','name','code'));
	 }
	 // Return Value if loaded by Pivot Table
	 public function getValueAttribute($value)
	 {
	 	return $this->pivot->value;
	 }	

	 public static function returnAttributeValues($code = null)
	 {
	 	$attributeValues = array();
	 	if(is_array($code))
	 	{
	 		foreach($code as $attribute)
	 		{
	 			try{
	 			$attributeValues[$attribute] = self::where('code',$attribute)
	 												  ->has('values')
							 						  ->remember(1440) // Cache product_attribute.code query for day
										 			  ->firstOrFail()
										 			  ->values()
										 			  ->orderBy('value')
										 			  ->distinct() // get distinct values 
										 			  ->remember(1440) // Cache values for a day
										 			  ->lists('value'); // return array of values
				}catch (\Exception $e) {
				   //echo 'Code='. $attribute .' Caught exception: ',  $e->getMessage(), "\n";
				}
			}
	 	}elseif(!is_null($code))
	 	{
	 		$attributeValues[$code] = self::where('code',$code)
					 						  ->remember(1440) // Cache product_attribute.code query for day
								 			  ->first()
								 			  ->values()
								 			  ->orderBy('value')
								 			  ->distinct() // get distinct values 
								 			  ->remember(1440) // Cache values for a day
								 			  ->lists('value'); // return array of values

	 	}

	 	return $attributeValues;
	 }
}

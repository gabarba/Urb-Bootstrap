<?php 


class Product extends \LaravelBook\Ardent\Ardent {


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
	* Attributes that are fillable by massassignment
	*
	* @var array
	*/
	 protected $fillable = array('name', 'brand', 'manufacturer_part_no','sku','asin','upc_isbn','description');


	 public function returnFillable() 
	 {
	 	return $this->fillable;
	 }
	 /**
	 * Model Validation Rules
	 *
	 * @return array of rules used for input sanitation and model validation
	 */
	 public static $rules = array(
	 	'name' => 'required', 
	 	'brand' => 'required',
	 	'manufacturer_part_no' => 'alpha_dash',
	 	'sku' => 'required|alpha_dash|unique:products',
	 	'asin' => 'alpha_num|unique:products',
	 	'upc_isbn' => 'alpha_num|unique:products'
	 	);

	  public $autoHydrateEntityFromInput = true; // hydrates on new entries' validation
	  public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
	  public $autoPurgeRedundantAttributes = true;


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
	 	return $this->belongsToMany('Category', 'category_products');
	 }

	 public function attributes()
	 {
	 	return $this->belongsToMany('ProductAttributes','product_eav','product_id','product_attribute_id')->withPivot('id','value');
	 }
	 
	 /**
	 * Filter Products based on attributes 
	 *@param $query - Eloquen Query Model
	 *@param $attributes - array of attributes and values to be filtered by 
	 *@return collection of filtered products by Attribute
	 */
	 public function scopeFilterByAttributes($query,array $attributes = array())
	 {
	 	foreach($attributes as $attributeCode => $value) 
	 	{
	 		$query->whereHas('attributes', function($q) use ($attributeCode,$value)
	 		{ 
	 			if(is_array($value))
	 			{
	 					$q->where('code',$attributeCode)->whereIn('value',$value);
	 				
	 			}else
	 			{
	 				$q->where('code',$attributeCode)->where('value',$value);
	 			}
	 			
			});
	 	}
	 	
		return $query;
	 }

	 

	 
	 public function getAttributeValueByCode($code = null)
	 {
	 	if($code)
	 	{
	 		return Cache::rememberForever($this->id.'_'.$code, function() use ($code)
	 			{
	 				$value = $this->attributes()->where('code',$code)->first();
	 				return isset($value->value) ? $value->value : false;//'N/A';
	 			}
	 		);
	 	}
	 	return $code;
	 }

	public function scopeEyepieces($query)
	{
		$query->whereHas('categories', function($q)
		{
			$q->where('name','Eyepieces');
		});
		return $query;
	}

	 // Update Ardent Save function to always apply save on update for unique validation to fix FrozenNode/Administrator packages
	 // that only uses the save method.
	 public function save(array $rules = array(),
        array $customMessages = array(),
        array $options = array(),
        Closure $beforeSave = null,
        Closure $afterSave = null
    ) {
        $rules = $this->buildUniqueExclusionRules($rules);
        
        return parent::save($rules, $customMessages, $options, $beforeSave, $afterSave);
    }
}
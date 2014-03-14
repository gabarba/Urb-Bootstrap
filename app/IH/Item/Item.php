<?php namespace IH\Item;

use IH\Core\Entity;
use IH\Item\ItemInterface;
use IH\Review\Review;
use IH\Category\Category;
use IH\Attribute\Attribute;

class Item extends Entity implements ItemInterface
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';

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
	 protected $fillable = array(
	 								'name',
	 								'brand',
	 								'manufacturer',
	 								'mpn',
	 								'sku',
	 								'asin',
	 								'upc',
	 								'isbn',
	 								'description'
	 	);

	 /**
	 * Model Validation Rules
	 *
	 * @return array of rules used for input sanitation and model validation
	 */
	 protected $validationRules = array(
	 	'name' => 'required', 
	 	'brand' => 'required',
	 	'manufacturer' => 'required',
	 	'mpn' => 'alpha_dash',
	 	'sku' => 'required|alpha_dash|unique:products',
	 	'asin' => 'alpha_num|unique:products',
	 	'upc' => 'alpha_num|unique:products',
	 	'isbn' => 'alpha_num|unique:products'
	 	);

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

	 /**
	 * Retrieve item attributes
	 * 
	 * @return collection of categories related to product
	 */
	 public function attributes()
	 {
	 	return $this->belongsToMany('Attribute','product_eav','product_id','product_attribute_id')->withPivot('id','value');
	 }
	 
	  /**
	 * Retrieve related items
	 * 
	 * @return collection of related items
	 */
	 public function relatedItems()
	 {
	 	//
	 }
	 
	  /**
	 * Retrieve tags
	 * 
	 * @return collection of tags
	 */
	 public function tags()
	 {
	 	//
	 }
	 

}
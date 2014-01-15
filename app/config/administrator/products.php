<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Products',

	'single' => 'product',

	'model' => 'Product',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'sku',
		'name',
		'brand',
		'attrib_link' => array(
			'title' => 'Edit Attributes',
			'select' => '(:table).id',
			'output' => '<a href="http://localhost/urb-bootstrap/admin/product_eav?product_id=(:value)" target="_blank">Edit/View Additional Attributes</a>'
			)
	),

	/*
	 * The editable fields
	 */
	'edit_fields' => array(
		'name',
		'brand',
		'manufacturer_part_no',
		'sku',
		'asin',
		'upc_isbn',
		'description' => array(
			'title'=>'Description',
			'type' =>'wysiwyg'
			),

	),
	'filters' => array(
		'name',
		'brand',
		'manufacturer_part_no',
		'sku'
	),
	/*
	* Form Width
	*/
	'form_width' =>800,
);
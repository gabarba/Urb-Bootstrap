<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Product EAV',

	'single' => 'product-eav',

	'model' => 'ProductEav',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'product_id' => array(
			'title' => 'SKU',
			'relationship' => 'product',
			'select' => '(:table).sku'
			),
		'product_attribute_id' => array(
			'title' =>'Attribute',
			'relationship' =>'attribute',
			'select' => '(:table).name'
			),
		'value'
	),

	/*
	 * The editable fields
	 */
	'edit_fields' => array(
		'product' => array(
			'type' => 'relationship',
			'title' => 'SKU',
			'name_field' => 'sku',
			'autocomplete' => true
			),
		'attribute' => array(
			'type' => 'relationship',
			'title' => 'Attribute',
			'name_field' => 'name',
			'autocomplete' => true
			),
		'value' => array(
			'title' => 'Value'
			),
	),
	'filters' => array(
		'product' => array(
			'type' => 'relationship',
			'relationship' => 'product',
			'name_field' => 'sku',
			'title' => 'Product SKU'
			)
		
		),
	'query_filter' => function($query)
	{
		if(Input::get('sku')) 
		{
			$sku = Input::get('sku');
			$product= Product::where('sku',$sku)->first();
			$produt_id = null;
			if($product)
			{
				$product_id = $product->id;
				$query->where('product_id',$product_id);
			}
			
		};
		if(Input::get('product_id')) 
		{
			$product_id = Input::get('product_id');
			$query->where('product_id',$product_id);	
		}
	},
	/*
	* Form Width
	*/
	'form_width' =>1000,
);
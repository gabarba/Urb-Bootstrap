<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Categories',

	'single' => 'category',

	'model' => 'Category',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name',
		'parent_cat_id',
		'status' => array(
			'title' => 'Status',
			'type' => 'bool'
			)
	),

	/*
	 * The editable fields
	 */
	'edit_fields' =>array(
		'id',
		'name',
		'description' => array(
			'type' => 'wysiwyg',
			'title' => 'Description'
			),
		'parent_cat_id',
		'products' => array(
			'title' => 'Products',
			'type' => 'relationship',
			'name_field' => 'sku'
			),
		'status' => array(
			'title' => 'Status',
			'type' => 'bool'
			)
	),
	'filters' => array(
		'name',
		'status' => array(
			'type' => 'bool',
			'title' => 'Status'
			)
	),
	/*
	* Form Width
	*/
	'form_width' =>800,
);
<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Flagged Reviews',

	'single' => 'Review',

	'model' => 'Review',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'user' => array(
			'type' => 'relationship',
			'relationship' => 'user',
			'title' => 'User',
			'select' => '(:table).email',
			),
		'product' => array(
			'type' => 'relationship', 
			'relationship' => 'product',
			'title' => 'Product',
			'select' => '(:table).sku',
			),
		'title',
		'rating' => array(
			'type' => 'number',
			'title' => 'Rating (Max 5)',
			),
		'status' => array(
			'type' => 'bool',
			'title' => 'Status'
			),
		'created_at' => array(
			'type' => 'datetime',
			'title' => 'Created At',
			),
	),

	/*
	 * The editable fields
	 */
	'edit_fields' => array(
		'id' => array(
			'type'=> 'key'
			),
		'user' => array(
			'type' => 'relationship',
			'title' => 'User',
			'name_field' => 'email',
			),
		'product' => array(
			'type' => 'relationship', 
			'title' => 'Product',
			'name_field' => 'sku'
			),
		'title',
		'rating' => array(
			'type' => 'number',
			'title' => 'Rating (Max 5)',
			),
		'pros' => array(
			'type'=>'textarea',
			'title' => 'Pros'
			),
		'cons' => array(
			'type'=>'textarea',
			'title' => 'Cons'
			),
		'summary' => array(
			'type'=>'textarea',
			'title' => 'Summary'
			),
		'flagged_for_review' => array(
			'type' => 'bool'
			),
		'bottom_line' => array(
			'type' => 'bool'
			),
		'reviewer_skill_level' => array(
			'type' => 'enum',
			'title' => 'Skill Level',
			'options' => array('1' => 'Beginner','2' => 'Intermediate','3' => 'Advance', '4' => 'Expert')
			),
		'time_with_product' => array(
			'type' => 'enum',
			'title' => 'Time with Product',
			'options' => array('1' => 'A Week or Less','2' => 'Over a Month', '3' => 'Over 6 Months', '4' => 'Over a Year')
			),
		'status' => array(
			'type' => 'bool'
			),

	),
	'filters' => array(
		'user' => array(
			'type' => 'relationship',
			'relationship' => 'user',
			'name_field' => 'email',
			'title' => 'User Email'
			),
		'product' => array(
			'type' => 'relationship',
			'relationship' => 'product',
			'name_field' => 'sku',
			'title' => 'Product SKU'
			),
		'rating' => array(
			'type' => 'number',
			'title' => 'Review Rating'
			),
		),
	'query_filter' => function($query)
		{
			$query->where('flagged_for_review',1);
		},
	/*
	* Form Width
	*/
	'form_width' =>800,
);
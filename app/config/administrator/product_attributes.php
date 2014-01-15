<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Product Attributes',

	'single' => 'Product Attribute',

	'model' => 'ProductAttributes',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name',
		'code',
		'visible_frontend' => array(
			'type' => 'bool',
			'title' => 'Visible Frontend'
			),
		'use_in_search' => array(
			'type' => 'bool',
			'title' => 'Use in Search'
			),
		'use_in_filter' => array(
			'type' => 'bool',
			'title' => 'Use in Filter'
			),
		'type' => array(
			'type' => 'enum',
			'title' => 'Type',
			'options' => array('int' => 'Integer', 'float' => 'Decimal', 'text' => 'Text', 'textarea' => 'Text Area', 'boolean' => 'Yes/No')
			),
	),

	/*
	 * The editable fields
	 */
	'edit_fields' => array(
		'id' => array(
			'type'=> 'key'
			),
		'name',
		'code',
		'visible_frontend' => array(
			'type' => 'bool',
			'title' => 'Visible Frontend'
			),
		'use_in_search' => array(
			'type' => 'bool',
			'title' => 'Use in Search'
			),
		'use_in_filter' => array(
			'type' => 'bool',
			'title' => 'Use in Filter'
			),
		'type' => array(
			'type' => 'enum',
			'title' => 'Type',
			'options' => array('int' => 'Integer', 'float' => 'Decimal', 'text' => 'Text', 'textarea' => 'Text Area', 'boolean' => 'Yes/No')
			)

	),
	'filters' => array(
		'name',
		'code',
		'use_in_search' => array(
			'type' => 'bool',
			'title' => 'Use in Search'
			),
		'use_in_filter' => array(
			'type' => 'bool',
			'title' => 'Use in Filter'
			),
		'type' => array(
			'type' => 'enum',
			'title' => 'Type',
			'options' => array('int' => 'Integer', 'float' => 'Decimal', 'text' => 'Text', 'textarea' => 'Text Area', 'boolean' => 'Yes/No')
			)
		),
	/*
	* Form Width
	*/
	'form_width' =>500,
);
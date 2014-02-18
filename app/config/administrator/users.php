<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Users',

	'single' => 'User',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'email',
		'first_name',
		'last_name',
		'activated',
		'last_login',
		),
	/*
	 * The editable fields
	 */
	'edit_fields' => array(
		'id' => array(
			'type'=> 'key'
			),
		'email',
		'first_name',
		'last_name',
		'password' => array(
			'type' => 'password',
			'title' => 'Password'
			),
		'activated' => array(
			'type' => 'bool',
			'title' => 'Activated'
			)

	),
	'filters' => array(
		'first_name',
		'last_name',
		'email',
		'activated' => array(
			'type' => 'bool',
			'title' => 'Activated'
			)
		),
	/*
	* Form Width
	*/
	'form_width' => 400,
);
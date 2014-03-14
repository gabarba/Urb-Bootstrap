<?php namespace IH\Core\Interfaces;

interface BaseRepositoryInterface 
{
	
	public function isValid();

	public function save(array $options);

	public function setErrors(MessageBag $errors);

	public function getErrors();

	public function getAll();

	public function getById();

	public function delete();

	public function where();


}
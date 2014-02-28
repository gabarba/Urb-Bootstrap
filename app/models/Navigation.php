<?php

class Navigation  {

	public static function getAttributeValues($attributeCode) 
	{
		return ProductAttributes::ReturnAllValues($attributeCode)->get();
	}
}
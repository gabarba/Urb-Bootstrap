<?php 


class Eyepieces extends Product {
/*
	protected  $appends = array(
			'ca_ep_focallength_bucket',
			'ca_ep_fov_bucket',
			'ca_ep_series_bucket',
			'manufacturer',
			'ca_ep_barrelsize'
		);
		*/
	// List of all eyepiece related attributes 
	protected static $eyepieceAttributes = array(
			'ca_ep_afov' => 'Apparent Field of View (Mfg Specified)',
			'ca_ep_afovmeasured' =>'Apparent Field of View (Measured)',
			'ca_ep_barrelsize'   => 'Barrel Size',
			'ca_ep_barrel_type'  => 'Barrel Type',
			'ca_ep_blackendlensedges' => 'Blackend Lens Edges',
			'ca_ep_boltcasesize' => 'Protective Plastic Storage Container Size',
			'ca_ep_coatings' => 'Coatings',
			'ca_ep_country' => 'Country of Manufacture',
			'ca_ep_design' => 'Optical Design', 
			'ca_ep_dim_height_witheg' =>'Height (With Eyeguard Extended',
			'ca_ep_dim_height_withouteg' => 'Height (Without Eyeguard)',
			'ca_ep_dim_maxwidth' => 'Maximum Width',
			'ca_ep_endcaps' => 'End Caps',
			'ca_ep_eyelensdiameter' => 'Eye Lens Diameter',
			'ca_ep_eyerelief_designed' => 'Eye Relief (Designed)',
			'ca_ep_eyerelief_useable' => 'Eye Relief (Useable)',
			'ca_ep_fieldstopdiameter' => 'Field Stop Diameter',
			'ca_ep_filterthreads' => 'Filter Threads',
			'ca_ep_focallength' => 'Focal Length',
			'ca_ep_focallength_bucket' => 'Focal Length (LN Bucket)',
			'ca_ep_focallength_sort' =>'Focal Length (for Sort)',
			'ca_ep_fov_bucket' => 'Eyepiece Field of View (LN Bucket)',
			'ca_ep_lenselements' =>'Lens Elements',
			'ca_ep_lensgroup' => 'Lens Groups',
			'ca_ep_parfocal' => 'Parfocal',
			'ca_ep_pnumber' => 'P-Number',
			'ca_ep_rubbereyeguard' => 'Rubber Eye Guard',
			'ca_ep_series' => 'Eyepiece Series',
			'ca_ep_series_bucket' => 'Eyepiece Series (LN Bucket)',
			'ca_ep_warranty' => 'Warranty',
			'ca_ep_weight' => 'Weight'
		);

	protected static $eyepieceAttributesForFilter = array(
			'ca_ep_focallength_bucket',
			'ca_ep_fov_bucket',
			'ca_ep_series_bucket',
			'manufacturer',
			'ca_ep_barrelsize'
		);
	public function scopeEyepieces($query)
	{
		$query->whereHas('categories', function($q)
		{
			$q->where('name','Eyepieces');
		});
		return $query;
	}
	public static function getEyepieceAttributesForFilter() 
	{
		return self::$eyepieceAttributesForFilter;
	}

	public static function getEyepieceAttributes() 
	{
		return self::$eyepieceAttributes;
	}

	public function withAttributes(array $attributes = array())
	{
		if(!Cache::has($this->id.'_eyepiece_attributes')) 
		{
			foreach($attributes as $key) 
			{
				$this->setRelation($key,$this->getAttributeValueByCode($key));
			}
			Cache::forever($this->id.'_eyepiece_attributes',$this->getRelations());
		}else {
			$this->setRelations(Cache::get($this->id.'_eyepiece_attributes'));
		}
		
	
	}
	public function toArray()
	{
		$attributes = $this->attributesToArray();

		return array_merge($attributes, $this->relationsToArray(),$this->relations);
	}
/*
	public function getCaEpAfovAttribute() 
	{
		return $this->getAttributeValueByCode('ca_ep_afov');
	}
	*/
}
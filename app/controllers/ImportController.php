<?php 

class ImportController extends BaseController {

	protected $_importPath = 'J:\wamp\www\Urb-Bootstrap\app\storage\csv_import\\';

	public function getIndex()
	{
		$hasFile = false;
       return View::make('admin.import.index')->with('hasFile',$hasFile);

	}

	public function postIndex() 
	{

    	//Set execution timeout 
    	set_time_limit(0);
    	ini_set('memory_limit','500M');
    	$hasFile = Input::hasFile('csv_import');
    	//$hasFile = true;
    	$delimiter = Input::get('delimiter','^');
    	$enclosure = Input::get('enclosure','|');

    	if($hasFile) {
    		$file = Input::file('csv_import');
    		$fileName = $file->getClientOriginalName();
    		//$fileName = 'test_import.csv';
    		//$extension = $file->getCientOriginaExtension();

    		$file->move($this->_importPath,$fileName);
    		$hasFile = $fileName;

    		$csvFile = new Keboola\Csv\CsvFile($this->_importPath.$fileName,$delimiter,$enclosure);

            $errors = array();

            // get attribute codes for all product attributes
            $attributes = array_merge(
	            			App::make('Product')->returnFillable(), // get core product attributes
	            			ProductAttributes::all()->lists('code') // get eav product attributes
            			); 

            $productAttributes = App::make('Product')->returnFillable();
            $productEavAttributes = ProductAttributes::all()->lists('code');

            $productEavAttributesIdAssoc = ProductAttributes::all(array('id','code'))->toArray();

            $csvHeader = array();
            $importArray = array();
            $csvAssocArray = array();

            foreach($csvFile as $key =>$row) {
            	if($key == 0) {
            		$csvHeader = $row;
            		$csvAssocArray = array_flip($row);
            	} else {
            		
            		$data = array();
            		$i = 0;
            		foreach($csvAssocArray as $key => $value) {
            			$data[$key] = $row[$i];
            			$i++;
            		}
                    $product = Product::where('sku',$data['sku'])->first();

                    if($product) 
                    {
                        $product->fill($this->array_key_whitelist($data,$productAttributes));
                        $product->updateUniques();

                        $this->save_product_eav($this->array_key_whitelist($data,$productEavAttributes), $product->id, $productEavAttributesIdAssoc);
                    }
                    /*
            		$importArray[] = array(
                                'product'  => $this->array_key_whitelist($data,$productAttributes),
                                'product_eav'  => $this->array_key_whitelist($data,$productEavAttributes),
                        );
                        */
                    else {
                        $importArray[] =  $this->array_key_whitelist($data,$productAttributes);
                    }
                    
            	}

            }
			$insertChunkedArray = array_chunk($importArray,50,true);

            foreach($insertChunkedArray as $dataArray) {
                Product::insert($dataArray);
            }
			//Product::insert($importArray);
            return Redirect::route('admin_page', array('page' => 'admin.import.index'))->with('hasFile', $hasFile);
			//return View::make('admin.import.index')->with('hasFile',$hasFile);
        }


	}


    public function array_key_whitelist($array, $whitelist = array()) 
    {
        return array_intersect_key($array, array_flip($whitelist));   
    }

   public function save_product_eav($product_eav, $product_id, $attribute_code_id) 
   {
        $dataImport = array();
        $attributeIds = $this->product_code_id_assoc($attribute_code_id);
        foreach(array_filter($product_eav) as $key => $value) 
        {

            $eav = ProductEav::where('product_id',$product_id)->where('product_attribute_id',$attributeIds[$key])->first();

            if($eav) {
                $eav->value = $value;
                $eav->save();
            } else {
                $dataImport[] = array(
                    'product_id' => $product_id,
                    'product_attribute_id' => $attributeIds[$key],
                    'value' => $value
                );
            }
        }
       if(!empty($dataImport)) 
       {
        ProductEav::insert(array_filter($dataImport));
       }
        
   }

   public function product_code_id_assoc($array)
   {    
    $assocArray = array();
    foreach($array as $item) 
    {
        $assocArray[$item['code']] = $item['id'];
    }
    return $assocArray;
   }
}
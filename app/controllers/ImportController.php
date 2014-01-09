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
	            			Product::find(1)->returnFillable(), // get core product attributes
	            			ProductAttributes::all()->lists('code') // get eav product attributes
            			); 

            $productAttributes = Product::find(1)->returnFillable();
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
                        $product->save();
                    }
                    /*
            		$importArray[] = array(
                                'product'  => $this->array_key_whitelist($data,$productAttributes),
                                'product_eav'  => $this->array_key_whitelist($data,$productEavAttributes),
                        );
                        */
                    $importArray[] =  $this->array_key_whitelist($data,$productAttributes);
            	}

            }
				
			Product::insert($importArray);
			return View::make('admin.import.index')->with('hasFile',$hasFile);
        }


	}


    public function array_key_whitelist($array, $whitelist = array()) 
    {
        return array_intersect_key($array, array_flip($whitelist));   
    }

}
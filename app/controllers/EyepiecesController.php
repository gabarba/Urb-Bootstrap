<?php 


class EyepiecesController extends BaseController {

	protected $eyepieceCollection = null; 

	public function index()
        {
        	// Retrieve all products within the Eyepiece Category

            $attributes = Input::only(Eyepieces::getEyepieceAttributesForFilter());
                        
                var_dump($attributes);
            $eyepieces = Product::Eyepieces()->FilterByAttributes(array_filter($attributes))->paginate(20);
            return \View::make('products.index')->with('products', $eyepieces)->with('attributes',$attributes);
        }
 
        public function show($product)
        {
            if(is_numeric($product)) 
            {
                return \View::make('products.show')->with('product',Product::with('attributes.attribute')->where('id',$product)->first());   
            } else 
            {
                return \View::make('products.show')->with('product',Product::with('attributes.attribute')->where('sku',$product)->first());   
            }
                      
        }
 
        public function create()
        {
                return \View::make('admin.products.create');
        }
 
        public function store()
        {
                $Product = new Product;              
                
                if($Product->save()) 
                {
                    return Redirect::route('admin.products.edit', $Product->id);
                }
                    return Redirect::route('admin.products.create')->withErrors($Product->errors()->all());   
                
        }
 
        public function edit($id)
        {
                return \View::make('admin.products.edit')->with('product', Product::find($id));
        }
 
        public function update($id)
        {
                $Product = Product::find($id);
                /*
                $Product->name = Input::get('name');
                $Product->brand = Input::get('brand');
                $Product->manufacturer_part_no = Input::get('manufacturer_part_no');
                $Product->sku = Input::get('sku');
                $Product->asin = Input::get('asin');
                $Product->upc_isbn = Input::get('upc_isbn');
                $Product->description = Input::get('description');
                */

                if($Product->updateUniques()) 
                {
                    return Redirect::route('admin.products.index');
                }
                    return Redirect::route('admin.products.edit',$Product->id)->withErrors($Product->errors()->all());   
        }
 
        public function destroy($id)
        {
                $Product = Product::find($id);
                $Product->delete();
 
                return Redirect::route('admin.products.index');
        }
}
<?php namespace App\Controllers;
 
use App\Models\Product;
use Input, Redirect, Sentry, Str;
 
class ProductsController extends \BaseController {
 
        public function index()
        {
                if (Sentry::check()) 
                {
                        return \View::make('admin.products.index')->with('products', Product::all());
                }
                else 
                {
                        return \View::make('products.index')->with('products', Product::all());
                }
                
        }
 
        public function show($id)
        {
                if (Sentry::check()) 
                {
                        return \View::make('products.show')->with('product', Product::find($id));
                }
                else 
                {
                       return \View::make('admin.products.show')->with('product', Product::find($id));
                }
                
        }
 
        public function create()
        {
                return \View::make('admin.products.create');
        }
 
        public function store()
        {
                $Product = new Product;
                $Product->name = Input::get('name');
                $Product->brand = Input::get('brand');
                $Product->manufacturer_part_no = Input::get('manufacturer_part_no');
                $Product->sku = Input::get('sku');
                $Product->asin = Input::get('asin');
                $Product->upc_isbn = Input::get('upc_isbn');
                $Product->description = Input::get('description');
                $Product->save();
 
                return Redirect::route('admin.products.edit', $Product->id);
        }
 
        public function edit($id)
        {
                return \View::make('admin.products.edit')->with('product', Product::find($id));
        }
 
        public function update($id)
        {
                $Product = Product::find($id);
                $Product->name = Input::get('name');
                $Product->brand = Input::get('brand');
                $Product->manufacturer_part_no = Input::get('manufacturer_part_no');
                $Product->sku = Input::get('sku');
                $Product->asin = Input::get('asin');
                $Product->upc_isbn = Input::get('upc_isbn');
                $Product->description = Input::get('description');
                $Product->save();
                

                return Redirect::route('admin.products.edit', $Product->id);
        }
 
        public function destroy($id)
        {
                $Product = Product::find($id);
                $Product->delete();
 
                return Redirect::route('admin.products.index');
        }
 
}
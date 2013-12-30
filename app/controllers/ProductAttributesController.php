<?php namespace App\Controllers;
 
use App\Models\ProductAttributes;
use Input, Redirect, Sentry, Str;
 
class ProductAttributesController extends \BaseController {
 
        public function index()
        {
                return \View::make('admin.product_attributes.index')->with('attributes', ProductAttributes::all());
        }
 
        public function show($id)
        {
                return \View::make('admin.product_attributes.show')->with('attribute', ProductAttributes::find($id));
        }
 
        public function create()
        {
                return \View::make('admin.product_attributes.create');
        }
 
        public function store()
        {
                $ProductAttribute = new ProductAttributes;
                $ProductAttribute->name = Input::get('name');
                $ProductAttribute->code = Input::get('code');
                $ProductAttribute->visible_frontend = Input::get('visible_frontend');
                $ProductAttribute->use_in_search = Input::get('use_in_search');
                $ProductAttribute->use_in_filter = Input::get('use_in_filter');
                $ProductAttribute->type = Input::get('type');
                $ProductAttribute->save();

                return Redirect::route('admin.product-attributes.index');
        }
 
        public function edit($id)
        {
                return \View::make('admin.product_attributes.edit')->with('attribute', ProductAttributes::find($id));
        }
 
        public function update($id)
        {
                $ProductAttribute = ProductAttributes::find($id);
                $ProductAttribute->name = Input::get('name');
                $ProductAttribute->code = Input::get('code');
                $ProductAttribute->visible_frontend = Input::get('visible_frontend');
                $ProductAttribute->use_in_search = Input::get('use_in_search');
                $ProductAttribute->use_in_filter = Input::get('use_in_filter');
                $ProductAttribute->type = Input::get('type');
                $ProductAttribute->save();
                
                //Notification::success('The ProductAttributes was saved.');

                return Redirect::route('admin.product-attributes.index');
        }
 
        public function destroy($id)
        {
                $ProductAttribute = ProductAttributes::find($id);
                $ProductAttribute->delete();
 
                return Redirect::route('admin.product-attributes.index');
        }
 
}
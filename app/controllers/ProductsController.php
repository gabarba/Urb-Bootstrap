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
                        return \View::make('products.show')->with('page', Page::find($id));
                }
                else 
                {
                       return \View::make('admin.products.show')->with('page', Page::find($id));
                }
                
        }
 
        public function create()
        {
                return \View::make('admin.products.create');
        }
 
        public function store()
        {
                $page = new Product;
                $page->title = Input::get('title');
                $page->slug = Str::slug(Input::get('title'));
                $page->content = Input::get('content');
                $page->user_id = Sentry::getUser()->id;
                $page->save();
 
                return Redirect::route('admin.products.edit', $page->id);
        }
 
        public function edit($id)
        {
                return \View::make('admin.products.edit')->with('page', Page::find($id));
        }
 
        public function update($id)
        {
                $page = Page::find($id);
                $page->title = Input::get('title');
                $page->slug = Str::slug(Input::get('title'));
                $page->content = Input::get('content');
                $page->user_id = Sentry::getUser()->id;
                $page->save();
                
                //Notification::success('The page was saved.');

                return Redirect::route('admin.products.edit', $page->id);
        }
 
        public function destroy($id)
        {
                $page = Page::find($id);
                $page->delete();
 
                return Redirect::route('admin.products.index');
        }
 
}
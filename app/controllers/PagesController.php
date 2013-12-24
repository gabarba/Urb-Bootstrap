<?php namespace App\Controllers;
 
use App\Models\Page;
use Input, Redirect, Sentry, Str;
 
class PagesController extends \BaseController {
 
        public function index()
        {
                return \View::make('admin.pages.index')->with('pages', Page::all());
        }
 
        public function show($id)
        {
                return \View::make('pages.show')->with('page', Page::find($id));
        }
 
        public function create()
        {
                return \View::make('admin.pages.create');
        }
 
        public function store()
        {
                $page = new Page;
                $page->title = Input::get('title');
                $page->slug = Str::slug(Input::get('title'));
                $page->content = Input::get('content');
                $page->meta_title = Input::get('meta_title');
                $page->meta_description = Input::get('meta_description');
                $page->meta_keywords = Input::get('meta_keywords');
                $page->status = Input::get('status');
                $page->user_id = Sentry::getUser()->id;
                $page->save();

                return Redirect::route('admin.pages.edit', $page->id);
        }
 
        public function edit($id)
        {
                return \View::make('admin.pages.edit')->with('page', Page::find($id));
        }
 
        public function update($id)
        {
                $page = Page::find($id);
                $page->title = Input::get('title');
                $page->slug = Str::slug(Input::get('title'));
                $page->content = Input::get('content');
                $page->meta_title = Input::get('meta_title');
                $page->meta_description = Input::get('meta_description');
                $page->meta_keywords = Input::get('meta_keywords');
                $page->status = Input::get('status');
                $page->user_id = Sentry::getUser()->id;
                $page->save();
                
                //Notification::success('The page was saved.');

                return Redirect::route('admin.pages.edit', $page->id);
        }
 
        public function destroy($id)
        {
                $page = Page::find($id);
                $page->delete();
 
                return Redirect::route('admin.pages.index');
        }
 
}
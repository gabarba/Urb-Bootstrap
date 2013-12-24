@extends('admin.layouts.base')
 
@section('content')
 
        <h2>Edit page</h2>
 
        {{ Form::model($page, array('method' => 'put', 'route' => array('admin.pages.update', $page->id))) }}
 
                 <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title',null,array('class'=>'form-control')) }}
                </div>
                
                <div class="form-group">
                        {{ Form::label('content', 'Content') }}
                        {{ Form::textarea('content',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('meta_title', 'Meta Title') }}
                        {{ Form::text('meta_title',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('meta_description', 'Meta Description') }}
                        {{ Form::text('meta_description',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('meta_keywords', 'Meta Keywords') }}
                        {{ Form::text('meta_keywords',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('status', 'Publish') }}
                        {{ Form::checkbox('status',1,true) }}
                </div>
                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.pages.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop
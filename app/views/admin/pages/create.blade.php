@extends('admin.layouts.base')
 
@section('content')
 
        <h2>Create new page</h2>
 
        {{ Form::open(array('route' => 'admin.pages.store')) }}
 
                <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title',null,array('class'=>'form-control')) }}
                </div>
 
                <div class="form-group">
                        {{ Form::label('content', 'Content') }}
                        {{ Form::textarea('content',null,array('class'=>'form-control')) }}
                </div>
 
                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.pages.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop
@extends('admin.layouts.base')

@section('content')
<div class="row">
	<div id="login" class="login col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                {{ Form::open() }}
 
                        @if ($errors->has('login'))
                                <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
                        @endif
 
                        <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email',null,array('class' =>'form-control') ) }}
                              
                        </div>
 
                        <div class="form-group">
                                {{ Form::label('password', 'Password') }}
                                {{ Form::password('password',array('class'=>'form-control')) }}
                        </div>
 
                        <div class="form-actions">
                                {{ Form::submit('Login', array('class' => 'btn btn-default pull-right')) }}
                        </div>
 
                {{ Form::close() }}
        </div>
 </div>
@stop
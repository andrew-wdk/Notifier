@extends('adminlte::page')
@section('name','Users')
@section('content_header')
<h1>Users</h1>

@stop
@section('content')


{{ Form::open(['route' => ['users.update',$resource->id],'method' => 'PATCH','enctype'=>'multipart/form-data']) }}
{{ Form::hidden('resource_id',$resource->id,['id'=>'resource_id','class' => 'form-control']) }}

<div class="row">

    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="name">
                            <span class="text-danger">*</span>
                            Name
                        </label>
                        {{ Form::text('name',$resource->name,['id'=>'name','required' => 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('name') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="email">
                            <span class="text-danger">*</span>
                            Email
                        </label>
                        {{ Form::text('email',$resource->email,['id'=>'email','required' => 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('email') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="password">
                            Password
                        </label>
                        {{ Form::text('password',null,['id'=>'password','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('password') }}</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2 col-xs-4">
                        <button type="submit" class="btn btn-block btn-primary">
                            Save
                        </button>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <button type="reset" class="btn btn-block btn-default">
                            Reset
                        </button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


</div>





@stop

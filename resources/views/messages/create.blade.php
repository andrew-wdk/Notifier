@extends('adminlte::page')
@section('title','Messages')
@section('content_header')
<h1>Messages</h1>

@stop
@section('content')

{{ Form::open(['route' => 'messages.store']) }}
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="title">
                            <span class="text-danger">*</span>
                            Title
                        </label>
                        {{ Form::text('title',old('title'),['id'=>'title','required' => 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('title') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="body">
                            <span class="text-danger">*</span>
                            Body
                        </label>
                        {{ Form::text('body',old('body'),['id'=>'body','required' => 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('body') }}</p>
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

@extends('adminlte::page')
@section('title','Recipients')
@section('content_header')
<h1>Recipients</h1>

@stop
@section('content')


{{ Form::open(['route' => 'recipients.store']) }}
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
                        {{ Form::text('name',old('name'),['id'=>'name','required' => 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('name') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="phone_number">
                            <span class="text-danger">*</span>
                            Phone number
                        </label>
                        {{ Form::text('phone_number',old('phone_number'),['id'=>'phone_number','required' => 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('phone_number') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="last_contacted">
                        <span class="text-danger">*</span>
                        Last contacted
                    </label>
                    {{ Form::text('last_contacted',old('last_contacted'),['id'=>'last_contacted','required' => 'required','class' => 'form-control']) }}
                    <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('last_contacted') }}</p>
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

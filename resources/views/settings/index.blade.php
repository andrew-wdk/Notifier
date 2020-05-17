@extends('adminlte::page')
@section('title','WhatsApp Settings')
@section('content_header')
<h1>WhatsApp Settings</h1>

@stop
@section('content')


{{ Form::open(['route' => 'settings.update']) }}
<div class="row">

    <div class="col-md-12">

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="sender_number">
                            Sender phone number
                        </label>
                        {{ Form::text('sender_number',$settings->sender_number ?? '',['id'=>'sender_number','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('sender_number') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="access_token">
                            Access token
                        </label>
                        {{ Form::text('access_token',$settings->access_token ?? '',['id'=>'access_token','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('access_token') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="email">
                            Admin's Email
                        </label>
                        {{ Form::text('email',$settings->email ?? '',['id'=>'email','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('email') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="send_at">
                            Hour at which messages are sent
                        </label>
                        {{ Form::text('send_at',$settings->send_at ?? '',['id'=>'send_at','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('send_at') }}</p>
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

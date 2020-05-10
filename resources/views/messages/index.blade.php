@extends('adminlte::page')
@section('title','Messages')
@section('content_header')
<h1>Messages</h1>

@stop
@section('content')
<div class="row">

    <div class="col-xs-12 col-md-12">

        <a href="{{ route('messages.create') }}" class="btn btn-block btn-primary">
            Add new
        </a>
        <br>

        <div class="box">
            <div class="box-body">

                <table id="tbl-list-users" data-server="false" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{$message->id}}</td>
                            <td>{{$message->title}}</td>
                            <td>{{$message->body}}</td>
                            <td>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <a class="btn btn-block btn-primary " style="width: 74.5px;"
                                            href="{{ route('messages.edit',$message->id) }}">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::open(['route' => ['messages.destroy',$message->id] ,'method' => 'DELETE' ,'class' => 'delete-form']) }}
                                        <button type="submit" style="width: 74.5px;" class="btn btn-block btn-danger ">
                                            Delete
                                        </button>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

@stop

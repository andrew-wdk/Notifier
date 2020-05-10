@extends('adminlte::page')
@section('title','Recipients')
@section('content_header')
<h1>Recipients</h1>

@stop
@section('content')
<div class="row">

    <div class="col-xs-12 col-md-12">

        <a href="{{ route('recipients.create') }}" class="btn btn-block btn-primary">
            Add new
        </a>
        <br>

        <div class="box">
            <div class="inqueries margin-bottom10">
                {{ $recipients->links() }}
            </div>

            <div class="box-body">

                <table id="tbl-list-users" data-server="false" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Last contacted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipients as $recipient)
                        <tr>
                            <td>{{$recipient->id}}</td>
                            <td>{{$recipient->name}}</td>
                            <td>{{$recipient->phone_number}}</td>
                            <td>{{$recipient->last_contacted}}</td>
                            <td>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <a class="btn btn-block btn-primary " style="width: 74.5px;"
                                            href="{{ route('recipients.edit',$recipient->id) }}">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::open(['route' => ['recipients.destroy',$recipient->id] ,'method' => 'DELETE' ,'class' => 'delete-form']) }}
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

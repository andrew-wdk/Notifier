@extends('adminlte::page')
@section('title','Sent')
@section('content_header')
<h1>Sent</h1>

@stop
@section('content')
<div class="row">

    <div class="col-xs-12 col-md-12">

        <div class="box">
            <div class="inqueries margin-bottom10">
                {{ $sent->links() }}
            </div>

            <div class="box-body">

                <table id="tbl-list-users" data-server="false" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Recipient name</th>
                            <th>Date</th>
                            <th>Status code</th>
                            <th>Delivery info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sent as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->recipient->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->status_code}}</td>
                            <td>{{$item->delivery_report ?? ''}}</td>
                            <td>
                                <div class="col-md-6">
                                    {{ Form::open(['route' => ['sent.destroy',$item->id] ,'method' => 'DELETE' ,'class' => 'delete-form']) }}
                                    <button type="submit" style="width: 74.5px;" class="btn btn-block btn-danger ">
                                        Delete
                                    </button>
                                    {{ Form::close() }}
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

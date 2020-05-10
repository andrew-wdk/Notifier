@extends('adminlte::page')
@section('title','Users')
@section('content_header')
<h1>Users</h1>

@stop
@section('content')
<div class="row">

    <div class="col-xs-12 col-md-12">

        <a href="{{ route('users.create') }}" class="btn btn-block btn-primary">
            Add new
        </a>
        <br>

        <div class="box">
            <div class="box-body">

                <table id="tbl-list-users" data-server="false" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <a class="btn btn-block btn-primary " style="width: 74.5px;"
                                            href="{{ route('users.edit',$user->id) }}">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::open(['route' => ['users.destroy',$user->id] ,'method' => 'DELETE' ,'class' => 'delete-form']) }}
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

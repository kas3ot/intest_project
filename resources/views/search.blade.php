@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Users</h3>
            </div>
            <div class="panel-body">
                <h4>Search for users</h4>
                <div id="custom-search-input">
                    <a href="/register" class="btn btn-success btn-lg pull-right">Register</a>
                    {{  Form::open( array('url'=>'/search','method'=>'get') )  }}
                    <div class="input-group col-md-10">
                        {{ Form::text('search', null , array('class' => 'form-control input-lg', 'placeholder'=>'Search')) }}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($search as $a)
                    <tr>
                        <td> {{$a->id}}  </td>
                        <td> {{$a->name}}  </td>
                        <td> {{$a->firstname}}  </td>
                        <td> {{$a->email}}  </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
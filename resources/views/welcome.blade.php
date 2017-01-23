@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if (session()->has('flash_notification.message'))
                    <div id="hide" class="alert alert-{{ session('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" onclick='hide()' aria-hidden="true">&times;</button>

                        {!! session('flash_notification.message') !!}
                    </div>
                @endif

                <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Users</h3>
            </div>
            <div class="panel-body">
                <h4>Search for users</h4>
                <div id="custom-search-input">
                    <a href="/register" class="btn btn-success btn-lg pull-right">Register</a>
                    {{  Form::open( array('url'=>'/searchfor','method'=>'get') )  }}
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
                    @if(Auth::check())<th></th>@endif
                    @if(Auth::check())<th></th>@endif
                </tr>
                </thead>
                <tbody>
                @foreach($all as $a)
                    <tr>
                        <td> {{$a->id}} </td>   
                        <td> {{$a->name}}  </td>
                        <td> {{$a->firstname}}  </td>
                        <td> {{$a->email}}  </td>
                       @if(Auth::check()) <td>  <a href="/edit/{{ $a->id }}" class="btn btn-info">Edit</a> @endif</td>
                       @if(Auth::check()) <td>  <a href="/delete/{{ $a->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
           
        
    </div>
</div>
@endsection

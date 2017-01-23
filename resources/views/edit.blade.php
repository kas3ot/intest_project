@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="panel panel-default">
           
            <div class="panel-body">
                   {!! Form::open(array('action' => 'UserController@update', 'method' => 'post', 'class' =>'form-horizontal')) !!}

                    <fieldset>
                        
                        <!-- hidden input -->
                            {!! Form::hidden('id', $user->id) !!}
                        <!-- hidden input -->
                        <!-- First Name Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="First Name">First Name</label>
                            <div class="col-md-4">
                                {{ Form::text('firstname',$user->firstname,array('class'=>'form-control input-md','placeholder'=>'First Name', 'id'=>'First Name')) }}
                            </div>
                        </div>

                        <!-- Name Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name">Name</label>
                            <div class="col-md-4">
                                {!! Form::text('name',$user->name,array('class'=>'form-control input-md','placeholder'=>'Name', 'id'=>'Name')) !!}
                            </div>
                        </div>

                        <!-- Email Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email">Email</label>
                            <div class="col-md-4">
                                {!! Form::email('email',$user->email,array('class'=>'form-control input-md','placeholder'=>'Email', 'id'=>'Email')) !!}
                            </div>
                        </div>

                        <!-- Multiple Radios -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Gender">Gender</label>
                            <div class="col-md-4">
                                <div class="radio">
                                    <label for="radios-0">
                                        {{ Form::radio('gender', 'male', $user->gender, array('id'=>'radios-0', 'checked')) }}
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radios-1">
                                        {{ Form::radio('gender', 'female', $user->gender, array('id'=>'radios-1')) }}
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="usergroup">User Group</label>
                            <div class="col-md-4">
                                <select id="usergroup" name="usergroup" class="form-control" onchange="show();">
                                    @if($user->usergroup == "standard")
                                        <option selected="selected" value="premium">Standard</option>
                                        <option value="premium">Premium</option>
                                        <option value="unlimited">Unlimited</option>
                                    @elseif($user->usergroup == "premium")
                                        <option selected="selected" value="premium">Premium</option>
                                        <option value="standard">Standard</option>
                                        <option value="unlimited">Unlimited</option>
                                    @else
                                        <option selected="selected" value="unlimited">Unlimited</option>
                                        <option value="standard">Standard</option>
                                         <option value="premium">Premium</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <!-- Standard User -->
                        <div id="standard">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="address">Address</label>
                                <div class="col-md-4">
                                    {!! Form::text('address',$user->address,array('class'=>'form-control input-md','placeholder'=>'Address', 'id'=>'address')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="age">Age</label>
                                <div class="col-md-4">
                                    {!! Form::text('age',$user->age,array('class'=>'form-control input-md','placeholder'=>'Age', 'id'=>'age')) !!}
                                </div>
                            </div>
                            <label class="col-md-4 control-label" for="newsletters">News Letters</label>
                            <div class="col-md-8" style="padding-right:50%;">
                                <div class="checkbox">
                                    <label for="checkboxes-0">
                                        {{ Form::checkbox('newsletters[0]', 'zeri') }}
                                        Zeri
                                    </label>
                                </div>
                                <div class="checkbox" style="padding-bottom:10%;">
                                    <label for="checkboxes-1">
                                        {{ Form::checkbox('newsletters[1]', 'Koha Ditore') }}
                                        Koha Ditore
                                    </label>
                                </div>
                            </div>
                        </div><!-- End Standrad User -->

                        <!-- Premium User -->
                        <div id="premium">
                            <label class="col-md-4 control-label" for="durationofregistration">Duration of registration</label>
                            <div class="col-md-8" style="padding-right:50%; padding-bottom:2%;">
                                <div class="checkbox">
                                    <label for="checkboxes-0">
                                        {{ Form::checkbox('duration[0]', '3 Month') }}
                                        3 Month
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-1">
                                        {{ Form::checkbox('duration[1]', '6 Month') }}
                                        6 Month
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-1">
                                        {{ Form::checkbox('duration[3]', '12 Month') }}
                                        12 Month
                                    </label>
                                </div>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="premium_note">Note</label>
                                <div class="col-md-4">
                                    {!! Form::textarea('note',$user->note,array('class'=>'form-control','placeholder'=>'Note', 'id'=>'premium_note')) !!}
                                </div>
                            </div>
                        </div><!-- End Premium User -->

                        <!-- Unlimited User -->
                        <div id="unlimited">
                            <label class="col-md-4 control-label" for="hobbies">Hobbies</label>
                            <div class="col-md-8" style="padding-right:50%; padding-bottom:2%;">
                                <div class="checkbox">
                                    <label for="checkboxes-0">
                                        {{ Form::checkbox('hobbies[0]', 'football') }}
                                        Football
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-1">
                                        {{ Form::checkbox('hobbies[1]', 'tennis') }}
                                        Tennis
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-1">
                                        {{ Form::checkbox('hobbies[2]', 'volleyball') }}
                                        Volleyball
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="bank">Bank</label>
                                <div class="col-md-4">
                                    {!! Form::textarea('bank',$user->bank,array('class'=>'form-control','placeholder'=>'Bank', 'id'=>'bank')) !!}
                                </div>
                            </div>
                        </div><!-- End Unlimited User -->

                        <!-- Button -->
                        <div class="form-group control-label">
                            <div class="col-md-8">
                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Register</button>
                            </div>
                        </div>

                    </fieldset>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
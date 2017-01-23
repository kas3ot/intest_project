<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\registred;

use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function destroy($id){
    	$user = registred::findorfail($id);
    	$user->forceDelete();
    	flash('User '. $user->fistname .' is deleted', 'success');
    	return redirect('/');
    }

    public function edit($id){
    	$user = registred::findorfail($id);
    	return view('edit', compact('user'));
    }

    public function update(){
    	$all = Input::all();
        $id = $all['id'];
        $user = registred::findorfail($id);

        $user->firstname = $all['firstname'];
        $user->name = $all['name'];
        $user->email = $all['email'];
        $user->gender = $all['id'];
        $user->usergroup = $all['usergroup'];
        $user->address = $all['address'];
        if(isset($all['newsletters'])){
            $news = implode(', ', $all['newsletters']);
            $user->newsletters = $news;
        }
        if(isset($all['duration'])){
            $userduration = implode(', ', $all['duration']);
            $user->duration = $userduration;
        }
        $user->note = $all['note'];
        if(isset($all['hobbies'])){
            $userhobbies = implode(', ', $all['hobbies']);
            $user->hobby = $userhobbies;
        }
        $user->bank = $all['bank'];

        $user->save();

        flash('User is updated', 'success');
        return redirect('/');
    }

}

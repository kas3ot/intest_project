<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\registred;

class RegisterController extends Controller
{
     public function register(Request $request){

        $user = new registred();
        $user->firstname = $request->firstname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->usergroup = $request->usergroup;
        if(!isset($request->usergroup)){
            flash('Please select a user group', 'danger');
            return redirect('/register');
        }
        if($request['usergroup'] == 'standard'){

            $user->address = $request->standard_address;
            $user->age = $request->age;
            if(isset($request->newsletters)) {
                $news = implode(', ', $request->newsletters);
                $user->newsletters = $news;
            }
            $user->save();
            flash('User is registred', 'success');
            return redirect('/');

        }else if($request['usergroup'] == 'premium'){
            $user->address = $request->premium_addres;
            if(isset($request->durationofregistration)) {
                $user->duration = implode(', ', $request->durationofregistration);
            }
            $user->note = $request->premium_note;
            $user->save();
            flash('User is registred', 'success');
            return redirect('/');

        }else if($request['usergroup'] == 'unlimited') {
            if(isset($request->hobbies)) {
                $user->hobby = implode(', ', $request->hobbies);
            }
            $user->bank = $request->bank;
            $user->note = $request->Unlimited_note;
            $user->save();
            flash('User is registred', 'success');
            return redirect('/');

        }

    }
}

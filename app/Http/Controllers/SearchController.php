<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\registred;

class SearchController extends Controller
{
    public function search(){
    	$all = reguistred::all();
    	return view('welcom')->with('search', $all);
    }

    public function searchfor(){
        $search = \Request::get('search');
        $words = explode(' ', $search);

        $data = null;
        if(sizeof($words)>1){
            $firstword = $words[0];
            $lastword = $words[1];
            $data = registred::where('name', 'LIKE', '%' . $lastword . '%')
                ->Where('firstname', 'LIKE', '%' . $firstword . '%')
                ->get();
        }else{
            $data = registred::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('firstname', 'LIKE', '%' . $search . '%')
                ->get();
        }
        return view('searchfor')->with('search', $data);
    }
}

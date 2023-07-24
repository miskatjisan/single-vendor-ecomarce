<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdmindashbroadController extends Controller
{
    //
    public function users(){
        $users=User::all();
        return view('admin.users.index',compact('users'));

    }
    public function viewusers($id){
        $users=User::find($id);
        return view('admin.users.view',compact('users'));

    }
}

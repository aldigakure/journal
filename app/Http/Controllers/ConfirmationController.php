<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index(){
        $users=User::where('email', '!=', 'admin@gmail.com')->whereDoesntHave('teacher')->paginate(8);
        
        return view('authenticated.admin.confirmation.index', compact('users'));
    }
    
    public function accept($id){
        $user=User::findOrFail($id);
        // Teacher::create([
        //     'user_id' =>$user->id,
        //     'nip' =>
        // ])
    }
}

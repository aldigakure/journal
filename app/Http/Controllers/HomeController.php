<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole(RoleEnum::ADMIN->value)) {
            return to_route('admin.dashboard');
        }else if (auth()->user()->hasRole(RoleEnum::TEACHER->value)){
            return to_route('teacher.dashboard');
        } else {
            return to_route('waiting-confirmation');
        }
       
    }
}

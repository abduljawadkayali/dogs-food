<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(["index", "NotLogin"]);
        //$this->middleware('isAdmin')->only(["AdminDashbored"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()){
            if (Auth::user()->hasRole('Admin'))
                return (HomeController::AdminDashbored());
            elseif (Auth::user()->hasRole('Prof'))
                return (HomeController::ProfisionalDashbored());
            elseif (Auth::user()->hasRole('Free'))
                return (HomeController::FreeDashbored());
            else {
                return (HomeController::ProfisionalDashbored());
                Auth::logout();
                return (HomeController::NotLogin());
            }
        }
        else
            return (HomeController::NotLogin());

    }

    public function NotLogin()
    {
        return redirect()->action('PagesController@welcome');
    }

    public function AdminDashbored()
    {
        return redirect()->route('users.index');
    }

    public function ProfisionalDashbored()
    {

        return redirect()->route('crud.create');
    }
    public function FreeDashbored()
    {

        return redirect()->route('posts.create');
    }
}

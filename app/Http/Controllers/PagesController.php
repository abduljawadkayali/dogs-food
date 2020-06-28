<?php

namespace App\Http\Controllers;

use App\Company;
use App\Crud;
use App\Food;
use App\Image;
use App\Karma;
use App\Post;
use App\Solution;
use App\Staff;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function welcome()
    {

        $part1 = Crud::where("web_page", "part1")->get();
        $part2 = Crud::where("web_page", "part2")->get();
        $CompanyCount = Company::count();
        $UserCount = User::count();
        $FoodCount = Food::count();
        $KarmaCount = Karma::count();
        $SolutinCount = Solution::count();
        $staffs = Staff::all();
        $posts = Post::where('status','on')->get();
        $images =Image::all();
        return view('home', compact('images','posts','staffs','part1','part2','CompanyCount','UserCount','FoodCount','KarmaCount','SolutinCount'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

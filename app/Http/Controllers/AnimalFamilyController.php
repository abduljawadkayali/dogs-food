<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalFamily;
use Illuminate\Http\Request;

class AnimalFamilyController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:AnimalFamily');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnimalFamily::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('family.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'min'    =>  'required',
            'max'    =>  'required',
            'body'    =>  'required',
            'age'    =>  'required',
            'boy'    =>  'required',
            'girl'    =>  'required',
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'min'       =>   $request->min,
            'max'       =>   $request->max,
            'average'       =>  0.5*($request->min + $request->max) ,
            'body'       =>   $request->body,
            'age'       =>   $request->age,
            'boy'       =>   $request->boy,
            'girl'       =>   $request->girl,
            'user_id'        =>  auth()->user()->id
        );

        AnimalFamily::create($form_data);
        toast(__('Animal Family Added Successfully'),'success');
        return redirect()->route('family.index');
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
        $data = AnimalFamily::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('family.edit', compact('data'));
        }
        else
        {
            toast(__("You can't Update this Animal Family It's Public Please Create New One for You"),'error');
            return redirect()->route('family.create');
        }
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
        $request->validate([
            'name'    =>  'required',
            'min'    =>  'required',
            'max'    =>  'required',
            'body'    =>  'required',
            'age'    =>  'required',
            'boy'    =>  'required',
            'girl'    =>  'required',
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'min'       =>   $request->min,
            'max'       =>   $request->max,
            'average'       =>  0.5*($request->min + $request->max) ,
            'body'       =>   $request->body,
            'age'       =>   $request->age,
            'boy'       =>   $request->boy,
            'girl'       =>   $request->girl,
            'user_id'        =>  auth()->user()->id
        );
        AnimalFamily::whereId($id)->update($form_data);
        toast(__('Animal Family Updated Successfully'),'success');
        return redirect()->route('family.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AnimalFamily::findOrFail($id);
        $animal = Animal::where('animal_motion_id',$id)->get()->toArray();
        if($animal != null)
        {
            toast(__("Please Delete the Related Animal That has This Animal Family Firstly ..."),'error');
            return redirect()->route('animal.index');
        }
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Animal Family Deleted Successfully'),'info');
            return redirect()->route('family.index');
        }
        else
        {
            toast(__("You can't Delete this Animal Family ..."),'error');
            return redirect()->route('family.index');
        }
    }
}

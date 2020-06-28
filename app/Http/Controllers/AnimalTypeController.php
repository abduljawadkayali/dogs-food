<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:AnimalType');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnimalType::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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
            'name'    =>  'required'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'user_id'        =>  auth()->user()->id
        );

        AnimalType::create($form_data);
        toast(__('Animal Age Category Added Successfully'),'success');
        return redirect()->route('type.index');
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
        $data = AnimalType::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('type.edit', compact('data'));
        }
        else
        {
            toast(__("You can't Update this Animal Age Category It's Public Please Create New One for You"),'error');
            return redirect()->route('type.create');
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
            'name'    =>  'required'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'user_id'        =>  auth()->user()->id
        );
        AnimalType::whereId($id)->update($form_data);
        toast(__('Animal Age Category Updated Successfully'),'success');
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AnimalType::findOrFail($id);
        $animal = Animal::where('animal_type_id',$id)->get()->toArray();
        if($animal != null)
        {
            toast(__("Please Delete the Related Animal That has This Age Category Firstly ..."),'error');
            return redirect()->route('animal.index');
        }
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Animal Age Category Deleted Successfully'),'info');
            return redirect()->route('type.index');
        }
        else
        {
            toast(__("You can't Delete this Age Category ..."),'error');
            return redirect()->route('type.index');
        }

    }
}

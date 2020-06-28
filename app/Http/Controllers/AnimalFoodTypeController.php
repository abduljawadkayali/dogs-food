<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalFoodType;
use Illuminate\Http\Request;

class AnimalFoodTypeController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:AnimalFood');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnimalFoodType::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('AnimalFoodType.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AnimalFoodType.create');
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

        AnimalFoodType::create($form_data);
        toast(__('Animal Food Type Added Successfully'),'success');
        return redirect()->route('AnimalFoodType.index');
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
        $data = AnimalFoodType::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('AnimalFoodType.edit', compact('data'));
        }
        else
        {
            toast(__("You can't Update this Animal Food Type It's Public Please Create New One for You"),'error');
            return redirect()->route('AnimalFoodType.create');
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
        AnimalFoodType::whereId($id)->update($form_data);
        toast(__('Animal Food Type Updated Successfully'),'success');
        return redirect()->route('AnimalFoodType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AnimalFoodType::findOrFail($id);
        $animal = Animal::where('animal_food_type_id',$id)->get()->toArray();
        if($animal != null)
        {
            toast(__("Please Delete the Related Animal That has This Animal Food Type Firstly ..."),'error');
            return redirect()->route('animal.index');
        }
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Animal Food Type Deleted Successfully'),'info');
            return redirect()->route('AnimalFoodType.index');
        }
        else
        {
            toast(__("You can't Delete this Animal Food Type ..."),'error');
            return redirect()->route('AnimalFoodType.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\FoodGroup;
use App\FoodSpecific;
use App\FoodUnit;
use Illuminate\Http\Request;

class FoodUnitController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:FoodUnit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FoodUnit::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('unit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
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

        FoodUnit::create($form_data);
        toast(__('Food Unit Added Successfully'),'success');
        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FoodUnit::findOrFail($id);
        $foodUnit = FoodUnit::whereId($id)->get();
        if(auth()->user()->id == 1 || auth()->user()->id == $foodUnit->user_id)
        {
            return view('unit.edit', compact('data'));
        }
        else
        {
            toast(__("You cann't Update this Unit It's Public Please Create New One for You"),'error');
            return redirect()->route('unit.create');
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
        FoodUnit::whereId($id)->update($form_data);
        toast(__('Food Unit Updated Successfully'),'success');
        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodspecific = FoodSpecific::where('food_unit_id',$id)->get()->toArray();
        if($foodspecific != null)
        {
            toast(__("Please Delete the Related Food Specific That has This Unit Firstly ..."),'error');
            return redirect()->route('specific.index');
        }
        $data = FoodUnit::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Food Unit  Deleted Successfully'),'info');
            return redirect()->route('unit.index');
        }
        else
        {
            toast(__("You cann't Delete this Unit ..."),'error');
            return redirect()->route('unit.index');
        }

    }
}

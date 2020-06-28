<?php

namespace App\Http\Controllers;

use App\FoodRelation;
use App\FoodSpecific;
use App\FoodUnit;
use Illuminate\Http\Request;

class FoodSpecificController extends Controller
{
    public function __construct() {
        // $this->middleware('permission:FoodSpecific');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FoodSpecific::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('specific.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = FoodUnit::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('specific.create', compact('data'));
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
            'food_unit_id'    =>  'required'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'food_unit_id' => $request->food_unit_id,
            'user_id'        =>  auth()->user()->id
        );

        FoodSpecific::create($form_data);
        toast(__('Food Specific Added Successfully'),'success');
        return redirect()->route('specific.index');
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
        $foodUnit = FoodUnit::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $data = FoodSpecific::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('specific.edit', compact('data','foodUnit'));
        }
        else
        {
            toast(__("You cann't Update this Food Specific It's Public Please Create New One for You"),'error');
            return redirect()->route('specific.index');
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
            'food_unit_id'    =>  'required'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'food_unit_id' => $request->food_unit_id,
            'user_id'        =>  auth()->user()->id
        );
        FoodSpecific::whereId($id)->update($form_data);
        toast(__('Food Specific Updated Successfully'),'success');
        return redirect()->route('specific.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodSpecific = FoodRelation::where('food_specific_id',$id)->get()->toArray();
        if($foodSpecific != null)
        {
            toast(__("Please Delete the Related Food That has This Food Specific Firstly ..."),'error');
            return redirect()->route('food.index');
        }
        $data = FoodSpecific::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Food Specific Deleted Successfully'),'info');
            return redirect()->route('specific.index');
        }
        else
        {
            toast(__("You cann't Delete this Food Specific ..."),'error');
            return redirect()->route('specific.index');

        }
    }
}

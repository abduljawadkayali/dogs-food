<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodGroup;
use Illuminate\Http\Request;

class FoodGroupController extends Controller
{
    public function __construct() {
        // $this->middleware('permission:FoodGroup');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FoodGroup::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('group.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
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

        FoodGroup::create($form_data);
        toast(__('Food Group Added Successfully'),'success');
        return redirect()->route('group.index');
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
        $data = FoodGroup::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('group.edit', compact('data'));
        }
        else
        {
            toast(__("You cann't Update this Group It's Public Please Create New One for You"),'error');
            return redirect()->route('group.create');

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
        FoodGroup::whereId($id)->update($form_data);
        toast(__('Food Group Updated Successfully'),'success');
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FoodGroup::findOrFail($id);
        $food = Food::where('food_group_id',$id)->get()->toArray();
        if($food != null)
        {
            toast(__("Please Delete the Related Food That has This Group Firstly ..."),'error');
            return redirect()->route('food.index');
        }
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Food Group Deleted Successfully'),'info');
            return redirect()->route('group.index');
        }
        else
        {
            toast(__("You can't Delete this Group ..."),'error');
            return redirect()->route('group.index');
        }
    }
}

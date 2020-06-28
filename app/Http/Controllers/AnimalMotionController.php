<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalMotion;
use Illuminate\Http\Request;

class AnimalMotionController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:AnimalMotion');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnimalMotion::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('motion.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motion.create');
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

        AnimalMotion::create($form_data);
        toast(__('Animal Motion Type Added Successfully'),'success');
        return redirect()->route('motion.index');
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
        $data = AnimalMotion::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('motion.edit', compact('data'));
        }
        else
        {
            toast(__("You can't Update this Animal Motion Type It's Public Please Create New One for You"),'error');
            return redirect()->route('motion.create');
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
        AnimalMotion::whereId($id)->update($form_data);
        toast(__('Animal Motion Type Updated Successfully'),'success');
        return redirect()->route('motion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AnimalMotion::findOrFail($id);
        $animal = Animal::where('animal_motion_id',$id)->get()->toArray();
        if($animal != null)
        {
            toast(__("Please Delete the Related Animal That has This Animal Motion Firstly ..."),'error');
            return redirect()->route('animal.index');
        }
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            toast(__('Animal Motion Type Deleted Successfully'),'info');
            return redirect()->route('motion.index');
        }
        else
        {
            toast(__("You can't Delete this Animal Motion ..."),'error');
            return redirect()->route('motion.index');
        }
    }
}

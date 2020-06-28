<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct() {
        // $this->middleware('permission:Staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        return view('staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
            'job'     =>  'required',
            'description'     =>  'required',
            'image'         =>  'required|image|max:2048',
            'mail'     =>  'required',
            'phone'     =>  'required'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'job'        =>   $request->job,
            'description'        =>   $request->description,
            'image'            =>   $new_name,
            'mail'        =>   $request->mail,
            'phone'        =>   $request->phone
        );

        Staff::create($form_data);
        toast(__('Staff Added Successfully'),'success');
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Staff::findOrFail($id);
        return view('staff.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Staff::findOrFail($id);
        return view('staff.edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'job'     =>  'required',
                'description'     =>  'required',
                'image'         =>  'required|image|max:2048',
                'mail'     =>  'required',
                'phone'     =>  'required'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'job'     =>  'required',
                'description'     =>  'required',
                'mail'     =>  'required',
                'phone'     =>  'required'
            ]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'job'        =>   $request->job,
            'description'        =>   $request->description,
            'image'            =>   $image_name,
            'mail'        =>   $request->mail,
            'phone'        =>   $request->phone
        );

        Staff::whereId($id)->update($form_data);
        toast(__('Staff Updated Successfully'),'success');
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Staff::findOrFail($id);
        $data->delete();
        toast(__('Staff Deleted Successfully'),'info');
        return redirect()->route('staff.index');
    }
}

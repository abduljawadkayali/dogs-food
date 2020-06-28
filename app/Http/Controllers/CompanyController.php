<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:Company');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::all();
        return view('company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::all();
        return view('company.create', compact('data'));
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
            'user_id'     =>  'required|exists:users,id'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'user_id'        =>   $request->user_id,
            'adress'        =>   $request->adress ?? null
        );

        Company::create($form_data);
        toast(__('Company Added Successfully'),'success');
        return redirect()->route('company.index');
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
        $data = Company::findOrFail($id); //Find post of id = $id
        $user = User::all();
        return view ('company.edit', compact('data', 'user'));
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
            'user_id'     =>  'required|exists:users,id'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'user_id'        =>   $request->user_id,
            'adress'        =>   $request->adress ?? null
        );


        Company::whereId($id)->update($form_data);
        toast(__('Company Updated Successfully'),'success');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->user_id = null;
        $company->save();
        $company->delete();
        toast(__('Company Deleted Successfully'),'info');
        return redirect()->route('company.index');
    }
}

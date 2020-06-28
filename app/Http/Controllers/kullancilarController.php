<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class kullancilarController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:kullancilar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_id',auth()->user()->id)->get();
        return view('kullanci.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Prof')->get();
        return view('kullanci.create', ['roles'=>$roles]);
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
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'email'        =>   $request->email,
            'password' => Hash::make($request->password),
            'image'        =>   $request->image ?? "1.png",
            'user_id'        =>  auth()->user()->id
        );
        $user = User::create($form_data);


        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
        toast(__('User informations Added Successfully'),'success');
        return redirect()->route('kullancilar.index');
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
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::where('name', '!=', 'Prof')->get();

        return view('kullanci.edit', compact('user', 'roles')); //pass user and roles data to view
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
        $user = User::findOrFail($id); //Get role specified by id
        if ($user->user_id != auth()->user()->id )
        {
            toast(__('You Can NOT Update This User'),'error');
            return redirect()->route('kullancilar.index');
        }
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'email'       =>   $request->email,
            'user_id'        =>  auth()->user()->id
        );
        $roles = $request['roles']; //Retreive all roles
        $user->fill($form_data)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        toast(__('User informations Updated Successfully'),'success');
        return redirect()->route('kullancilar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->user_id != auth()->user()->id)
        {
            toast(__('You Can NOT Delete This User'),'error');
            return redirect()->route('kullancilar.index');
        }
        $user->delete();
        toast(__('User informations Deleted Successfully'),'info');
        return redirect()->route('kullancilar.index');
    }
}

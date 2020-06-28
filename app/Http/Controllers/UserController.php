<?php

namespace App\Http\Controllers;
use App\Company;
use App\User;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//Enables us to output flash messaging
use Session;
use UxWeb\SweetAlert\SweetAlert;

class UserController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:Administration');
        //$this->middleware('permission:Administration');
    }


    public function MeAdmin()
    {
        return view('users.meAdmin');
    }

    public function Me()
    {
        return view('users.me');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function profileAdmin()
    {
        return view('users.profileAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
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
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('users');
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
        $roles = Role::get(); //Get all roles

        return view('users.edit', compact('user', 'roles')); //pass user and roles data to view

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
        return redirect()->route('users.index');
    }

    public function updateUser(Request $request, $id)
    {

        if($request->password != null) {
            $image_name = $request->hidden_image;
            $image = $request->file('image');
            if($image != '') {
                $this->validate($request, [
                    'name'=>'required|max:120',
                    'email'=>'required|email|unique:users,email,'.$id,
                    'image'         =>  'image|max:2048',
                    'password'=>'required|min:6|confirmed'
                ]);
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
            }
            else
            {
                $request->validate([
                    'name'=>'required|max:120',
                    'password'=>'required|min:6|confirmed',
                    'email'=>'required|email|unique:users,email,'.$id
                ]);
            }

            $form_data = array(
                'name'    =>  $request->name,
                'email'     =>  $request->email,
                'password' => Hash::make($request->password),
                'image'         =>  $image_name
            );
            //Validate name, email and password fields
            User::whereId($id)->update($form_data);

        }
        else{
            $image_name = $request->hidden_image;
            $image = $request->file('image');
            if($image != '') {
                $this->validate($request, [
                    'name'=>'required|max:120',
                    'email'=>'required|email|unique:users,email,'.$id,
                    'image'         =>  'image|max:2048'
                ]);
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
            }
            else
            {
                $request->validate([
                    'name'=>'required|max:120',
                    'email'=>'required|email|unique:users,email,'.$id
                ]);
            }

            $form_data = array(
                'name'    =>  $request->name,
                'email'     =>  $request->email,
                'image'         =>  $image_name
            );
            //Validate name, email and password fields
            User::whereId($id)->update($form_data);

        }

        toast(__('User informations Updated Successfully'),'success');
        return redirect()->back();
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
       // $user->delete();
        $company = Company::where('user_id', $id)->get()->toArray();
        if ($company != null)
        {
            toast(__('Please Delete the user Company Before Deleting User'),'error');
            return redirect()->route('company.index');
        }
        $user->delete();
        toast(__('User informations Deleted Successfully'),'info');
        return redirect()->route('users.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:Post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); //show only 5 items at a time in descending order
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->status == null)
            $request->status = "off";

        //Validating title and body field
        $this->validate($request, [
            'name'=>'required|max:100',
            'body' =>'required',
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'body'        =>   $request->body,
            'status'        =>   $request->status
        );
        Post::create($form_data);
        //Display a successful message upon save
        toast(__('Post Added Successfully'),'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); //Find post of id = $id

        return view ('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
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
        if ($request->status == null)
            $request->status = "off";

        //Validating title and body field
        $this->validate($request, [
            'name'=>'required|max:100',
            'body' =>'required',
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'body'        =>   $request->body,
            'status'        =>   $request->status
        );
        Post::whereId($id)->update($form_data);

        toast(__('Post Updated Successfully'),'success');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        toast(__('Post Deleted Successfully'),'info');
        return redirect()->route('posts.index');
    }
}

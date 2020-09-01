<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodGroup;
use App\FoodRelation;
use App\FoodSpecific;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:Food');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FoodGroup = FoodGroup::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $data = Food::where(function ($query){
            $query->where('user_id',1)
                ->orWhere('user_id',  auth()->user()->id);
        })->paginate(150);
        $foodRelations = FoodRelation::all();
        return view('food.index', compact('data', 'foodRelations', 'FoodGroup'));
    }

    public function index1($id)
    {
        $FoodGroup = FoodGroup::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $data = Food::where(function ($query){
            $query->where('user_id',1)
                ->orWhere('user_id',  auth()->user()->id);
        })->where('food_group_id',$id)->paginate(150);
        $foodRelations = FoodRelation::all();
        return view('food.index', compact('data', 'foodRelations', 'FoodGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $FoodGroup = FoodGroup::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $FoodSpecific = FoodSpecific::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('food.create', compact('FoodGroup','FoodSpecific'));
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
            'food_group_id'    =>  'required',
        ]);
        $food = new Food();
        $food->name = $request->name;
        $food->food_group_id = $request->food_group_id;
        $food->user_id = auth()->user()->id;
        $food->save();
        $specifics = $request->food_specific_id;
        $values = $request->food_specific_value;
        $i=0;
        foreach ($specifics as $specific) {
            if($values[$i])
            {
                $FoodRelation = new FoodRelation();
                $FoodRelation->food_id = $food->id;
                $FoodRelation->specific_value = $values[$i];
                $FoodRelation->food_specific_id = $specific;
                $FoodRelation->save();
            }
            else{

            }
            $i++;
        }
        toast(__('Food Added Successfully'),'success');
        return redirect()->route('food.index');
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
        $FoodGroup = FoodGroup::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $FoodSpecific = FoodSpecific::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $data = Food::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('food.edit', compact('data' , 'FoodGroup', 'FoodSpecific'));
        }
        else
        {
            toast(__("You can't Update this Food It's Public Please Create New One for You"),'error');
            return redirect()->route('food.create');
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
        $FoodRelations = FoodRelation::where('food_id',$id)->get();
        foreach ($FoodRelations as $FoodRelation)
        {
            $FoodRelation->delete();
        }
        $request->validate([
            'name'    =>  'required',
            'food_group_id'    =>  'required',
        ]);
        $food = Food::findOrFail($id);
        $food->name = $request->name;
        $food->food_group_id = $request->food_group_id;
        $food->user_id = auth()->user()->id;
        $food->save();
        $specifics = $request->food_specific_id;
        $values = $request->food_specific_value;
        $i=0;
        foreach ($specifics as $specific) {
            if($values[$i])
            {
                $FoodRelation = new FoodRelation();
                $FoodRelation->food_id = $food->id;
                $FoodRelation->specific_value = $values[$i];
                $FoodRelation->food_specific_id = $specific;
                $FoodRelation->save();
            }
            else{

            }
            $i++;
        }
        toast(__('Food Update Successfully'),'success');
        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Food::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $data->delete();
            $FoodRelations = FoodRelation::where('food_id',$id)->get();
            foreach ($FoodRelations as $FoodRelation)
            {
                $FoodRelation->delete();
            }
            toast(__('Food Deleted Successfully'),'info');
            return redirect()->route('food.index');
        }
        else
        {
            toast(__("You can't Delete this Food ..."),'error');
            return redirect()->route('food.index');
        }
    }
}

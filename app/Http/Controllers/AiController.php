<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Food;
use App\KarmaFood;
use Illuminate\Http\Request;
use JavaScript;

class AiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Animal = Animal::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $Food = Food::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('Ai.create', compact('Animal','Food'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->animal_id == null)
            toast(__('Please Select Animal'),'error');
        $request->validate([
            'animal_id'    =>  'required'
        ]);
        $values = $request->food;
        $Foods_id = $request->food_id;
        $animal = Animal::findOrFail( $request->animal_id);

        $i=0;
        $names = [];
        $variables = [];
        $max = [];
        foreach ($Foods_id as $food_id) {

            if($values[$i])
            {
                $food = Food::findOrFail($food_id);
                array_push($variables,$food->name);
                array_push($names,$food->name);
                array_push($max,$values[$i]);
                array_push($variables,$food->Relation->pluck('specific_value'));
            }

            $i++;
        }
      //  dd($food->Relation->pluck('specific_value'));
        $constraints = collect($names)->zip($max)->transform(function ($values) {
            return [
                'name' => $values[0],
                'max' => (int)$values[1],
            ];
        });
        $animal = $animal->AnimalNeed;
        JavaScript::put([
            'animal' => $animal,
            'Variable' => $variables,
            'Constraint' => $constraints
        ]);

        return view('Ai.index', compact(['animal','variables','constraints'] ));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

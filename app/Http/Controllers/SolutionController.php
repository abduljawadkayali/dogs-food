<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Karma;
use App\KarmaFood;
use App\Solution;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:Solution');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Solution::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('solution.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Animal = Animal::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $Karma = Karma::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('solution.create', compact('Animal','Karma'));
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
            'karma_id'    =>  'required',
            'animal_id'    =>  'required'
        ]);
        $solution = new Solution();
        $solution->name = $request->name;
        $solution->karma_id = $request->karma_id;
        $solution->animal_id = $request->animal_id;
        $solution->user_id = auth()->user()->id;
        $solution->KmSonuc = null;
        $solution->LifSonuc = null;
        $solution->KulSonuc = null;
        $solution->TaurinSonuc = null;
        $solution->KarbonhidratSonuc = null;
        $animal = $solution->Animal->AnimalNeed->first();
        $karma = $solution->Karma->KarmaSpecificValue->first();
        if ($karma->Enerji < 0.999 * $animal->Enerji)
            $solution->EnerjiSonuc = "Lack";
        elseif ($karma->Enerji > 1.2 * $animal->Enerji)
            $solution->EnerjiSonuc = "Much";
        else
            $solution->EnerjiSonuc = "Ok";

        if ($karma->Hp < 0.999 * $animal->Hp)
            $solution->HpSonuc = "Lack";
        elseif ($karma->Hp > 2.5 * $animal->Hp)
            $solution->HpSonuc = "Much";
        else
            $solution->HpSonuc = "Ok";

        if ($karma->Kalsiyum < 0.999 * $animal->Kalsiyum)
            $solution->KalsiyumSonuc = "Lack";
        elseif ($karma->Kalsiyum > 1.2 * $animal->Kalsiyum)
            $solution->KalsiyumSonuc = "Much";
        else
            $solution->KalsiyumSonuc = "Ok";



        if ($karma->Fosfor < 0.999 * $animal->Fosfor)
            $solution->FosforSonuc = "Lack";
        elseif ($karma->Fosfor > 1.2 * $animal->Fosfor)
            $solution->FosforSonuc = "Much";
        else
            $solution->FosforSonuc = "Ok";

        if ($karma->Ca_p < 0.999 * $animal->Ca_p)
            $solution->Ca_pSonuc = "Lack";
        elseif ($karma->Ca_p > 2 * $animal->Ca_p)
            $solution->Ca_pSonuc = "Much";
        else
            $solution->Ca_pSonuc = "Ok";

        if ($karma->Meganizyum < 0.999 * $animal->Meganizyum)
            $solution->MeganizyumSonuc = "Lack";
        elseif ($karma->Meganizyum > 2.5 * $animal->Meganizyum)
            $solution->MeganizyumSonuc = "Much";
        else
            $solution->MeganizyumSonuc = "Ok";


        if ($karma->Sodyum < 0.999 * $animal->Sodyum)
            $solution->SodyumSonuc = "Lack";
        elseif ($karma->Sodyum > 1.1 * $animal->Sodyum)
            $solution->SodyumSonuc = "Much";
        else
            $solution->SodyumSonuc = "Ok";

        if ($karma->Yag < 0.999 * $animal->Yag)
            $solution->YagSonuc = "Lack";
        elseif ($karma->Yag > 2 * $animal->Yag)
            $solution->YagSonuc = "Much";
        else
            $solution->YagSonuc = "Ok";

        if ($karma->LinoliekAsit < 0.999 * $animal->LinoliekAsit)
            $solution->LinoliekAsitSonuc = "Lack";
        elseif ($karma->LinoliekAsit > 2.5 * $animal->LinoliekAsit)
            $solution->LinoliekAsitSonuc = "Much";
        else
            $solution->LinoliekAsitSonuc = "Ok";
        $KarmaFood = KarmaFood::where('karma_id',$request->karma_id)->get();
        $KarmaFoodSum = $KarmaFood->sum('food_amount');
        $solution->EnerjiPercent =$karma->Enerji/ (10 * $KarmaFoodSum);
        $solution->KmPercent = $karma->Km / (10 * $KarmaFoodSum);
        $solution->HpPercent = $karma->Hp / (10 * $KarmaFoodSum);
        $solution->LifPercent = $karma->Lif / (10 * $KarmaFoodSum);
        $solution->KulPercent = $karma->Kul / (10 * $KarmaFoodSum);
        $solution->KarbonhidratPercent = $karma->Karbonhidrat / (10 * $KarmaFoodSum);
        $solution->KalsiyumPercent = $karma->Kalsiyum / (10 * $KarmaFoodSum);
        $solution->FosforPercent = $karma->Fosfor / (10 * $KarmaFoodSum);
        $solution->Ca_pPercent = null;
        $solution->MeganizyumPercent =  $karma->Meganizyum / (10000 * $KarmaFoodSum);
        $solution->SodyumPercent =  $karma->Sodyum / (10000 * $KarmaFoodSum);
        $solution->TaurinPercent = $karma->Taurin / (10 * $KarmaFoodSum);
        $solution->YagPercent = $karma->Yag / (10 * $KarmaFoodSum);
        $solution->LinoliekAsitPercent = $karma->LinoliekAsit / (10 * $KarmaFoodSum);

        $solution->EnerjiKM =  $solution->EnerjiPercent / $solution->KmPercent;
        $solution->KmKM =  null;
        $solution->HpKM =  $solution->HpPercent / $solution->KmPercent;
        $solution->LifKM =  $solution->LifPercent / $solution->KmPercent;
        $solution->KulKM =  $solution->KulPercent / $solution->KmPercent;
        $solution->KarbonhidratKM =  $solution->KarbonhidratPercent / $solution->KmPercent;
        $solution->KalsiyumKM =  $solution->KalsiyumPercent / $solution->KmPercent;
        $solution->FosforKM =  $solution->FosforPercent / $solution->KmPercent;
        $solution->Ca_pKM = null;
        $solution->MeganizyumKM =  $solution->MeganizyumPercent / $solution->KmPercent;
        $solution->SodyumKM =  $solution->SodyumPercent / $solution->KmPercent;
        $solution->TaurinKM =  $solution->TaurinPercent / $solution->KmPercent;
        $solution->YagKM =  $solution->YagPercent / $solution->KmPercent;
        $solution->LinoliekAsitKM =  $solution->LinoliekAsitPercent / $solution->KmPercent;
        $solution->save();
        toast(__('Solution Added Successfully'),'success');
        return view('solution.view', compact('solution','animal','karma'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solution = Solution::findOrFail($id);
        $animal = $solution->Animal->AnimalNeed->first();
        $karma = $solution->Karma->KarmaSpecificValue->first();
        return view('solution.view', compact('solution','animal','karma'));
    }


    public function downloadPDF($id) {
        $solution = Solution::findOrFail($id);
      //  dd($solution);
        $animal = $solution->Animal->AnimalNeed->first();
        $karma = $solution->Karma->KarmaSpecificValue->first();
        $pdf = PDF::loadView('solution.pdf', compact('solution', 'animal', 'karma'));

        return $pdf->download('OptimasyonX.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solution = Solution::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $solution->user_id)
        {
            $Animal = Animal::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
            $Karma = Karma::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
            return view('solution.edit', compact('solution', 'Animal','Karma'));
        }
        else
        {
            toast(__("You can't Update this Solution It's Public Please Create New One for You"),'error');
            return redirect()->route('solution.create');
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
        $solution = Solution::findOrFail($id);
        $request->validate([
            'name'    =>  'required',
            'karma_id'    =>  'required',
            'animal_id'    =>  'required'
        ]);
        $solution->name = $request->name;
        $solution->karma_id = $request->karma_id;
        $solution->animal_id = $request->animal_id;
        $solution->user_id = auth()->user()->id;
        $solution->KmSonuc = null;
        $solution->LifSonuc = null;
        $solution->KulSonuc = null;
        $solution->TaurinSonuc = null;
        $solution->KarbonhidratSonuc = null;
        $animal = $solution->Animal->AnimalNeed->first();
        $karma = $solution->Karma->KarmaSpecificValue->first();
        if ($karma->Enerji < 0.999 * $animal->Enerji)
            $solution->EnerjiSonuc = "Lack";
        elseif ($karma->Enerji > 1.2 * $animal->Enerji)
            $solution->EnerjiSonuc = "Much";
        else
            $solution->EnerjiSonuc = "Ok";

        if ($karma->Hp < 0.999 * $animal->Hp)
            $solution->HpSonuc = "Lack";
        elseif ($karma->Hp > 2.5 * $animal->Hp)
            $solution->HpSonuc = "Much";
        else
            $solution->HpSonuc = "Ok";

        if ($karma->Kalsiyum < 0.999 * $animal->Kalsiyum)
            $solution->KalsiyumSonuc = "Lack";
        elseif ($karma->Kalsiyum > 1.2 * $animal->Kalsiyum)
            $solution->KalsiyumSonuc = "Much";
        else
            $solution->KalsiyumSonuc = "Ok";



        if ($karma->Fosfor < 0.999 * $animal->Fosfor)
            $solution->FosforSonuc = "Lack";
        elseif ($karma->Fosfor > 1.2 * $animal->Fosfor)
            $solution->FosforSonuc = "Much";
        else
            $solution->FosforSonuc = "Ok";

        if ($karma->Ca_p < 0.999 * $animal->Ca_p)
            $solution->Ca_pSonuc = "Lack";
        elseif ($karma->Ca_p > 2 * $animal->Ca_p)
            $solution->Ca_pSonuc = "Much";
        else
            $solution->Ca_pSonuc = "Ok";

        if ($karma->Meganizyum < 0.999 * $animal->Meganizyum)
            $solution->MeganizyumSonuc = "Lack";
        elseif ($karma->Meganizyum > 2.5 * $animal->Meganizyum)
            $solution->MeganizyumSonuc = "Much";
        else
            $solution->MeganizyumSonuc = "Ok";


        if ($karma->Sodyum < 0.999 * $animal->Sodyum)
            $solution->SodyumSonuc = "Lack";
        elseif ($karma->Sodyum > 1.1 * $animal->Sodyum)
            $solution->SodyumSonuc = "Much";
        else
            $solution->SodyumSonuc = "Ok";

        if ($karma->Yag < 0.999 * $animal->Yag)
            $solution->YagSonuc = "Lack";
        elseif ($karma->Yag > 2 * $animal->Yag)
            $solution->YagSonuc = "Much";
        else
            $solution->YagSonuc = "Ok";

        if ($karma->LinoliekAsit < 0.999 * $animal->LinoliekAsit)
            $solution->LinoliekAsitSonuc = "Lack";
        elseif ($karma->LinoliekAsit > 2.5 * $animal->LinoliekAsit)
            $solution->LinoliekAsitSonuc = "Much";
        else
            $solution->LinoliekAsitSonuc = "Ok";
        $KarmaFood = KarmaFood::where('karma_id',$request->karma_id)->get();
        $KarmaFoodSum = $KarmaFood->sum('food_amount');
        $solution->EnerjiPercent =$karma->Enerji/ (10 * $KarmaFoodSum);
        $solution->KmPercent = $karma->Km / (10 * $KarmaFoodSum);
        $solution->HpPercent = $karma->Hp / (10 * $KarmaFoodSum);
        $solution->LifPercent = $karma->Lif / (10 * $KarmaFoodSum);
        $solution->KulPercent = $karma->Kul / (10 * $KarmaFoodSum);
        $solution->KarbonhidratPercent = $karma->Karbonhidrat / (10 * $KarmaFoodSum);
        $solution->KalsiyumPercent = $karma->Kalsiyum / (10 * $KarmaFoodSum);
        $solution->FosforPercent = $karma->Fosfor / (10 * $KarmaFoodSum);
        $solution->Ca_pPercent = null;
        $solution->MeganizyumPercent =  $karma->Meganizyum / (10000 * $KarmaFoodSum);
        $solution->SodyumPercent =  $karma->Sodyum / (10000 * $KarmaFoodSum);
        $solution->TaurinPercent = $karma->Taurin / (10 * $KarmaFoodSum);
        $solution->YagPercent = $karma->Yag / (10 * $KarmaFoodSum);
        $solution->LinoliekAsitPercent = $karma->LinoliekAsit / (10 * $KarmaFoodSum);

        $solution->EnerjiKM =  $solution->EnerjiPercent / $solution->KmPercent;
        $solution->KmKM =  null;
        $solution->HpKM =  $solution->HpPercent / $solution->KmPercent;
        $solution->LifKM =  $solution->LifPercent / $solution->KmPercent;
        $solution->KulKM =  $solution->KulPercent / $solution->KmPercent;
        $solution->KarbonhidratKM =  $solution->KarbonhidratPercent / $solution->KmPercent;
        $solution->KalsiyumKM =  $solution->KalsiyumPercent / $solution->KmPercent;
        $solution->FosforKM =  $solution->FosforPercent / $solution->KmPercent;
        $solution->Ca_pKM = null;
        $solution->MeganizyumKM =  $solution->MeganizyumPercent / $solution->KmPercent;
        $solution->SodyumKM =  $solution->SodyumPercent / $solution->KmPercent;
        $solution->TaurinKM =  $solution->TaurinPercent / $solution->KmPercent;
        $solution->YagKM =  $solution->YagPercent / $solution->KmPercent;
        $solution->LinoliekAsitKM =  $solution->LinoliekAsitPercent / $solution->KmPercent;
        $solution->save();
        toast(__('Solution Updated Successfully'),'success');
        return view('solution.view', compact('solution','animal','karma'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Solution::findOrFail($id);
        $data->delete();
        toast(__('Solution Deleted Successfully'),'info');
        return redirect()->route('solution.index');
    }
}

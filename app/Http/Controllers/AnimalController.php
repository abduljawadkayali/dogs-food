<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalFamily;
use App\AnimalFoodType;
use App\AnimalMotion;
use App\AnimalNeed;
use App\AnimalType;
use App\Solution;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:Animal');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Animal::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('animal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AnimalFoodType = AnimalFoodType::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $AnimalType = AnimalType::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $AnimalFamily = AnimalFamily::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $AnimalMotion = AnimalMotion::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('animal.create', compact('AnimalFoodType','AnimalType', 'AnimalFamily','AnimalMotion'));
    }

    public function animalFamily($id)
    {
        // dd($id);

        return ($data =[$Family = AnimalFamily::where('id',$id)->get()] );

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
            'age'    =>  'required',
            'wight'    =>  'required',
            'animal_food_type_id'    =>  'required',
            'animal_type_id'    =>  'required',
            'animal_family_id'    =>  'required',
            'animal_motion_id'    =>  'required',
        ]);
        $children = $request->child;
        if ($children)
        {
            if($children > 4)
            {
                $child_n = 4;
                $child_m = $children -$child_n;
            }
            else
            {
                $child_n =$children;
                $child_m = 0;
            }

        }
        else {
            $child_n =0;
            $child_m =0;
        }
        $form_data = array(
            'name'       =>   $request->name,
            'age'       =>   $request->age,
            'wight'       =>   $request->wight,
            'animal_food_type_id'       =>   $request->animal_food_type_id,
            'animal_type_id'       =>   $request->animal_type_id,
            'animal_family_id'       =>   $request->animal_family_id,
            'animal_motion_id'       =>   $request->animal_motion_id,
            'gebelik'       =>   $request->gebelik ?? null,
            'dogum'       =>   $request->dogum ?? null,
            'child_n'       =>   $child_n,
            'child_m'       =>   $child_m,
            'user_id'        =>  auth()->user()->id
        );

        $animal = Animal::create($form_data);
        // Dogs Need Caluculations Start
        $Enerji =0;
        $x =0;
        $y=0;
        $z=0;
        if ($animal->AnimalType->name == "Young Animal")
        {
            if ($animal->age < 5)
            {
                if ($animal->animal_motion_id > "Inactive")
                {
                    $Enerji = 225 * $animal->wight;
                }
                elseif($animal->animal_motion_id > "Active")
                {
                    $Enerji = 250 * $animal->wight;
                }
                else{
                    toast(__('Dog Must Be Active Or Inaktive Please Edit Dog Information'),'error');
                    return redirect()->route('animal.index');
                }
            }
            elseif($animal->age > 4 && $animal->age < 15)
            {
                $formula = (130*(pow($animal->wight, 0.75*3.2*(exp(-0.87*($animal->wight / $animal->AnimalFamily->average))-0.1))));
                if ($animal->animal_motion_id > "Inactive")
                {
                    $Enerji = 0.9 * $formula;
                }
                elseif($animal->animal_motion_id > "Active")
                {
                    $Enerji = $formula;
                }
                else{
                    toast(__('Dog Must Be Active Or Inaktive Please Edit Dog Information'),'error');
                    return redirect()->route('animal.index');
                }
            }
            else{
                toast(__('Dog Age Must Be Between 4-14 Please Edit Dog Information'),'error');
                return redirect()->route('animal.index');
            }
        }
        elseif ($animal->AnimalType->name == "Adult Animal" || $animal->AnimalType->name == "Pregnant Animal" ||$animal->AnimalType->name == "Lactating female Animal")
        {
            if ($animal->AnimalType->name == "Pregnant Animal")
            {
                if ($animal->gebelik > 4)
                {
                    $x = 130 * pow($animal->wight, 0.75) +26*$animal->wight ;
                }
                elseif ($animal->gebelik < 5 &&$animal->gebelik > 0)
                {
                    $x = 130 * pow($animal->wight, 0.75);
                }
                else{
                    toast(__('Your Dog is Pregnant So Please Update Your Dog and Write the Pregnant Time'),'error');
                    return redirect()->route('animal.index');
                }
            }
            elseif ($animal->AnimalType->name == "Lactating female Animal")
            {
                if($animal->dogum ==1)
                {
                    $y = 0.75;
                }
                elseif ($animal->dogum ==2)
                {
                    $y = 0.95;
                }
                elseif ($animal->dogum ==3)
                {
                    $y = 1.1;
                }
                elseif ($animal->dogum > 4)
                {
                    $y = 1.2;
                }
                else{
                    toast(__('Your Dog is Lactating female Animal So Please Update Your Dog and Write the Lactating Time'),'error');
                    return redirect()->route('animal.index');
                }
                $x = 145 *$animal->wight + ($animal->wight)*(24*$child_n + 12 * $child_m)* $y ;

            }
            else{
                $x=0;
            }
            if ($animal->animal_motion_id > "Active")
            {
                $z =0.0012* (pow($animal->age, 5)) - 0.0514 * (pow($animal->age , 4)) + 0.8431* (pow($animal->age , 3)) - 6.4413* (pow($animal->age , 2))+ 18.908 * $animal->age + 126.87;
                }
            else{
                $z =0.0023* (pow($animal->age, 5)) - 0.0988 * (pow($animal->age , 4)) + 1.5871* (pow($animal->age , 3)) - 11.338* (pow($animal->age , 2))+ 28.512 * $animal->age + 107.41;
            }
            $Enerji = ($z * pow($animal->wight, 0.75))+ $x ;
        }
        else{
            toast(__('Your Dog Age category must be Young Animal or Adult Animal or Lactating female Animal or Pregnant Animal So Please Update Your Dog To Make Calculation'),'error');
            return redirect()->route('animal.index');
        }

        if ($animal->AnimalType->name == "Young Animal" && $animal->age <5)
        {
          $AnimalNeed = new AnimalNeed();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  56.3 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 3* $Enerji /1000;
            $AnimalNeed->Fosfor = 2.5 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =100* $Enerji /1000;
            $AnimalNeed->Sodyum =550*  $Enerji/1000;
            $AnimalNeed->Yag = 21.3 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =3.3 * $Enerji /1000;
            $AnimalNeed->save();
        }
        elseif ($animal->AnimalType->name == "Young Animal")
        {
            $AnimalNeed = new AnimalNeed();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  43.8 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 3* $Enerji /1000;
            $AnimalNeed->Fosfor = 2.5 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =100* $Enerji /1000;
            $AnimalNeed->Sodyum =550*  $Enerji/1000;
            $AnimalNeed->Yag = 21.3 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =3.3 * $Enerji /1000;
            $AnimalNeed->save();
        }
        elseif ($animal->AnimalType->name == "Adult Animal")
        { $AnimalNeed = new AnimalNeed();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  25 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 1* $Enerji /1000;
            $AnimalNeed->Fosfor = 0.75 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =120* $Enerji /1000;
            $AnimalNeed->Sodyum =200*  $Enerji/1000;
            $AnimalNeed->Yag = 13.75 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =2.75 * $Enerji /1000;
            $AnimalNeed->save();

        }
        elseif ($animal->AnimalType->name == "Pregnant Animal" ||$animal->AnimalType->name == "Lactating female Animal")
        {
            $AnimalNeed = new AnimalNeed();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  50 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 2* $Enerji /1000;
            $AnimalNeed->Fosfor = 1.25 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =150* $Enerji /1000;
            $AnimalNeed->Sodyum =500*  $Enerji/1000;
            $AnimalNeed->Yag = 21.25 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =3.25 * $Enerji /1000;
            $AnimalNeed->save();
        }
        else{

        }
        toast(__('Dog Added Successfully'),'success');
        return redirect()->route('animal.index');
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
        $data = Animal::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $AnimalFoodType = AnimalFoodType::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
            $AnimalType = AnimalType::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
            $AnimalFamily = AnimalFamily::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
            $AnimalMotion = AnimalMotion::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
            return view('animal.edit', compact('data','AnimalFoodType','AnimalType','AnimalFamily','AnimalMotion'));
        }
        else
        {
            toast(__("You can't Update this Dog It's Public Please Create New One for You"),'error');
            return redirect()->route('animal.create');
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
            'name'    =>  'required',
            'age'    =>  'required',
            'wight'    =>  'required',
            'animal_food_type_id'    =>  'required',
            'animal_type_id'    =>  'required',
            'animal_family_id'    =>  'required',
            'animal_motion_id'    =>  'required',
        ]);
        $children = $request->child;
        if ($children)
        {
            if($children > 4)
            {
                $child_n = 4;
                $child_m = $children -$child_n;
            }
            else
            {
                $child_n =$children;
                $child_m = null;
            }

        }
        else {
            $child_n =null;
            $child_m =null;
        }
        $form_data = array(
            'name'       =>   $request->name,
            'age'       =>   $request->age,
            'wight'       =>   $request->wight,
            'animal_food_type_id'       =>   $request->animal_food_type_id,
            'animal_type_id'       =>   $request->animal_type_id,
            'animal_family_id'       =>   $request->animal_family_id,
            'animal_motion_id'       =>   $request->animal_motion_id,
            'gebelik'       =>   $request->gebelik ?? null,
            'dogum'       =>   $request->dogum ?? null,
            'child_n'       =>   $child_n,
            'child_m'       =>   $child_m,
            'user_id'        =>  auth()->user()->id
        );
        Animal::whereId($id)->update($form_data);
        $animal =Animal::findOrFail($id);
        $Enerji =0;
        $x =0;
        $y=0;
        $z=0;
        if ($animal->AnimalType->name == "Young Animal")
        {
            if ($animal->age < 5)
            {
                if ($animal->animal_motion_id > "Inactive")
                {
                    $Enerji = 225 * $animal->wight;
                }
                elseif($animal->animal_motion_id > "Active")
                {
                    $Enerji = 250 * $animal->wight;
                }
                else{
                    toast(__('Dog Must Be Active Or Inaktive Please Edit Dog Information'),'error');
                    return redirect()->route('animal.index');
                }
            }
            elseif($animal->age > 4 && $animal->age < 15)
            {
                $formula = (130*(pow($animal->wight, 0.75*3.2*(exp(-0.87*($animal->wight / $animal->AnimalFamily->average))-0.1))));
                if ($animal->animal_motion_id > "Inactive")
                {
                    $Enerji = 0.9 * $formula;
                }
                elseif($animal->animal_motion_id > "Active")
                {
                    $Enerji = $formula;
                }
                else{
                    toast(__('Dog Must Be Active Or Inaktive Please Edit Dog Information'),'error');
                    return redirect()->route('animal.index');
                }
            }
            else{
                toast(__('Dog Age Must Be Between 4-14 Please Edit Dog Information'),'error');
                return redirect()->route('animal.index');
            }
        }
        elseif ($animal->AnimalType->name == "Adult Animal" || $animal->AnimalType->name == "Pregnant Animal" ||$animal->AnimalType->name == "Lactating female Animal")
        {
            if ($animal->AnimalType->name == "Pregnant Animal")
            {
                if ($animal->gebelik > 4)
                {
                    $x = 130 * pow($animal->wight, 0.75) +26*$animal->wight ;
                }
                elseif ($animal->gebelik < 5 &&$animal->gebelik > 0)
                {
                    $x = 130 * pow($animal->wight, 0.75);
                }
                else{
                    toast(__('Your Dog is Pregnant So Please Update Your Dog and Write the Pregnant Time'),'error');
                    return redirect()->route('animal.index');
                }
            }
            elseif ($animal->AnimalType->name == "Lactating female Animal")
            {
                if($animal->dogum ==1)
                {
                    $y = 0.75;
                }
                elseif ($animal->dogum ==2)
                {
                    $y = 0.95;
                }
                elseif ($animal->dogum ==3)
                {
                    $y = 1.1;
                }
                elseif ($animal->dogum > 4)
                {
                    $y = 1.2;
                }
                else{
                    toast(__('Your Dog is Lactating female Animal So Please Update Your Dog and Write the Lactating Time'),'error');
                    return redirect()->route('animal.index');
                }
                $x = 145 *$animal->wight + ($animal->wight)*(24*$child_n + 12 * $child_m)* $y ;

            }
            else{
                $x=0;
            }
            if ($animal->animal_motion_id > "Active")
            {
                $z =0.0012* (pow($animal->age, 5)) - 0.0514 * (pow($animal->age , 4)) + 0.8431* (pow($animal->age , 3)) - 6.4413* (pow($animal->age , 2))+ 18.908 * $animal->age + 126.87;
            }
            else{
                $z =0.0023* (pow($animal->age, 5)) - 0.0988 * (pow($animal->age , 4)) + 1.5871* (pow($animal->age , 3)) - 11.338* (pow($animal->age , 2))+ 28.512 * $animal->age + 107.41;
            }
            $Enerji = ($z * pow($animal->wight, 0.75))+ $x ;
        }
        else{
            toast(__('Your Dog Age category must be Young Animal or Adult Animal or Lactating female Animal or Pregnant Animal So Please Update Your Dog To Make Calculation'),'error');
            return redirect()->route('animal.index');
        }
        if ($animal->AnimalType->name == "Young Animal" && $animal->age <5)
        {
            $AnimalNeed = AnimalNeed::where('animal_id',$animal->id)->first();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  56.3 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 3* $Enerji /1000;
            $AnimalNeed->Fosfor = 2.5 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =100* $Enerji /1000;
            $AnimalNeed->Sodyum =550*  $Enerji/1000;
            $AnimalNeed->Yag = 21.3 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =3.3 * $Enerji /1000;
            $AnimalNeed->save();
        }
        elseif ($animal->AnimalType->name == "Young Animal")
        {
            $AnimalNeed = AnimalNeed::where('animal_id',$animal->id)->first();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  43.8 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 3* $Enerji /1000;
            $AnimalNeed->Fosfor = 2.5 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =100* $Enerji /1000;
            $AnimalNeed->Sodyum =550*  $Enerji/1000;
            $AnimalNeed->Yag = 21.3 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =3.3 * $Enerji /1000;
            dd($AnimalNeed);
            $AnimalNeed->save();
        }
        elseif ($animal->AnimalType->name == "Adult Animal")
        {
            $AnimalNeed = AnimalNeed::where('animal_id',$animal->id)->first();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  25 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 1* $Enerji /1000;
            $AnimalNeed->Fosfor = 0.75 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =120* $Enerji /1000;
            $AnimalNeed->Sodyum =200*  $Enerji/1000;
            $AnimalNeed->Yag = 13.75 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =2.75 * $Enerji /1000;
            $AnimalNeed->save();

        }
        elseif ($animal->AnimalType->name == "Pregnant Animal" ||$animal->AnimalType->name == "Lactating female Animal")
        {
            $AnimalNeed = AnimalNeed::where('animal_id',$animal->id)->first();
            $AnimalNeed->animal_id = $animal->id;
            $AnimalNeed->Enerji = $Enerji;
            $AnimalNeed->Hp =  50 * $Enerji / 1000;
            $AnimalNeed->Kalsiyum = 2* $Enerji /1000;
            $AnimalNeed->Fosfor = 1.25 * $Enerji /1000;
            $AnimalNeed->Ca_p = 1;
            $AnimalNeed->Meganizyum =150* $Enerji /1000;
            $AnimalNeed->Sodyum =500*  $Enerji/1000;
            $AnimalNeed->Yag = 21.25 * $Enerji /1000;
            $AnimalNeed->LinoliekAsit =3.25 * $Enerji /1000;
            $AnimalNeed->save();
        }
        else{

        }

        toast(__('Dog Updated Successfully'),'success');
        return redirect()->route('animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Animal::findOrFail($id);
        $solution = Solution::where('animal_id',$id)->get()->toArray();
        if($solution != null)
        {
            toast(__("Please Delete the Related Solution That has This Dog  Firstly ..."),'error');
            return redirect()->route('solution.index');
        }
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            $AnimalNeed = AnimalNeed::where('animal_id',$id)->first();
            $data->delete();
            $AnimalNeed->first()->delete();
            toast(__('Dog Deleted Successfully'),'info');
            return redirect()->route('animal.index');
        }
        else
        {
            toast(__("You can't Delete this Dog ..."),'error');
            return redirect()->route('animal.index');
        }

    }
}

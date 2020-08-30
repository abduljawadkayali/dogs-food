<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Food;
use App\FoodGroup;
use App\FoodRelation;
use App\Karma;
use App\KarmaFood;
use App\KarmaSpecificValue;
use JavaScript;
use App\Solution;
use Illuminate\Http\Request;

class MainSolutionController extends Controller
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
        return view('main.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Animal = Animal::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $foodGroup  = FoodGroup::all();
$foods = Food::all();
        $foodRelations = FoodRelation::all();






        $food1 = Food::where('food_group_id',1)->where('user_id', auth()->user()->id)->get();
        $food2 = Food::where('food_group_id',2)->where('user_id', auth()->user()->id)->get();
        $food3 = Food::where('food_group_id',3)->where('user_id', auth()->user()->id)->get();

        $food4 = Food::where('food_group_id',4)->where('user_id', auth()->user()->id)->get();
        $food5 = Food::where('food_group_id',5)->where('user_id', auth()->user()->id)->get();
        $food6 = Food::where('food_group_id',6)->where('user_id', auth()->user()->id)->get();

        $food7 = Food::where('food_group_id',7)->where('user_id', auth()->user()->id)->get();
        $food8 = Food::where('food_group_id',8)->where('user_id', auth()->user()->id)->get();
        $food9 = Food::where('food_group_id',9)->where('user_id', auth()->user()->id)->get();

        $food10 = Food::where('food_group_id',10)->where('user_id', auth()->user()->id)->get();
        $food11 = Food::where('food_group_id',11)->where('user_id', auth()->user()->id)->get();


        //dd($food1,$food2,$food3,$food4,$food5,$food6);

        JavaScript::put([
            'food1' => $food1,
            'food2' => $food2,
            'food3' => $food3,

            'food4' => $food4,
            'food5' => $food5,
            'food6' => $food6,

            'food7' => $food7,
            'food8' => $food8,
            'food9' => $food9,

            'food10' => $food10,
            'food11' => $food11

        ]);
//dd($food->Relation->pluck('specific_value'));
        return view('main.create', compact('Animal','foods','foodGroup', 'food1', 'food3','foodSpecific1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function FoodRelation($id)
    {
       // dd($id);

        return ($data =[$Relation = FoodRelation::where('food_id',$id)->get()] );

    }

    public function AiFood(Request $request)
    {
        // dd($request->all());
        $data = $request['data'];
        $variables = [];
        $names = [];
        $max = [];
        $i=0;

        foreach ($data[0] as $food_name){
            $food = Food::where('name',$food_name )->first();
           // $food_id=Food::where('name',$food_name )->pluck('id');
         //   $food = Food::findOrFail($food_id);
            array_push($names,$food_name);
            array_push($max,$data[1][$i]);
            $i++;
            array_push($variables,$food_name);
            array_push($variables,$food->Relation->pluck('specific_value'));

        }
        $constraints = collect($names)->zip($max)->transform(function ($values) {
            return [
                'name' => $values[0],
                'max' => (int)$values[1],
            ];
        });
      //  dd($variables);

        return ( $data =[$variables,$constraints]);
    }

    public function Solution(Request $request)
    {
        // dd($request->all());
        $data = $request['data'];

        $karma1 = new Karma();
        $karma1->name = "dene";
        $karma1->user_id = auth()->user()->id;
        $karma1->save();
        $values = $data[1];
        $Foods_name = $data[0];
        $KarmaSpecific = array_fill(0, 15, 0);
        $i=0;
        foreach ($Foods_name as $item) {
            if($values[$i]) {
                $KarmaFood = new KarmaFood();
                $food = Food::where('name',$item )->first();
                $KarmaFood->food_id = $food->id;

                $KarmaFood->food_amount = $values[$i];

                $KarmaFood->karma_id = $karma1->id;
                $KarmaFood->save();

                $specifics = $KarmaFood->Food->Relation->pluck("food_specific_id");
                $specificsValues = $KarmaFood->Food->Relation->pluck("specific_value");
                $k = 0;
                for ($j = 0; $j < 15;) {
                    if ($specifics->count() > $k) {
                        if ($specifics[$k] == $j + 1) {
                            if ($k == 8) {
                                if ($specificsValues[7] != 0) {
                                    $KarmaSpecific[$j] = $KarmaSpecific[$j] + $specificsValues[$k] * $values[$i];


                                }
                            } else {
                                if ($k == 14) {
                                    $KarmaSpecific[$j] = $KarmaSpecific[$j] + ($specificsValues[$k] * $values[$i] / 1000);
                                } else {
                                    $KarmaSpecific[$j] = $KarmaSpecific[$j] + $specificsValues[$k] * $values[$i];
                                }

                            }
                            $k = $k + 1;
                        } else {
                        }
                    } else {
                        $j = 20;
                    }
                    $j = $j + 1;
                };
            }
            $i++;
        }

        $karmaSpecificValue = new KarmaSpecificValue();
        $karmaSpecificValue->karma_id = $karma1->id;
        $karmaSpecificValue->Km = $KarmaSpecific[0] /100 ;
        $karmaSpecificValue->Hp =$KarmaSpecific[1] /100 ;
        $karmaSpecificValue->Enerji = $KarmaSpecific[2];
        $karmaSpecificValue->Lif = $KarmaSpecific[3] /100 ;
        $karmaSpecificValue->Kul =  $KarmaSpecific[4] /100 ;
        $karmaSpecificValue->Karbonhidrat = $KarmaSpecific[5] /100 ;
        $karmaSpecificValue->Kalsiyum = $KarmaSpecific[6] /100 ;
        $karmaSpecificValue->Fosfor = $KarmaSpecific[7] /100 ;

        $karmaSpecificValue->Ca_p = $karmaSpecificValue->Kalsiyum / $karmaSpecificValue->Fosfor;

        // dd($karmaSpecificValue->Kul);
        $karmaSpecificValue->Meganizyum =10* $KarmaSpecific[9];
        $karmaSpecificValue->Sodyum =10* $KarmaSpecific[10];
        $karmaSpecificValue->Taurin = $KarmaSpecific[11] /100 ;
        $karmaSpecificValue->Yag = $KarmaSpecific[12] /100 ;
        $karmaSpecificValue->LinoliekAsit = $KarmaSpecific[13] /100 ;
        $karmaSpecificValue->Fiyat = $KarmaSpecific[14];
        $karmaSpecificValue->save();


        $solution = new Solution();
        $solution->name = date('Y-m-d H:i:s');

        $solution->karma_id = $karma1->id;

        $solution->animal_id =  $data[2];
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
        $KarmaFood = KarmaFood::where('karma_id',$karma1->id)->get();
        $KarmaFoodSum = $KarmaFood->sum('food_amount');

        $solution->EnerjiPercent =number_format(1000*$karma->Enerji/ (10 * $KarmaFoodSum), 3);
        $solution->KmPercent =number_format(1000*$karma->Km / (10 * $KarmaFoodSum), 3) ;
        $solution->HpPercent =number_format(1000* $karma->Hp / (10 * $KarmaFoodSum), 3);
        $solution->LifPercent =number_format(1000*$karma->Lif / (10 * $KarmaFoodSum), 3) ;
        $solution->KulPercent =number_format(1000* $karma->Kul / (10 * $KarmaFoodSum), 3);
        $solution->KarbonhidratPercent =number_format(1000* $karma->Karbonhidrat / (10 * $KarmaFoodSum), 3);
        $solution->KalsiyumPercent =number_format(1000* $karma->Kalsiyum / (10 * $KarmaFoodSum), 3);
        $solution->FosforPercent =number_format(1000* $karma->Fosfor / (10 * $KarmaFoodSum), 3);
        $solution->Ca_pPercent = null;
        $solution->MeganizyumPercent = number_format(1000*$karma->Meganizyum / (10000 * $KarmaFoodSum), 3) ;
        $solution->SodyumPercent =  number_format(1000*$karma->Sodyum / (10000 * $KarmaFoodSum), 3);
        $solution->TaurinPercent =number_format(1000* $karma->Taurin / (10 * $KarmaFoodSum), 3);
        $solution->YagPercent =number_format(1000*$karma->Yag / (10 * $KarmaFoodSum), 3) ;
        $solution->LinoliekAsitPercent =number_format(1000* $karma->LinoliekAsit / (10 * $KarmaFoodSum), 3);

        $solution->EnerjiKM = number_format(100* $solution->EnerjiPercent / $solution->KmPercent, 3);
        if ($solution->Animal->AnimalFoodType->name == "Pet Food")
        {
            $solution->dailyNeed =number_format($animal->Enerji / 10* $solution->EnerjiKM, 3)  ;
        }
        else{
            $solution->dailyNeed =number_format($KarmaFoodSum, 3);
        }
        $solution->KmKM =  null;
        $solution->HpKM = number_format( 100*$solution->HpPercent / $solution->KmPercent, 3);
        $solution->LifKM = number_format(100* $solution->LifPercent / $solution->KmPercent, 3);
        $solution->KulKM = number_format(100*$solution->KulPercent / $solution->KmPercent, 3) ;
        $solution->KarbonhidratKM =number_format(100*  $solution->KarbonhidratPercent / $solution->KmPercent, 3);
        $solution->KalsiyumKM = number_format( 100*$solution->KalsiyumPercent / $solution->KmPercent, 3);
        $solution->FosforKM =number_format(100*  $solution->FosforPercent / $solution->KmPercent, 3);
        $solution->Ca_pKM = null;
        $solution->MeganizyumKM =number_format(100*$solution->MeganizyumPercent / $solution->KmPercent, 3)  ;
        $solution->SodyumKM =number_format(100*  $solution->SodyumPercent / $solution->KmPercent, 3);
        $solution->TaurinKM = number_format(100* $solution->TaurinPercent / $solution->KmPercent, 3);
        $solution->YagKM = number_format(100* $solution->YagPercent / $solution->KmPercent, 3);
        $solution->LinoliekAsitKM =number_format(100* $solution->LinoliekAsitPercent / $solution->KmPercent, 3) ;



        $KarmaFoods = KarmaFood::where('karma_id',$karma1->id)->get();
        $KarmaSpecific = KarmaSpecificValue::where('karma_id',$karma1->id);
        $karma1->delete();
        $KarmaSpecific->delete();
        foreach ($KarmaFoods as $KarmaFood)
        {
            $KarmaFood->delete();
        }

        return ( $solution);
    }

    public function Relation(Request $request)
    {
       // dd($request->all());
        $data = $request['data'];
        $food = [];
        $KM = [];
        $HP = [];
        $Enerji = [];
        $Lif = [];
        $Kul= [];
        $Karbonhidrat= [];
        $Kalsiyum = [];
        $Fosfor = [];
        $Ca_P = [];
        $Magnezyum = [];
        $Sodyum = [];
        $Taurin = [];
        $Yag = [];
        $Linoleik_asit = [];
        $Fiyat = [];
        $grup = [];
        foreach ($request['data'] as $item)
        {
        //    $food = Food::where('name',$item )->get();
            $food22=Food::where('name',$item )->first();
            $food_id=Food::where('name',$item )->pluck('id');
            $food_grup=$food22->FoodGroup->name;


            array_push($grup,$food_grup );
            array_push($food,Food::where('name',$item )->pluck('name')->first());

            array_push($KM,FoodRelation::where('food_id',$food_id )->where('food_specific_id',1)->pluck('specific_value') );
            array_push($HP,FoodRelation::where('food_id',$food_id )->where('food_specific_id',2)->pluck('specific_value') );
            array_push($Enerji,FoodRelation::where('food_id',$food_id )->where('food_specific_id',3)->pluck('specific_value') );
            array_push($Lif,FoodRelation::where('food_id',$food_id )->where('food_specific_id',4)->pluck('specific_value') );
            array_push($Kul,FoodRelation::where('food_id',$food_id )->where('food_specific_id',5)->pluck('specific_value') );
            array_push($Karbonhidrat,FoodRelation::where('food_id',$food_id )->where('food_specific_id',6)->pluck('specific_value') );
            array_push($Kalsiyum,FoodRelation::where('food_id',$food_id )->where('food_specific_id',7)->pluck('specific_value') );
            array_push($Fosfor,FoodRelation::where('food_id',$food_id )->where('food_specific_id',8)->pluck('specific_value') );
            array_push($Ca_P,FoodRelation::where('food_id',$food_id )->where('food_specific_id',9)->pluck('specific_value') );
            array_push($Magnezyum,FoodRelation::where('food_id',$food_id )->where('food_specific_id',10)->pluck('specific_value') );
            array_push($Sodyum,FoodRelation::where('food_id',$food_id )->where('food_specific_id',11)->pluck('specific_value') );
            array_push($Taurin,FoodRelation::where('food_id',$food_id )->where('food_specific_id',12)->pluck('specific_value') );
            array_push($Yag,FoodRelation::where('food_id',$food_id )->where('food_specific_id',13)->pluck('specific_value') );
            array_push($Linoleik_asit,FoodRelation::where('food_id',$food_id )->where('food_specific_id',14)->pluck('specific_value') );
            array_push($Fiyat,FoodRelation::where('food_id',$food_id )->where('food_specific_id',15)->pluck('specific_value') );


        }
        return ( [$food,$KM,$HP,$Enerji,$Lif,$Kul,$Karbonhidrat,$Kalsiyum,$Fosfor,$Ca_P,$Magnezyum,$Sodyum,$Taurin,$Yag,$Linoleik_asit,$Fiyat,$grup ]);
    }

    public function Dog($id)
    {
        return ($data =[$animal = Animal::findorFail($id), $animalFamily = $animal->AnimalFamily->name,
            $animalFoodType = $animal->AnimalFoodType->name,$animalFamily = $animal->AnimalMotion->name,
            $animalType = $animal->AnimalType->name,$animalNeed = $animal->AnimalNeed] );

    }

    public function DogNeed($id)
    {
        $animal = Animal::findOrFail( $id);
        $animal = $animal->AnimalNeed;
        JavaScript::put([
            'animal' => $animal,
        ]);
        return ($animal);

    }

    public function store(Request $request)
    {
        //
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

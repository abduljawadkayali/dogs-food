<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;

        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        .kopek{
            width: 40%;
            background-color: #00b44e;
        }
        .header{
            width: 100%;
            background-color: #f0ad4e;
        }
    </style>
</head>
<body>



    <div class="container">
        <h2> <i class="fas fa-align-justify"></i> @lang("OptimasyonX")
            <hr>
        </h2>
        <h4>
            @lang("Dog") : {{__($solution->Animal->name)}}<br>
            @lang("Age") : {{__($solution->Animal->age) }}<br>
            @lang("Wight") : {{__($solution->Animal->wight)}}<br>
            @lang("Animal Family") : {{__($solution->Animal->AnimalFamily->name)}}<br>
            @lang("Food Type") : {{__($solution->Animal->AnimalFoodType->name)}}<br>
            @lang("Motion") : {{__($solution->Animal->AnimalMotion->name)}}<br>
            @lang("Age Category") : {{__($solution->Animal->AnimalType->name)}}<br>
        </h4>

        <h2> <i class="fas fa-align-justify"></i> @lang("Solution")

            <table id="myTable" class="table display nowrap" >
                <thead>
                <tr>
                    <th>@lang("Nutrient")</th>
                    <th>@lang("Dog Need")</th>
                    <th>@lang("Mixture")</th>
                    <th>@lang("Result")</th>
                    <th>@lang("%")</th>
                    <th>@lang("in DM %")</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>@lang("Dry Matter,g")</td>
                    <td></td>
                    <td>{{__($karma->Km)}}</td>
                    <td></td>
                    <td>{{__($solution->KmPercent)}}</td>
                    <td>{{__($solution->KmKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Raw Protein,g")</td>
                    <td>{{__($animal->Hp)}}</td>
                    <td>{{__($karma->Hp)}}</td>
                    <td>{{__($solution->HpSonuc)}}</td>
                    <td>{{__($solution->HpPercent)}}</td>
                    <td>{{__($solution->HpKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Energy, kcal")</td>
                    <td>{{__($animal->Enerji)}}</td>
                    <td>{{__($karma->Enerji)}}</td>
                    <td>{{__($solution->EnerjiSonuc)}}</td>
                    <td>{{__($solution->EnerjiPercent)}}</td>
                    <td>{{__($solution->EnerjiKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Lif,g")</td>
                    <td>{{__($animal->Lif)}}</td>
                    <td>{{__($karma->Lif)}}</td>
                    <td>{{__($solution->LifSonuc)}}</td>
                    <td>{{__($solution->LifPercent)}}</td>
                    <td>{{__($solution->LifKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Kul,g")</td>
                    <td>{{__($animal->Kul)}}</td>
                    <td>{{__($karma->Kul)}}</td>
                    <td>{{__($solution->KulSonuc)}}</td>
                    <td>{{__($solution->KulPercent)}}</td>
                    <td>{{__($solution->KulKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Carbohydrate,g")</td>
                    <td>{{__($animal->Karbonhidrat)}}</td>
                    <td>{{__($karma->Karbonhidrat)}}</td>
                    <td>{{__($solution->KarbonhidratSonuc)}}</td>
                    <td>{{__($solution->KarbonhidratPercent)}}</td>
                    <td>{{__($solution->KarbonhidratKM)}}</td>
                </tr>


                <tr>
                    <td>@lang("Calcium,g")</td>
                    <td>{{__($animal->Kalsiyum)}}</td>
                    <td>{{__($karma->Kalsiyum)}}</td>
                    <td>{{__($solution->KalsiyumSonuc)}}</td>
                    <td>{{__($solution->KalsiyumPercent)}}</td>
                    <td>{{__($solution->KalsiyumKM)}}</td>
                </tr>


                <tr>
                    <td>@lang("Fosfor,g")</td>
                    <td>{{__($animal->Fosfor)}}</td>
                    <td>{{__($karma->Fosfor)}}</td>
                    <td>{{__($solution->FosforSonuc)}}</td>
                    <td>{{__($solution->FosforPercent)}}</td>
                    <td>{{__($solution->FosforKM)}}</td>
                </tr>


                <tr>
                    <td>@lang("Ca/P,%")</td>
                    <td>{{__($animal->Ca_p)}}</td>
                    <td>{{__($karma->Ca_p)}}</td>
                    <td>{{__($solution->Ca_pSonuc)}}</td>
                    <td>{{__($solution->Ca_pPercent)}}</td>
                    <td>{{__($solution->Ca_pKM)}}</td>
                </tr>


                <tr>
                    <td>@lang("Magnesium,mg")</td>
                    <td>{{__($animal->Meganizyum)}}</td>
                    <td>{{__($karma->Meganizyum)}}</td>
                    <td>{{__($solution->MeganizyumSonuc)}}</td>
                    <td>{{__($solution->MeganizyumPercent)}}</td>
                    <td>{{__($solution->MeganizyumKM)}}</td>
                </tr>


                <tr>
                    <td>@lang("Sodium,mg")</td>
                    <td>{{__($animal->Sodyum)}}</td>
                    <td>{{__($karma->Sodyum)}}</td>
                    <td>{{__($solution->SodyumSonuc)}}</td>
                    <td>{{__($solution->SodyumPercent)}}</td>
                    <td>{{__($solution->SodyumKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Taurin,g")</td>
                    <td>{{__($animal->Taurin)}}</td>
                    <td>{{__($karma->Taurin)}}</td>
                    <td>{{__($solution->TaurinSonuc)}}</td>
                    <td>{{__($solution->TaurinPercent)}}</td>
                    <td>{{__($solution->TaurinKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Oil,g")</td>
                    <td>{{__($animal->Yag)}}</td>
                    <td>{{__($karma->Yag)}}</td>
                    <td>{{__($solution->YagSonuc)}}</td>
                    <td>{{__($solution->YagPercent)}}</td>
                    <td>{{__($solution->YagKM)}}</td>
                </tr>

                <tr>
                    <td>@lang("Linoliek Acid, g")</td>
                    <td>{{__($animal->LinoliekAsit)}}</td>
                    <td>{{__($karma->LinoliekAsit)}}</td>
                    <td>{{__($solution->LinoliekAsitSonuc)}}</td>
                    <td>{{__($solution->LinoliekAsitPercent)}}</td>
                    <td>{{__($solution->LinoliekAsitKM)}}</td>
                </tr>



            </table>


    </div>

</div>


</body>
</html>

